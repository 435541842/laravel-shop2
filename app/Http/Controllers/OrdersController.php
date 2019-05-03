<?php

namespace App\Http\Controllers;

use App\Models\ProductSku;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Exceptions\InvalidRequestException;
use App\Jobs\CloseOrder;

class OrdersController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = $request->user();
        // 开启一个数据库事务
        $order = \DB::transaction(function () use ($user, $request){
            //首先检查地址
            $address = UserAddress::find($request->input('address_id'));

            $address->update(['last_used_at' => Carbon::now()]);

            // 创建一个订单
            $order   = new Order([
                'address'      => [ // 将地址信息放入订单中
                    'address'       => $address->full_address,
                    'zip'           => $address->zip,
                    'contact_name'  => $address->contact_name,
                    'contact_phone' => $address->contact_phone,
                ],
                'remark'       => $request->input('remark'),
                'total_amount' => 0,
            ]);
            // 订单关联到当前用户  TODO:这个有点东西啊
            $order->user()->associate($user);
            // 写入数据库
            $order->save();

            //接下来就是订单金额
            $totalAmount = 0;
            $items = $request->input('items');

            foreach ($items as $data)
            {
                $sku = ProductSku::find($data['sku_id']);

                // 创建一个 OrderItem 并直接与当前订单关联  make方法也是有点东西啊
                $item = $order->items()->make([
                    'amount' => $data['amount'],
                    'price'  => $sku->price,
                ]);
                //这里的用法就跟上面一样了
                //保存商品ID
                $item->product()->associate($sku->product_id);
                //保存skuID
                $item->productSku()->associate($sku);
                $item->save();
                $totalAmount += $sku->price * $data['amount'];
                //减库存
                if ($sku->decreaseStock($data['amount']) <= 0) {
                    throw new InvalidRequestException('该商品库存不足');
                }
            }

            // 更新订单总金额
            $order->update(['total_amount' => $totalAmount]);

            // 将下单的商品从购物车中移除
            $skuIds = collect($items)->pluck('sku_id');
            $user->cartItems()->whereIn('product_sku_id', $skuIds)->delete();

            return $order;
        });
        $this->dispatch(new CloseOrder($order, config('app.order_ttl')));
        return $order;
    }

    public function index(Request $request)
    {
        $orders = Order::query()
            // 使用 with 方法预加载，避免N + 1问题
            ->with(['items.product','items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.productSku', 'items.product'])]);
    }
}

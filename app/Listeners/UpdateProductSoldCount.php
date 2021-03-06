<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\OrderItem;
//  implements ShouldQueue 代表此监听器是异步执行的
class UpdateProductSoldCount implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        // 从事件对象中取出对应的订单
        $order = $event->getOrder();
        // 预加载商品数据
        $order->load('items.product');
        //循环遍历商品
        foreach ($order->items as $item)
        {
            $product = $item->product;
            //计算对应商品的数量
            $soldCount = OrderItem::query()
                ->where('product_id',$product->id)
                //因为设置了模型管理，所以可以这样查找
                ->whereHas('order',function($query){
                    $query->whereNotNull('paid_at');  // 关联的订单状态是已支付
            })->sum('amount');

            // 更新商品销量
            $product->update([
                'sold_count' => $soldCount,
            ]);
        }
    }
}

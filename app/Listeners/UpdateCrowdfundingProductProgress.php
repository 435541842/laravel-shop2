<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use App\Models\Order;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateCrowdfundingProductProgress
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(OrderPaid $event)
    {
        $order = $event->getOrder();
        // 如果订单类型不是众筹商品订单，无需处理
        if ($order->type !== Order::TYPE_CROWDFUNDING) {
            return;
        }
        $crowdfunding = $order->items[0]->product->crowdfunding;

        $data = Order::query()
            ->where('type',Order::TYPE_CROWDFUNDING)
            ->whereNotNull('paid_at')
            ->whereHas('items',function ($query) use($crowdfunding){
                //并且包含本商品
                $query->where('product_id',$crowdfunding->product_id);
            })
            ->first([
                //取出订单金额
                \DB::raw('sum(total_amount) as total_amount'),
                //取出去重的支付用户数
                \DB::raw('count(distinct(user_id)) as user_count'),
            ]);

        $crowdfunding->update([
            'total_amount' => $data->total_amount,
            'user_count'   => $data->user_count,
        ]);
    }

    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        //
    }
}

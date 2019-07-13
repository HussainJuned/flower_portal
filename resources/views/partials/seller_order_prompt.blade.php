

@if (auth()->id() === $order->seller_user_id)
    <div class="my-3">
        <form action="{{ route('seller_dashboard.order.updateToAccepted', ['order' => $order->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Accept Order</button>
        </form>
    </div>
@endif

@if (auth()->id() === $order->seller_user_id)
    <div class="my-3">
        <form action="{{ route('seller_dashboard.order.updateToShipped', ['order' => $order->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Order is Shipped</button>
        </form>
    </div>
@endif

@if (auth()->id() === $order->seller_user_id)
    <div class="my-3">
        <form action="{{ route('seller_dashboard.order.updateToDelivered', ['order' => $order->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Order is Delivered</button>
        </form>
    </div>
@endif

@if (auth()->id() === $order->seller_user_id)

    {{--@include('partials.product_review_box', ['product_id' => $order->product_id, 'order_id' => $order->id])--}}

@endif


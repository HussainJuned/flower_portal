
@if ($order->status === 4 && auth()->id() === $order->buyer_user_id)
    <div class="my-3">
        <form action="{{ route('buyer_dashboard.order.updateToReceived', ['order' => $order->id]) }}" method="post">
            @csrf
            <input type="number" name="status" value="5" hidden>
            <button type="submit" class="btn btn-primary">I have received the order</button>
        </form>
    </div>

    @elseif ($order->status === 5 && auth()->id() === $order->buyer_user_id)
        @if ($order->productReview)
            @include('partials.product_review_box_value',
             ['product_id' => $order->product_id, 'order_id' => $order->id])
        @else
            @include('partials.product_review_box', ['product_id' => $order->product_id, 'order_id' => $order->id])
        @endif
    @else
    <div class="my-3">
        <p>You have no action to perform. Please wait for the seller to deliver the order</p>
    </div>

@endif
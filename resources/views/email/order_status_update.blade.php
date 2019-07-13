@component('mail::message')

# Dear {{ $order->buyer->name }},
{{--<h2>Order Status Update</h2>--}}
<h1>Your order is <span style="color: #04ad2f">{{$type}}</span> by the seller</h1>
<p><strong>Order Id: </strong> {{ $order->id }}</p>
<p><strong>Order Total Price: </strong> ${{ $order->order_total_price }}</p>
<p><strong>Order Date: </strong> {{ $order->order_date }}</p>

@component('mail::button', ['url' => route('buyer_dashboard.order.view', ['order' => $order->id])])
View order
@endcomponent

<p>From,</p>
<h2>{{ config('app.name') }}</h2>
@endcomponent

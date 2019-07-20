@component('mail::message')


@if($type == 'buyer')
# Dear {{ $order->buyer->name }},
{{--<h3>Order Status Update:</h3>--}}
<h1>Your order is <span style="color: #04ad2f">accepted</span> by the seller</h1>
<p><strong>Order Id: </strong> {{ $order->id }}</p>
<p><strong>Order Total Price: </strong> ${{ $order->order_total_price }}</p>
<p><strong>Order Date: </strong> {{ $order->order_date }}</p>

@component('mail::button', ['url' => route('buyer_dashboard.order.view', ['order' => $order->id])])
View order
@endcomponent

@elseif($type == 'seller')
# Dear {{ $order->seller->name }},
{{--<h3>Order Status Update:</h3>--}}
<h1>You have <span style="color: #04ad2f">accepted</span> order from buyer({{ $order->buyer->name }})</h1>
<p><strong>Order Id: </strong> {{ $order->id }}</p>
<p><strong>Order Total Price: </strong> ${{ $order->order_total_price }}</p>
<p><strong>Order Date: </strong> {{ $order->order_date }}</p>

@component('mail::button', ['url' => route('seller_dashboard.order.view', ['order' => $order->id])])
View order
@endcomponent
@endif




<p>From,</p>
<h2>{{ config('app.name') }}</h2>
@endcomponent

@component('mail::message')


@if ($type === 'buyer')
# Dear {{ $order->buyer->name }},
<h1>Congratulation! your new order has been <span style="color: #04ad2f">placed</span> successfully</h1>
@else
# Dear {{ $order->seller->name }},
<h1>Congratulation! you have <span style="color: #04ad2f">received</span> a new order from {{ $order->buyer->name }}</h1>
@endif

<p><strong>Order Id: </strong> {{ $order->id }}</p>
<p><strong>Order Total Price: </strong> ${{ $order->order_total_price }}</p>
<p><strong>Order Date: </strong> {{ $order->order_date }}</p>

@if ($type === 'buyer')
@component('mail::button', ['url' => route('buyer_dashboard.order.view', ['order' => $order->id])])
View order
@endcomponent

@else
@component('mail::button', ['url' => route('seller_dashboard.order.view', ['order' => $order->id])])
View order
@endcomponent
@endif


<p>From,</p>
<h2>{{ config('app.name') }}</h2>
@endcomponent

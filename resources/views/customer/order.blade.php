<style>
    img{
        height: 70px;
        width: 70px;
    }
</style>

<ul>
    <img src="{{ asset('storage/images/'. $customer->image) }}" alt="">
    <li>Name: {{ $customer->name }}</li>
    <li>car: {{ $customer->order->car->name }} ({{ $customer->order->car->brand->name }})</li>
    <li>Agent:{{ ucfirst($customer->order->agent->name) }} </li>
    <li>Amount: {{ $customer->order->amount }} </li>
</ul>
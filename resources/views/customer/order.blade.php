<ul>
    <li>Name: {{ $customer->name }}</li>
    <li>car: {{ $customer->order->car->name }} ({{ $customer->order->car->brand->name }})</li>
    <li>Agent:{{ $customer->order->agent->name }} </li>
    <li>Amount: {{ $customer->order->amount }} </li>
</ul>
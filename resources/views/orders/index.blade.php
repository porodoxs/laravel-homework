@extends('layouts')
@section('title', 'Orders')

@section('content')
    <div class="container">
        <h1 class="page-header">@yield('title')</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID заказа</th>
                <th>Партнер</th>
                <th>Стоимость заказа</th>
                <th>Состав заказа</th>
                <th>Статус заказа</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a title="Edit" href="{{url('orders/update/'.$order->id)}}">{{$order->id}}</a></td>
                        <td>{{$order->partner->name}}</td>
                        <td>{{$order->getOrderPrice()}}</td>
                        <td>{{$order->products()->pluck('name')->implode(', ')}}</td>
                        <td>{{$order->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$orders->links()}}
    </div>
@endsection

@extends('layouts')
@section('title')Edit Order - {{$order->id}}@endsection

@section('content')
    <div class="container">
        <h1 class="page-header">@yield('title')</h1>
        <div class="col-md-5">
            {!! Form::model($order,['method'=>'put']) !!}
            <div class="form-group {{$errors->has('client_email')?" has-error":""}}">
                {!! Form::label("client_email","Email клиента",["class"=>"control-label"]) !!}
                {!! Form::text("client_email",null,["class"=>"form-control",'placeholder'=>'Email клиента', 'required'=>'required']) !!}
                {!! $errors->first('client_email','<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group">
                {!! Form::label("partner","Партнер",["class"=>"control-label"]) !!}
                {!! Form::select("partner",$partners,$order->partner->id,["class"=>"form-control"]) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    {!! Form::label("price","Продукты",["class"=>"control-label col-xs-8"]) !!}
                    {!! Form::label("quantity","Количество",["class"=>"control-label col-xs-3"]) !!}
                </div>
                @foreach($order->products()->pluck('quantity', 'name') as $name => $quantity)
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="form-control-static">{{$name}}</p>
                        </div>
                        <div class="col-xs-3">
                            <p class="form-control-static">{{$quantity}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                {!! Form::label("status","Статус заказа",["class"=>"control-label"]) !!}
                {!! Form::select("status",[0=>'Новый',10=>'Подтвержден',20=>'Завершен'],$order->getOriginal('status'),["class"=>"form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label("price","Стоимость заказа",["class"=>"control-label"]) !!}
                {!! Form::text("price",$order->getOrderPrice(),["class"=>"form-control",'readonly']) !!}
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <a href="{{url('orders')}}" class="btn btn-danger">Back</a>
                    {!! Form::button("Save",["type" => "submit","class"=>"btn btn-primary"])!!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

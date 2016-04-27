@extends('app')

@section('content')



    <div class="container">
        <h2>Editar Pedido #{{ $order->id }} - R$ {{ $order->total }}</h2>
        <h4>Cliente: {{ $order->client->user->name }}</h4>
        <h4>Data: {{ $order->created_at }}</h4>


        <p>
            Entregar em: <br>
            {{ $order->client->address }} - {{ $order->client->city }} - {{ $order->client->state }}
        </p>

        <br>



        @if( $errors->any() )
            <ul class="alert">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::model($order, [ 'method' => 'PUT', 'route' => ['admin.orders.update', 'id' => $order->id ]]) !!}

        @include('admin.orders._form')

        <div class="form-group">
            <div class="text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

        {!! Form::close() !!}


    </div>



@endsection
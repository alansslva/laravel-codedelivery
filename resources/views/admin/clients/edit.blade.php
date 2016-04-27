@extends('app')

@section('content')



    <div class="container">
        <h3>Editar Cliente {{ $client->user->name }}</h3>

        @if( $errors->any() )
            <ul class="alert">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::model($client, [ 'method' => 'PUT', 'route' => ['admin.clients.update', 'id' => $client->id ]]) !!}

        @include('admin.clients._form')

        <div class="form-group">
            <div class="text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

        {!! Form::close() !!}


    </div>



@endsection
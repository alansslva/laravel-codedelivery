@extends('app')

@section('content')



    <div class="container">
        <h3>Criar Cliente</h3>

        @if( $errors->any() )
            <ul class="alert">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::open(['route' => 'admin.clients.store']) !!}

        @include('admin.clients._form')

        <div class="form-group">
            <div class="text-right">
                {!! Form::submit('Gravar', ['class' => 'btn btn-success']) !!}
            </div>
        </div>


        {!! Form::close() !!}

    </div>



@endsection
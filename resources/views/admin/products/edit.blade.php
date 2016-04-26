@extends('app')

@section('content')



    <div class="container">
        <h3>Editar Produto {{ $product->name }}</h3>

        @if( $errors->any() )
            <ul class="alert">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::model($product, [ 'method' => 'PUT', 'route' => ['admin.products.update', 'id' => $product->id ]]) !!}

        @include('admin.products._form')

        <div class="form-group">
            <div class="text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

        {!! Form::close() !!}


    </div>



@endsection
@extends('app')

@section('content')



    <div class="container">
        <h3>Editar Categoria {{ $category->name }}</h3>

        @if( $errors->any() )
            <ul class="alert">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::model($category, [ 'method' => 'PUT', 'route' => ['admin.categories.update', 'id' => $category->id ]]) !!}

        @include('admin.categories._form')

        <div class="form-group">
            <div class="text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

        {!! Form::close() !!}


    </div>



@endsection
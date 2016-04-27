@extends('app')

@section('content')



    <div class="container">
        <h3>Criar Categoria</h3>

        @if( $errors->any() )
            <ul class="alert">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::open(['route' => 'admin.categories.store']) !!}

        @include('admin.categories._form')

        <div class="form-group">
            <div class="text-right">
                {!! Form::submit('Gravar', ['class' => 'btn btn-success']) !!}
            </div>
        </div>


        {!! Form::close() !!}

    </div>



@endsection
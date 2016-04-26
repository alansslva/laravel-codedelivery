@extends('app')

@section('content')



    <div class="container">
        <h3>Categorias</h3>

        <a href="{{ route('admin.categories.create') }}">
            <button class="btn">Criar Categoria</button>
        </a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">
                            <button class="btn">Editar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $categories->render() !!}


    </div>



@endsection
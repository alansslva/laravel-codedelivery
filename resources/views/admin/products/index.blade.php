@extends('app')

@section('content')



    <div class="container">
        <h3>Produtos</h3>

        <a href="{{ route('admin.products.create') }}">
            <button class="btn">Criar Produto</button>
        </a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}">
                            <button class="btn">Editar</button>
                        </a>
                        <a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}">
                            <button class="btn">Apagar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->render() !!}


    </div>



@endsection
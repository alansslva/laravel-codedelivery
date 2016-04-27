@extends('app')

@section('content')



    <div class="container">
        <h3>Clientes</h3>

        <a href="{{ route('admin.clients.create') }}">
            <button class="btn">Criar Cliente</button>
        </a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->user->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->city }}</td>
                    <td>{{ $client->price }}</td>
                    <td>
                        <a href="{{ route('admin.clients.edit', ['id' => $client->id]) }}">
                            <button class="btn">Editar</button>
                        </a>
                        <a href="{{ route('admin.clients.destroy', ['id' => $client->id]) }}">
                            <button class="btn">Apagar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $clients->render() !!}


    </div>



@endsection
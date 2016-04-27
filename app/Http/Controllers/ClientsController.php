<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{

    private $repository;

    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->repository->paginate(5);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $client = $this->clientService->create($request->all());
//        $client->save();

        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->repository->find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update($id, Requests\AdminClientRequest $request)
    {
        $client = $this->clientService->update($id, $request->all());

        return redirect()->route('admin.clients.index');
    }
}

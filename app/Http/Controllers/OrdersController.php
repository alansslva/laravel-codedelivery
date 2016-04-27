<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{

    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $orders = $this->repository->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $order = $this->repository->create($request->all());
        $order->save();

        return redirect()->route('admin.orders.index');
    }

    public function edit($id, UserRepository $userRepository)
    {
        $order = $this->repository->find($id);
        $deliverymans = $userRepository->getDeliveryman()->lists('name','id');

        return view('admin.orders.edit', compact('order','deliverymans'));
    }

    public function update($id, Request $request)
    {
        $order = $this->repository->find($id);
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }
}

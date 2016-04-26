<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class ProductsController extends Controller
{

    private $repository, $categoryRepository;

    public function __construct(ProductRepository $repository, CategoryRepository $category)
    {
        $this->repository = $repository;
        $this->categoryRepository = $category;
    }

    public function index()
    {
        $products = $this->repository->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->lists('name','id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(Requests\AdminCategoryRequest $request)
    {
        $category = $this->repository->create($request->all());
        $category->save();

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->lists('name','id');

        return view('admin.products.edit', compact('product','categories'));
    }

    public function update($id, Requests\AdminCategoryRequest $request)
    {
        $category = $this->repository->find($id);
        $category->update($request->all());

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('admin.products.index');
    }
}

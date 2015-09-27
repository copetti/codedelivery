<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;

    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository){
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){
        $products = $this->repository->paginate();

        return view('admin.products.index', compact('products'));
    }

    public function create(){

        $categories = $this->categoryRepository->lists();

        return view('admin.products.create',compact('categories'));
    }

    public function store(AdminProductRequest $request){
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit($id){

        $categories = $this->categoryRepository->lists();

        $product = $this->repository->find($id);

        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AdminProductRequest $request, $id){
        $data = $request->all();

        $this->repository->update($data,$id);

        return redirect()->route('admin.products.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$status)
    {
        $product = $this->repository->find($id);
        $product->status = !$status;
        $product->save();
        return redirect()->route('admin.products.index');
    }
}

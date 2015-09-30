<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdmimOrderRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $repository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(){
        $orders = $this->repository->order('status')->paginate();

        $deliverymans = $this->userRepository->deliverymans();

        return view('admin.orders.index', compact('orders','deliverymans'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request){
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id){
        $category = $this->repository->find($id);

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AdminCategoryRequest $request, $id){
        $data = $request->all();

        $this->repository->update($data,$id);

        return redirect()->route('admin.categories.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$status)
    {
        $category = $this->repository->find($id);
        $category->status = !$status;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

}

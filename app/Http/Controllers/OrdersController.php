<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdmimOrderRequest;
use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrdersController extends Controller
{
    private $repository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->statusList = [
            'novo' =>  0,
            'atendimento' =>  1,
            'entregando' => 2,
            'entregue' => 3
        ];
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index($status=null){

        if(is_null($status)){
            $orders = $this->repository->order('status')->paginate();
        }else{
            $orders = $this->repository->filterBy($this->statusList[$status])->paginate();
        }

        $deliverymans = $this->userRepository->deliverymans();

        $statusList = $this->statusList;

        return view('admin.orders.index', compact('orders','deliverymans','statusList'));
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
        $order = $this->repository->find($id);

        return view('admin.orders.edit',compact('order'));
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

    public function status($id){

        $order = $this->repository->find($id);

        $order->user_deliveryman_id = Input::get('user_deliveryman_id');
        $order->status = Input::get('status');
        $order->save();

        return redirect()->route('admin.orders.index',['status'=>null]);
    }
}

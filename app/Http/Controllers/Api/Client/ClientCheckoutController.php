<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{
    private $repository; // OrderRepository
    private $userRepository;
    private $service;
    private $with = ['client','cupom','items'];

    public function __construct(OrderRepository $repository, UserRepository $userRepository, OrderService $service){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index(){

        $id = Authorizer::getResourceOwnerId();

        $client_id = $this->userRepository->find($id)->client->id;

        $orders = $this->repository
            ->skipPresenter(false)
            ->with($this->with)
            ->scopeQuery(function($query) use($client_id){
            return $query->where('client_id','=', $client_id);
        })->paginate();

        return $orders;
    }

    public function store(CheckoutRequest $request){

        $data = $request->all();

        $id = Authorizer::getResourceOwnerId();

        $cliente_id = $this->userRepository->find($id)->client->id;

        $data['client_id'] = $cliente_id;

        $order = $this->service->create($data);

        return $this->repository
            ->skipPresenter(false)
            ->with($this->with)
            ->find($order->id);
    }

    public function show($id){

        return $this->repository
            ->skipPresenter(false)
            ->with($this->with)
            ->find($id);

    }
}

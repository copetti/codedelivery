<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CheckoutController extends Controller
{
    private $repository; // OrderRepository
    private $userRepository;
    private $productRepository;
    private $service;

    public function __construct(OrderRepository $repository, UserRepository $userRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository, OrderService $service){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    public function index(){

        $client_id = $this->userRepository->find(Auth::user()->id)->client->id;

        $orders = $this->repository->scopeQuery(function($query) use($client_id){
            return $query->where('client_id','=', $client_id);
        })->paginate();

        return View('customer.order.index', compact('orders'));
    }

    public function create(){

        $categories = $this->categoryRepository->getAllActive();

        $products = $this->productRepository->lists();

        return view('customer.order.create', compact('products','categories'));
    }

    public function store(Request $request){

        $data = $request->all();

        $cliente_id = $this->userRepository->find(Auth::user()->id)->client->id;

        $data['client_id'] = $cliente_id;

        $this->service->create($data);

        return redirect()->route('customer.order.index');
    }
}

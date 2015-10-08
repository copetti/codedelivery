<?php
namespace CodeDelivery\Http\Controllers;
use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(OrderRepository $orderRepository)
    {
        $countStatus['novo']        = $orderRepository->getCountByStatus(0);
        $countStatus['atendimento'] = $orderRepository->getCountByStatus(1);
        $countStatus['entregando']  = $orderRepository->getCountByStatus(2);
        $countStatus['entregue']    = $orderRepository->getCountByStatus(3);
        $countStatus['cancelado']   = $orderRepository->getCountByStatus(4);
        $countStatus['todos']       = $countStatus['novo']+$countStatus['atendimento']+$countStatus['entregando']+$countStatus['entregue']+$countStatus['cancelado'];

        return view('admin.dashboard', compact('countStatus'));
    }
}
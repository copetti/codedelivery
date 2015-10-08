<?php
namespace CodeDelivery\Http\Controllers;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use Auth;
class HomeController extends Controller
{
    public function __construct() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return \View::make('home');
    }
}
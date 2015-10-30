@extends('layouts.dashboard')
@section('page_heading','Pedidos')
@section('section')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Meus Pedidos</h3>
                </div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="home">Home</a></li>
                        <li class="active">Pedidos</li>
                    </ol>
                    <a class="btn btn-default pull-left" href="javascript:history.back()">Voltar</a>
                    <a class="btn btn-primary pull-right" href="{{ route('customer.order.create') }}">Novo Pedido <i class="fa fa-plus fa-lg"></i></a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Total</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr >
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->total }}</td>
                                <td>
                                    @if($order->status==0)
                                        <span class="label label-danger">Novo</span>
                                    @endif
                                    @if($order->status==1)
                                        <span class="label label-warning">Em atendimento</span>
                                    @endif
                                    @if($order->status==2)
                                        <span class="label label-primary">Em transporte</span>
                                    @endif
                                    @if($order->status==3)
                                        <span class="label label-success">Entregue</span>
                                    @endif
                                    @if($order->status==4)
                                        <span class="label label-default">Cancelado</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="panel-footer">{!! $orders->render() !!}</div>
            </div>
        </div>
@stop

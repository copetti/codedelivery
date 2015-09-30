@extends('layouts.dashboard')
@section('page_heading','Pedidos')
@section('section')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tabela de Pedidos</h3>
            </div>

            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="home">Home</a></li>
                    <li class="active">Pedidos</li>
                </ol>
                <a class="btn btn-default pull-left" href="javascript:history.back()">Voltar</a>
                <a class="btn btn-primary pull-right" href="{{ route('admin.orders.create') }}">Adicionar <i class="fa fa-plus fa-lg"></i></a>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Entregador</th>
                    <th>Total</th>
                    <th>Pedido</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr >
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->client->name }}</td>
                            <td>{{ isset($order->deliveryman->name) ? $order->deliveryman->name:'' }}</td>
                            <td>{{ $order->total }}</td>
                            <td>
                                @if($order->status==0)
                                    <span class="label label-danger">Novo</span>
                                @endif
                                @if($order->status==1)
                                    <span class="label label-warning">Em andamento</span>
                                @endif
                                @if($order->status==2)
                                    <span class="label label-primary">Em entrega</span>
                                @endif
                                @if($order->status==3)
                                    <span class="label label-success">Entregue</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a class="btn btn-default" href="">
                                        <i class="fa fa-user fa-fw"></i> Ações
                                    </a>
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="fa fa-caret-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('admin.orders.edit',['id'=>$order->id]) }}">
                                                <i class="fa fa-pencil fa-fw"></i> Editar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#myModal{{$order->id}}" id="openBtn" data-toggle="modal">
                                                <i class="fa fa-list fa-fw"></i> Detalhes
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel-footer">{!! $orders->render() !!}</div>
        </div>
    </div>
    @foreach($orders as $order)
        <div class="modal fade" id="myModal{{$order->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title">Pedido #{{$order->id}} - {{ $order->client->name }}</h3>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Detalhes do pedido</h5>
                        <table class="table table-striped" id="tblGrid">
                            <thead id="tblHead">
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                @foreach($order->items as $item)
                                <?php
                                        $subtotal = $item->qtd * $item->product->price;
                                        $total = $total + $subtotal;
                                ?>
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qtd }}</td>
                                    <td>R$ {{ number_format($item->product->price,'2',',','.') }}</td>
                                    <td class="text-right">R$ {{ number_format($subtotal,'2',',','.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                            <strong>Total</strong>  <b class="right">R$ {!! number_format($total,'2',',','.') !!}</b>
                        </div>
                        <div class="modal-body">

                            {!! Form::open(['id'=>'conteudo-form']) !!}

                            {!! Form::hidden('tipo',null,['id'=>'tipo']) !!}

                            <div class="form-group @if ($errors->has('deliveryman_id')) has-error @endif">
                                {!! Form::label('deliveryman_id','Entregador:') !!}
                                {!! Form::select('deliveryman_id',$deliverymans,null,['class'=>'form-control']) !!}
                                @if ($errors->has('deliveryman_id'))
                                    <p class="help-block">{{ $errors->first('deliveryman_id') }}</p>
                                @endif
                            </div>

                            <div class="alert alert-success" role="alert" style="display:none;"></div>

                            {!! Form::close() !!}

                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Entregar</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach
    <script>

        function openModal(order_id){
            $("#order_id").val(order_id)
        }
    </script>
@stop
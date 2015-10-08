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
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Data / Hora</th>
                    <th>Entregador</th>
                    <th>Pedido</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr >
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->client->name }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->created_at->format('m/d/Y H:i:s') }}</td>
                            <td>{{ isset($order->deliveryman->name) ? $order->deliveryman->name:'' }}</td>
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
                            <td class="text-right">
                                <div class="btn-group">
                                    <a class="btn btn-default" href="">
                                        Ações
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
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <div class="thumbnail">
                                        <div class="caption">

                                            {!! Form::open(['route'=>['admin.orders.status',$order->id],'method'=>'post']) !!}

                                            <div class="form-group @if ($errors->has('status')) has-error @endif">
                                                {!! Form::label('status','Status:') !!}
                                                {!! Form::select('status',[0 => 'Novo',1 => 'Em atendimento',2 => 'Em entrega',3 => 'Entregue',4 => 'Cancelado'],$order->status ,['class'=>'form-control']) !!}
                                                @if ($errors->has('status'))
                                                    <p class="help-block">{{ $errors->first('status') }}</p>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('user_deliveryman_id')) has-error @endif">
                                                {!! Form::label('user_deliveryman_id','Entregador:') !!}
                                                {!! Form::select('user_deliveryman_id',$deliverymans,isset($order->deliveryman->id) ? $order->deliveryman->id:null ,['class'=>'form-control']) !!}
                                                @if ($errors->has('user_deliveryman_id'))
                                                    <p class="help-block">{{ $errors->first('user_deliveryman_id') }}</p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                {!! Form::submit('Alterar', ['class'=> 'btn btn-primary']) !!}
                                            </div>

                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach
@stop

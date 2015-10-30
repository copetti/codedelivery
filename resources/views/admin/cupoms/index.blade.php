@extends('layouts.dashboard')
@section('page_heading','Cupons')
@section('section')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tabela de Cupons</h3>
            </div>

            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="home">Home</a></li>
                    <li class="active">Cupons</li>
                </ol>
                <a class="btn btn-default pull-left" href="javascript:history.back()">Voltar</a>
                <a class="btn btn-primary pull-right" href="{{ route('admin.cupoms.create') }}">Adicionar <i class="fa fa-plus fa-lg"></i></a>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Valor</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($cupoms as $cupom)
                        <tr >
                            <td>{{ $cupom->id }}</td>
                            <td>{{ $cupom->code }}</td>
                            <td>R$ {{ number_format($cupom->value,'2',',','.') }}</td>
                            <td>
                                @if($cupom->used==0)
                                    <span class="label label-success">Novo</span>
                                @else
                                    <span class="label label-danger">Usado</span>
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
                                            <a href="{{ route('admin.cupoms.edit',['id'=>$cupom->id]) }}">
                                                <i class="fa fa-pencil fa-fw"></i> Editar
                                            </a>
                                        </li>
                                        @if($cupom->used==0)
                                            <li>
                                                <a href="{{ route('admin.cupoms.destroy',['id'=>$cupom->id,'used'=>0]) }}">
                                                    <i class="fa fa-trash-o fa-fw"></i> Deletar
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('admin.cupoms.destroy',['id'=>$cupom->id,'used'=>1]) }}">
                                                    <i class="fa fa-plus fa-fw"></i> Ativar
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel-footer">{!! $cupoms->render() !!}</div>
        </div>
    </div>

</div>

@stop

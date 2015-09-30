@extends('layouts.dashboard')
@section('page_heading','CLientes')
@section('section')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tabela de Clientes</h3>
            </div>

            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="home">Home</a></li>
                    <li class="active">Clientes</li>
                </ol>
                <a class="btn btn-default pull-left" href="javascript:history.back()">Voltar</a>
                <a class="btn btn-primary pull-right" href="{{ route('admin.clients.create') }}">Adicionar <i class="fa fa-plus fa-lg"></i></a>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>CLiente</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cidade/Estado</th>
                    <th>CEP</th>
                    <th>Status</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr >
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->client->phone }}</td>
                            <td>{{ $user->client->city.'/'.$user->client->state }}</td>
                            <td>{{ $user->client->zipcode }}</td>
                            <td>
                                @if($user->status==1)
                                    <span class="label label-success">Ativo</span>
                                @else
                                    <span class="label label-danger">Inativo</span>
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
                                            <a href="{{ route('admin.clients.edit',['id'=>$user->id]) }}">
                                                <i class="fa fa-pencil fa-fw"></i> Editar
                                            </a>
                                        </li>
                                        @if($user->status==1)
                                            <li>
                                                <a href="{{ route('admin.clients.destroy',['id'=>$user->id,'status'=>1]) }}">
                                                    <i class="fa fa-trash-o fa-fw"></i> Deletar
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('admin.clients.destroy',['id'=>$user->id,'status'=>0]) }}">
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

            <div class="panel-footer">{!! $users->render() !!}</div>
        </div>
    </div>

</div>

@stop

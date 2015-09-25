@extends('layouts.dashboard')
@section('page_heading','Categorias')
@section('section')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tabela de Categorias</h3>
            </div>

            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="home">Home</a></li>
                    <li class="active">Categorias</li>
                </ol>
                <a class="btn btn-default pull-left" href="javascript:history.back()">Voltar</a>
                <a class="btn btn-primary pull-right" href="{{ route('admin.categories.create') }}">Adicionar <i class="fa fa-plus fa-lg"></i></a>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr >
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->status==1)
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
                                            <a href="{{ route('admin.categories.edit',['id'=>$category->id]) }}">
                                                <i class="fa fa-pencil fa-fw"></i> Editar
                                            </a>
                                        </li>
                                        @if($category->status==1)
                                            <li>
                                                <a href="{{ route('admin.categories.destroy',['id'=>$category->id,'status'=>1]) }}">
                                                    <i class="fa fa-trash-o fa-fw"></i> Deletar
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('admin.categories.destroy',['id'=>$category->id,'status'=>0]) }}">
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

            <div class="panel-footer">{!! $categories->render() !!}</div>
        </div>
    </div>

</div>

@stop

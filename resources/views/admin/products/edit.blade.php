@extends('layouts.dashboard')
@section('page_heading','Produto')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ 'Editar Produto - '. $product->name }}</div>
                    <div class="panel-body">
                        {!! Form::model($product,['route'=>['admin.products.update',$product->id],'method'=>'put']) !!}

                        @include('admin.products._form')

                        <div class="form-group">
                            {!! Form::submit('Alterar Produto', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
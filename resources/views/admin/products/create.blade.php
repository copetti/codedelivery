@extends('layouts.dashboard')
@section('page_heading','Produto')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Adicionar Produto</div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'admin.products.store']) !!}

                        @include('admin.products._form')

                        <div class="form-group">
                            {!! Form::submit('Criar Produto', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
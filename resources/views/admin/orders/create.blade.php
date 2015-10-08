@extends('layouts.dashboard')
@section('page_heading','Pedido')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Adicionar Pedido</div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'admin.orders.store']) !!}

                        @include('admin.orders._form')

                        <div class="form-group">
                            {!! Form::submit('Adicionar', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
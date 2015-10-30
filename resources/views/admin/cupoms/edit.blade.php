@extends('layouts.dashboard')
@section('page_heading','Cupom')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ 'Editar Cupom - '. $cupom->code }}</div>
                    <div class="panel-body">
                        {!! Form::model($cupom,['route'=>['admin.cupoms.update',$cupom->id],'method'=>'put']) !!}

                        @include('admin.cupoms._form')

                        <div class="form-group">
                            {!! Form::submit('Alterar', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
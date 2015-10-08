@extends('layouts.dashboard')
@section('page_heading','Cliente')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Adicionar Cliente</div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'admin.clients.store']) !!}

                        @include('admin.clients._form')

                        <div class="form-group">
                            {!! Form::submit('Criar Cliente', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@extends('layouts.dashboard')
@section('page_heading','Cliente')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ 'Editar Cliente - '. $client->user->name }}</div>
                    <div class="panel-body">
                        {!! Form::model($client,['route'=>['admin.clients.update',$client->id],'method'=>'put']) !!}

                        @include('admin.clients._form')

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
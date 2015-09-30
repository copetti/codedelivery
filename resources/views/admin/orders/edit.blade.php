@extends('layouts.dashboard')
@section('page_heading','Categoria')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ 'Editar Categoria - '. $category->name }}</div>
                    <div class="panel-body">
                        {!! Form::model($category,['route'=>['admin.categories.update',$category->id],'method'=>'put']) !!}

                        @include('admin.categories._form')

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
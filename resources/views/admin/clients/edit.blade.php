@extends('layouts.dashboard')
@section('page_heading','Cliente')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ 'Editar Cliente - '. $user->client->name }}</div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>['admin.clients.update',$user->client->id],'method'=>'put']) !!}

                        {!! Form::hidden('user_id', $user->client->user_id) !!}

                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {!! Form::label('name','Nome:') !!}
                            {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
                            @if ($errors->has('name'))
                                <p class="help-block">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            {!! Form::label('email','Email:') !!}
                            {!! Form::text('email', $user->email, ['class'=>'form-control']) !!}
                            @if ($errors->has('email'))
                                <p class="help-block">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('phone')) has-error @endif">
                            {!! Form::label('phone','Telefone:') !!}
                            {!! Form::text('phone', $user->client->phone, ['class'=>'form-control']) !!}
                            @if ($errors->has('phone'))
                                <p class="help-block">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('address')) has-error @endif">
                            {!! Form::label('address','Endereço:') !!}
                            {!! Form::text('address', $user->client->address, ['class'=>'form-control']) !!}
                            @if ($errors->has('address'))
                                <p class="help-block">{{ $errors->first('address') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('city')) has-error @endif">
                            {!! Form::label('city','Cidade:') !!}
                            {!! Form::text('city', $user->client->city, ['class'=>'form-control']) !!}
                            @if ($errors->has('city'))
                                <p class="help-block">{{ $errors->first('city') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('state')) has-error @endif">
                            {!! Form::label('state','Estado:') !!}
                            {!! Form::text('state', $user->client->state, ['class'=>'form-control']) !!}
                            @if ($errors->has('state'))
                                <p class="help-block">{{ $errors->first('state') }}</p>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('zipcode')) has-error @endif">
                            {!! Form::label('zipcode','CEP:') !!}
                            {!! Form::text('zipcode', $user->client->zipcode, ['class'=>'form-control']) !!}
                            @if ($errors->has('zipcode'))
                                <p class="help-block">{{ $errors->first('zipcode') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Alterar Cliente', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
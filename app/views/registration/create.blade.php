@extends('layouts/layout')
@section('content')
      <div class="starter-template">
        <h1>  register create</h1>
        <!-- by posting to route ensures a restful service -->
        {{Form::open(['route' => 'registration.store']) }}
        <!-- username -->
        <div class="form-group">
            {{Form::label('username', 'Username:') }}
            {{Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('username', '<span class="error">:message</span>') }}
        </div>
        
        <!-- e,mail -->
        <div class="form-group">
            {{Form::label('emai', 'Email:') }}
            {{Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('email', '<span class="error">:message </span>')}}

        </div>
        
        <!-- password -->
        <div class="form-group">
            {{Form::label('password', 'Password:') }}
            {{Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) }}
                        {{$errors->first('password', '<span class="error">:message </span>')}}

        </div>
        
        <!-- password_confirmation` -->
        <div class="form-group">
            {{Form::label('password_confirmation', 'Password:') }}
            {{Form::text('password_confirmation', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        
         <!-- submit`` -->
        <div class="form-group">
            {{Form::submit('Create Account', ['class' => 'btn btn-primary']) }}
        </div>
        {{Form::close() }}
      </div>
@stop


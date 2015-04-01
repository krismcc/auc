@extends('layouts/layout')

@section('content')

      <div class="starter-template">

        {{Form::open(['route' => 'manageItems.store', 'files' => true]) }}
        <!-- select auction -->
        <div>
            <!-- ttakes linked list and returns the id linked to the title selected by user -->
            {{Form::select('auction_title', $auctions)}}
        </div>
        
        <div>
            <!-- ttakes linked list and returns the id linked to the title selected by user -->
            {{Form::select('user_email', $users)}}
        </div>
        
        <!-- Title -->
        <div class="form-group">
            {{Form::label('title', 'Title:') }}
            {{Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('title', '<span class="error">:message</span>') }}
        </div>

        <!-- Title -->
        <div class="form-group">
            {{Form::label('thumbnail', 'Thumbnail:') }}
            {{Form::file('thumbnail') }}
        </div>
  
        <!-- description -->
        <div class="form-group">
            {{Form::label('description', 'Description:') }}
            {{Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('description', '<span class="error">:message </span>')}}
        </div>
        
        <!-- reserve -->
        <div class="form-group">
            {{Form::label('reserve', 'Reserve:') }}
            {{Form::text('reserve', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        
         <!-- submit`` -->
        <div class="form-group">
            {{Form::submit('Create Item', ['class' => 'btn btn-primary']) }}
        </div>
         
        {{Form::close() }}
      </div>
@stop


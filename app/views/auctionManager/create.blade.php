@extends('layouts/layout')

@section('content')
      <div class="starter-template">

        {{Form::open(['route' => 'manageAuctions.store']) }}
        
        <!-- Title -->
        <div class="form-group">
            {{Form::label('title', 'Title:') }}
            {{Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('title', '<span class="error">:message</span>') }}
        </div>
        
        <!-- location -->
        <div class="form-group">
            {{Form::label('location', 'Location:') }}
            {{Form::text('location', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('location', '<span class="error">:message </span>')}}
        </div>
        
         <!-- Auction House Name -->
        <div class="form-group">
            {{Form::label('auction_house_name', 'Auction House Name:') }}
            {{Form::text('auction_house_name', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('auction_house_name', '<span class="error">:message </span>')}}
        </div>
        
        <!-- description -->
        <div class="form-group">
            {{Form::label('description', 'Description:') }}
            {{Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{$errors->first('description', '<span class="error">:message </span>')}}
        </div>
       
        <!-- start date of auction ` -->
        <div class="form-group">
            <input type="date" name="startdate">
        </div>
     
        <!-- contact phone number` -->
        <div class="form-group">
            {{Form::label('contact_phone', 'Contact Phone Number:') }}
            {{Form::text('contact_phone', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        
        <!-- contact email` -->
        <div class="form-group">
            {{Form::label('contact_email', 'Contact Email:') }}
            {{Form::text('contact_email', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        
         <!-- submit`` -->
        <div class="form-group">
            {{Form::submit('Create Auction', ['class' => 'btn btn-primary']) }}
        </div>
         
        {{Form::close() }}
        
      </div>
@stop


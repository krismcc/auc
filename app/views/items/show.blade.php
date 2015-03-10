@extends('layouts/layout')

@section('content')

<h1>{{$item->title}}</h1>
<h2> {{$item->description}}</h2>
<h3> {{$item->reserve}}</h3>
<h4>{{$winningBid}}</h4>

<div class="starter-template">

        {{Form::open(['data-remote']) }}

        <!-- bid    -->
        <div class="form-group">
            {{Form::label('bid', 'Bid:') }}
            {{Form::text('bid', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <!-- max bid    -->
        <div class="form-group">
            {{Form::label('max_bid', 'Max Bid:') }}
            {{Form::text('max_bid', null, ['class' => 'form-control']) }}
        </div>
        
         <!-- submit``    -->
        <div class="form-group">
            {{Form::submit('Bid', ['class' => 'btn btn-primary']) }}
        </div>
 
@include('layouts/partials/footer');
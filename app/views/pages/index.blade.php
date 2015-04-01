@extends('layouts/layout')

@section('content')
      <div class="starter-template">
        <h1>  
            {{Auth::check() ? "Welcome, " . Auth::user()->username : "Why dont you sign up?" }}
@if( Session::has( 'success' )){
     {{ Session::get( 'success' ) }}
    }
@elseif( Session::has( 'warning' )){
     {{ Session::get( 'warning' ) }} 
     }
@endif

<style>
 #recent div {
  display: inline;
  margin: 0 1em 0 1em;
  width: 30%;
}
</style>

</br>
</br>
</br>
</br>
</br>
<h5> Recently added items:</h5>
</br>

<div id="recent">
@foreach($recentItems as $recentItem)
<div>

<img src="{{ asset($recentItem->thumbnail) }}" type="text/css" style="height: 100px">

{{$recentItem->title}}
    
</div>

@endforeach
</div>

@stop


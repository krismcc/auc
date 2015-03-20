@extends('layouts/layout')

@section('content')
      <div class="starter-template">
            <a id='btnAddAuction' class='btn btn-success' href='/manageItems/create'> CList Item </a> 
      </div>

@foreach($items as $item)
<li>
    <div class="panel panel-default" style="width:500px" style="position: absolute">
  <div class="panel-heading">
    <h3 class="panel-title">{{$item->title}}</h3>
  </div>
  <div class="panel-body">
    {{$item->description}}
    <br>
    {{"Reserve:",$item->reserve}}
  </div>
            {{link_to("/items/{$item->id}", 'view') }}

</a>
</div>
</li>
@endforeach


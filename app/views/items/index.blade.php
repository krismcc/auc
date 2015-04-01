@extends('layouts/layout')

@section('content')


<div class="container">
@foreach ($allItems as $item)
     <div class="panel panel-default" style="width:800px" style="height:200px" style="position: absolute">

        <div class="panel-heading">
           {{link_to("/items/{$item->id}", $item->title) }}
            <!-- {{$item->title}} -->
         </div>

        <div class="panel-body" style="height: 200px">
            {{$item->description}}
            <br>
            {{"Reserve:",$item->reserve}}
            <img src="{{ asset($item->thumbnail) }}" type="text/css" style="height: 100px">
        </div>


    </div>

@endforeach
</div>
{{$allItems->links() }}

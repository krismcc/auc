@extends('layouts/layout')

@section('content')
      <div class="starter-template">
            <a id='btnAddAuction' class='btn btn-success' href='/manageItems/create'> CList Item </a> 
      </div>

@foreach($items as $item)
<li>
    {{link_to("/items/{$item->id}", $item->title) }} 
</li>
@endforeach


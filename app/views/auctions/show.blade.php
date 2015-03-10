@extends('layouts/layout')

@section('content')

@foreach($items as $item)
    {{link_to("/items/{$item->id}", $item->title) }}

<h1>{{$item->title}}</h1>
<h2> {{$item->description}}</h2>
<h3> {{$item->reserve}}</h3>

@endforeach
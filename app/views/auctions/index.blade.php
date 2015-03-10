@extends('layouts/layout')

@section('content')

@foreach($auctions as $auction)
<li>
    {{link_to("/auctions/{$auction->id}", $auction->title) }}
</li>
@endforeach
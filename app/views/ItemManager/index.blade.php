@extends('layouts/layout')

@section('content')
<style type="text/css"> /*Initializing CSS code*/
img { float: right; }
</style>
    <div style="width:800px; margin:0 auto;">

        <a id='btnAddAuction' class='btn btn-success' href='/manageItems/create'> List Item </a> 


        <div class="starter-template">

        <legend style="color:blue;font-weight:bold;">Items For Sale</legend>

        @foreach($itemsForSale as $item)
                <li>
                    <div class="panel panel-default" style="width:800px" style="height:200px" style="position: absolute">

                        <div class="panel-heading">
                            <!-- <h3 class="panel-title">{{$item->title}}</h3> -->
                            {{link_to("/items/{$item->id}", $item->title) }}
                        </div>

                        <div class="pSanel-body" style="height: 200px">
                            {{$item->description}}
                            <br>
                            {{"Estimation:",$item->reserve}}
                            <img src="{{ asset($item->thumbnail) }}" type="text/css" style="height: 100px">
                        </div>

                        <!--{{link_to("/items/{$item->id}", $item->title, array('class'=>'btn btn-success')) }}-->

                    </div>
                </li>
        @endforeach

        </div>

        <div class="starter-template">

        <legend style="color:blue;font-weight:bold;">Items To Be Auctioned</legend>

        @foreach($itemsToSell as $item)
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

    </div>


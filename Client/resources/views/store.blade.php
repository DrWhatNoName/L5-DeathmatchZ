@extends('main')

@section('breadcrum')
 <li>
    <a href="{{ asset('/shop') }}">Shop</a>
  </li>
  <li>
    <a href="#">View Item Packs </a>
  </li>
@stop

@section('content')

<div class="row-fluid">
@foreach($packs as $key => $pack)
@if($key % 2 === 0)
</div>
<div class="row-fluid">
@endif
<div class="span6">
  <div class="widget">
    <div class="widget-header">
      <div class="title">
        <span class="fs1" aria-hidden="true" data-icon=""></span> View Pack : {{ $pack['name'] }}
      </div>
    </div>
    <div class="widget-body">
      <h5 class="text-info">Pack Information</h5><hr>
         <div class="row-fluid">
             <div class="span4">
             Pack Name:
             </div><div class="span8">
                 {{ $pack['name'] }}
         </div></div>

         <div class="row-fluid">
             <div class="span4">
             Pack Contents:
             </div><div class="span8">
                 {!! $pack['contains'] !!}
         </div></div><br>
         <div class="row-fluid">
             <div class="span4">
             Pack Cost:
             </div><div class="span8">
                 {{ $pack['CostGD'] }} Zombie Dollars<br>
                 {{ $pack['CostGC'] }} GC<br>

         </div></div>

         <a href="{{ asset('/shop/'.$pack['packid']) }}" class="btn btn-success btn-small hidden-phone" data-original-title="">Buy Pack</a>

    </div>
</div>
@endforeach
</div>
@stop
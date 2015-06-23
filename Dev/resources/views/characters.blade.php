@extends('main')
@section('breadcrum')
<li>
  <a href="{{ asset('/accounts') }}">Accounts</a>
</li>
<li>
  <a href="#">Characters</a>
</li>
@stop
@section('content')
<div class="row-fluid">
    <div class="span6">
        <div class="pagination no-margin">
            {!! $characters->render() !!}
        </div>
    </div>
    <div class="span6">
    {!! Form::open(['class' => 'form-horizontal no-margin well', 'url' => asset('/characters/search'), 'method' => 'POST']) !!}
          <div class="input-append">
            {!! Form::text('search', 'Search...', ['class' => 'inputText editable editable-click', 'id' => 'appendedInputButton']) !!}
            {!! Form::submit('Search',['class' => 'class="btn btn-success']) !!}
          </div>
    {!! Form::close() !!}
    </div>
</div>


<table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
<thead>
  <tr>
    <th style="width:10%">ID</th>
    <th style="width:20%">Character Name</th>
    <th style="width:10%" class="hidden-phone">XP</th>
    <th style="width:10%" class="hidden-phone">Reputation</th>
    <th style="width:10%" class="hidden-phone">Status</th>
    <th style="width:10%" class="hidden-phone">Health</th>
    <th style="width:30%" class="hidden-phone">Option</th>
  </tr>
</thead>
<tbody>
@foreach($characters as $character)
  <tr class="gradeX">
    <td>{{ $character->CharID }}</td>
    <td>{{ $character->Gamertag }}</td>
    <td class="hidden-phone">{{ $character->XP }}</td>
    <td class="hidden-phone">{{ $character->Reputation }}</td>
    <td><span class="badge {{ ($character->Alive == 1) ? 'badge-success' : 'badge-important' }} input-bottom-margin">
    {{ ($character->Alive == 1) ? 'Alive' : 'DEAD' }}</span></td>
    <td><span class="badge {{ ($character->Health >= 1) ? 'badge-success' : '' }} input-bottom-margin">
    {{ $character->Health }}</span></td>
    <td class="hidden-phone">
      <a href="{{ asset('/characters/'. $character->CharID) }}" class="btn btn-success btn-small hidden-phone" data-original-title="">View</a>
      <a href="{{ asset('/accounts/'. $character->CustomerID) }}" class="btn btn-small btn-primary hidden-phone" data-original-title="">View Account</a>
      <a href="{{ asset('/accounts/'. $character->CustomerID) }}/edit" class="btn btn-small btn-primary hidden-phone" data-original-title="">Edit Account</a>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
<div class="pagination no-margin">
{!! $characters->render() !!}
</div>
@stop
@extends('main')
@section('breadcrum')
<li>
  <a href="{{ asset('/clans/') }}">Clans</a>
</li>
<li>
  <a href="#">Clans</a>
</li>
@stop
@section('content')
<div class="row-fluid">
<div class="span6">
</div>
    <div class="span6">
    {!! Form::open(['class' => 'form-horizontal no-margin well', 'url' => asset('/clans/search'), 'method' => 'POST']) !!}
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
    <th style="width:5%">ID</th>
    <th style="width:10%">Clan Name</th>
    <th style="width:8%" class="hidden-phone">Clan Tag</th>
    <th style="width:10%" class="hidden-phone">Owner</th>
    <th style="width:30%" class="hidden-phone">Description</th>
    <th style="width:5%" class="hidden-phone">Members</th>
    <th style="width:5%" class="hidden-phone">Limit</th>
    <th style="width:30%" class="hidden-phone">Options</th>
  </tr>
</thead>
<tbody>
@foreach($clans as $clan)
  <tr class="gradeX">
    <td>{{ $clan->ClanID }}</td>
    <td>{{ $clan->ClanName }}</td>
    <td class="hidden-phone">{{ $clan->ClanTag }}</td>
    <td class="hidden-phone">{{ $clan->GamerTag }}</td>
    <td>{{ $clan->ClanLore }}</td>
    <td>{{ $clan->NumClanMembers }}</td>
    <td>{{ $clan->MaxClanMembers }}</td>
    <td class="hidden-phone">
      <a href="{{ asset('/clans/'.$clan->ClanID) }}" class="btn btn-success btn-small hidden-phone" data-original-title="">View</a>
      <a href="{{ asset('/accounts/'.$clan->OwnerCustomerID) }}" class="btn btn-small btn-primary hidden-phone" data-original-title="">View Account</a>
      <a href="{{ asset('/accounts/'.$clan->OwnerCustomerID.'/edit') }}" class="btn btn-small btn-primary hidden-phone" data-original-title="">Edit Account</a>
    </td>
  </tr>
  @endforeach
</tbody>
</table>

@stop
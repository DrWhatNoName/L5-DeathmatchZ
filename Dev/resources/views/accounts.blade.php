@extends('main')
@section('breadcrum')
<li>
  <a href="/accounts">Accounts</a>
</li>
@stop
@section('content')
<div class="row-fluid">
    <div class="span6">
        <div class="pagination no-margin">
        {!! $accounts->render() !!}
        </div>
    </div>
    <div class="span6">
    {!! Form::open(['class' => 'form-horizontal no-margin well', 'url' =>  asset('/accounts/search'), 'method' => 'POST']) !!}
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
    <th style="width:20%">Email</th>
    <th style="width:10%" class="hidden-phone">GC</th>
    <th style="width:10%" class="hidden-phone">Dollars</th>
    <th style="width:10%" class="hidden-phone">Status</th>
    <th style="width:15%" class="hidden-phone">Developer</th>
    <th style="width:30%" class="hidden-phone">Option</th>
  </tr>
</thead>
<tbody>
@foreach($accounts as $account)
  <tr class="gradeX">
    <td>{{ $account->CustomerID }}</td>
    <td>{{ $account->email }}</td>
    <td class="hidden-phone">{{ $account->GamePoints }}</td>
    <td class="hidden-phone">${{ $account->GameDollars }}</td>
    <td><span class="badge {{ ($account->AccountStatus >= 200) ? 'badge-important' : 'badge-success' }} input-bottom-margin">
    {{ ($account->AccountStatus >= 200) ? 'Banned' : 'Active' }}</span></td>
    <td><span class="badge {{ ($account->IsDeveloper == 1) ? 'badge-success' : '' }} input-bottom-margin">
    {{ ($account->IsDeveloper == 1) ? 'Developer' : 'Player' }}</span></td>
    <td class="hidden-phone">
      <a href="{{ asset('/accounts/'. $account->CustomerID .'/characters') }}" class="btn btn-success btn-small hidden-phone" data-original-title="">Characters</a>
      <a href="{{ asset('/accounts/'. $account->CustomerID) }}" class="btn btn-small btn-primary hidden-phone" data-original-title="">view</a>
      <a href="{{ asset('/accounts/'. $account->CustomerID .'/edit') }}" class="btn btn-small btn-primary hidden-phone" data-original-title="">edit</a>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
<div class="pagination no-margin">
{!! $accounts->render() !!}
</div>
@stop
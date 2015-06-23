@extends('main')

 @section('breadcrum')
 <li>
    <a href="{{ asset('/clans') }}">Clans</a>
  </li>
  <li>
    <a href="#">View Clan</a>
  </li>
 @stop
@section('content')
@if(isset($success)&& $success == true)
    <div class="span12">
      <div class="alert alert-block alert-success fade in">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4 class="alert-heading">
        Success
        </h4>
        Clan was edited successfully!
      </div>
    </div>
@elseif(isset($success)&& $success == false)
<div class="span12">
      <div class="alert alert-block alert-error fade in">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4 class="alert-heading">
        Error
        </h4>
        Edit clan was not successful, an error occurred!
      </div>
    </div>
@endif

<div class="row-fluid">
<div class="span6">
  <div class="widget">
    <div class="widget-header">
      <div class="title">
        <span class="fs1" aria-hidden="true" data-icon=""></span> View clan ID : {{ $clan->ClanID }}
      </div>
    </div>
    <div class="widget-body">
      <h5 class="text-info">Clan Information</h5><hr>
      <div class="row-fluid">
          <div class="span4">
          ID:
          </div><div class="span8">
              {{ $clan->ClanID }}
      </div></div>
    <div class="row-fluid">
        <div class="span4">
        Clan Name:
        </div><div class="span8">
            {{ $clan->ClanName }}
    </div></div>
    <div class="row-fluid">
        <div class="span4">
        Clan Tag:
        </div><div class="span8">
            {{ $clan->ClanTag }}
    </div></div>
    <div class="row-fluid">
            <div class="span4">
            Owner:
            </div><div class="span8">
                {{ $clan->GamerTag }}
        </div></div>
    <div class="row-fluid">
            <div class="span4">
            Members:
            </div><div class="span8">
                {{ $clan->NumClanMembers }}/{{ $clan->MaxClanMembers }}
        </div></div>
    <div class="row-fluid">
        <div class="span4">
        Description:
        </div><div class="span8">
            {{ $clan->ClanLore }}
    </div></div>
    <div class="row-fluid">
        <div class="span4">
        Created:
        </div><div class="span8">
            {{ $clan->ClanCreateDate }}
    </div></div>
    </div>
    <div class="row-fluid">
        <div class="span8"></div>
        <div class="span4">
         <a href="{{ asset('/accounts/'.$clan->OwnerCustomerID) }}" class="btn btn-success btn-small hidden-phone" data-original-title="">Account</a>
         <!--<a href="/characters//edit" class="btn btn-small btn-primary hidden-phone" data-original-title="">edit</a>-->
         </div>
         </div>
    </div>
</div>
</div>
<div class="row-fluid">
<div class="span10">
  <div class="widget">
    <div class="widget-header">
      <div class="title">
        <span class="fs1" aria-hidden="true" data-icon=""></span> View clan Members
      </div>
    </div>
<table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
<thead>
  <tr>
    <th style="width:5%">ID</th>
    <th style="width:10%">Name</th>
    <th style="width:8%" class="hidden-phone">XP</th>
    <th style="width:10%" class="hidden-phone">Reputation</th>
    <th style="width:10%" class="hidden-phone">Alive</th>
    <th style="width:5%" class="hidden-phone">Health</th>
    <th style="width:5%" class="hidden-phone">Rank</th>
    <th style="width:30%" class="hidden-phone">Options</th>
  </tr>
</thead>
<tbody>
@foreach($users as $user)
  <tr class="gradeX">
    <td>{{ $user->CharID }}</td>
    <td>{{ $user->Gamertag }}</td>
    <td class="hidden-phone">{{ $user->XP }}</td>
    <td class="hidden-phone">{{ $user->Reputation }}</td>
    <td><span class="badge {{ ($user->Alive == 1) ? 'badge-success' : 'badge-important' }} input-bottom-margin">
        {{ ($user->Alive == 1) ? 'Alive' : 'DEAD' }}</span></td>
    <td><span class="badge {{ ($user->Health >= 1) ? 'badge-success' : '' }} input-bottom-margin">
        {{ $user->Health }}</span></td>
    <td><span class="badge {{ ($user->ClanRank == 0) ? 'badge-success' : '' }} input-bottom-margin">
            {{ ($user->ClanRank == 0) ? 'Owner' : 'Member' }}</span></td>
    <td class="hidden-phone">
      <a href="{{ asset('/characters/'.$user->CharID) }}" class="btn btn-success btn-small hidden-phone" data-original-title="">View</a>
      <a href="{{ asset('/accounts/'.$user->CustomerID) }}" class="btn btn-small btn-primary hidden-phone" data-original-title="">View Account</a>
      <a href="{{ asset('/accounts/'.$user->CustomerID.'/edit') }}" class="btn btn-small btn-primary hidden-phone" data-original-title="">Edit Account</a>
    </td>
  </tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
 @stop
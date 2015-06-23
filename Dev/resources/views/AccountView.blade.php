@extends('main')

 @section('breadcrum')
 <li>
   <a href="{{ asset('/accounts') }}">Accounts</a>
 </li>
  <li>
    <a href="#">View Account {{ $account->CustomerID }}</a>
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
        User was edited successfully!
      </div>
    </div>
@elseif(isset($success)&& $success == false)
<div class="span12">
      <div class="alert alert-block alert-error fade in">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4 class="alert-heading">
        Error
        </h4>
        Edit user was not successful, an error occurred!
      </div>
    </div>
@endif
<div class="span6">
  <div class="widget">
    <div class="widget-header">
      <div class="title">
        <span class="fs1" aria-hidden="true" data-icon=""></span> View Account ID: {{ $account->CustomerID }}
      </div>
    </div>
    <div class="widget-body">
      <h5 class="text-info">Account Information</h5><hr>
      <div class="row-fluid">
          <div class="span4">
          ID:
          </div><div class="span8">
              {{ $account->CustomerID }}
      </div></div>
      <div class="row-fluid">
          <div class="span4">
          Email:
          </div><div class="span8">
              {{ $account->email }}
      </div></div>
      <div class="row-fluid">
      <div class="span4">
      GC:
      </div><div class="span8">
          {{ $account->GamePoints }}
      </div></div>
      <div class="row-fluid">
      <div class="span4">
      Game Dollars:
      </div><div class="span8">
          ${{ $account->GameDollars }}
      </div></div>
      <div class="row-fluid">
      <div class="span4">
      Account Status:
      </div><div class="span8">
          <div class="alert alert-block {{ ($account->AccountStatus >= 200) ? 'alert-error' : 'alert-success' }} fade in">
          <h5 class="alert-heading">
          {{ ($account->AccountStatus >= 200) ? 'Banned' : 'Active' }}
          </h5>
          @if($account->AccountStatus >= 200)
              Reason: {{ $account->BanReason }}<br>
              Date: {{ $account->BanTime }}
          @endif
          </div>
      </div>
      </div>
      <div class="row-fluid">
            <div class="span4">
            Characters Created:
            </div><div class="span8">
                {{ $account->CharsCreated }}
            </div></div>
      <div class="row-fluid">
            <div class="span4">
            Account type:
            </div><div class="span8">
                <span class="badge {{ ($account->IsDeveloper == 1) ? 'badge-success' : '' }} input-bottom-margin">
                {{ ($account->IsDeveloper == 1) ? 'Developer' : 'Player' }}</span></td>
            </div></div>
      </div>
      <div class="row-fluid">
        <div class="span8">
            {!! Form::model($account, ['class' => 'form-horizontal no-margin well', 'url' => 'accounts/'.$account->CustomerID.'/ban', 'method' => 'PATCH']) !!}
            <div class="input-append">
              {!! Form::text('BanReason', null, ['class' => 'inputText editable editable-click', 'id' => 'appendedInputButton']) !!}
              {!! Form::hidden('AccountStatus', '200') !!}
              {!! Form::submit('Q Ban',['class' => 'class="btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div><div class="span4">
            <a href="{{ asset('/accounts/'. $account->CustomerID) }}/characters" class="btn btn-success btn-small hidden-phone" data-original-title="">Characters</a>
            <a href="{{ asset('/accounts/'. $account->CustomerID) }}/edit" class="btn btn-small btn-primary hidden-phone" data-original-title="">edit</a>

      </div></div>
  </div>
</div>


 @stop
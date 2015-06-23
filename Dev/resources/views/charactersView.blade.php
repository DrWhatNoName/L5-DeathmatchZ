@extends('main')

 @section('breadcrum')
 <li>
    <a href="{{ asset('/characters') }}">characters</a>
  </li>
  <li>
    <a href="#">View Characters </a>
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
<div class="row-fluid">
@foreach($characters as $key => $character)
@if($key % 2 === 0)
</div>
<div class="row-fluid">
@endif
<div class="span6">
  <div class="widget">
    <div class="widget-header">
      <div class="title">
        <span class="fs1" aria-hidden="true" data-icon=""></span> View Account ID characters : {{ $character->CustomerID }}
      </div>
    </div>
    <div class="widget-body">
      <h5 class="text-info">Character Information</h5><hr>


      <div class="row-fluid">
          <div class="span4">
          ID:
          </div><div class="span8">
              {{ $character->CharID }}
      </div></div>
    <div class="row-fluid">
        <div class="span4">
        Character Name:
        </div><div class="span8">
            {{ $character->Gamertag }}
    </div></div>
    <div class="row-fluid">
        <div class="span4">
        Character state:
        </div><div class="span8">
            <span class="badge {{ ($character->Alive == 1) ? 'badge-success' : 'badge-important' }} input-bottom-margin">
            {{ ($character->Alive == 1) ? 'Alive' : 'DEAD' }}</span></td>
    </div></div>
    <div class="row-fluid">
            <div class="span4">
            Health:
            </div><div class="span8">
                {{ $character->Health }}
        </div></div>
    <div class="row-fluid">
        <div class="span4">
        XP:
        </div><div class="span8">
            {{ $character->XP }}
    </div></div>
    <div class="row-fluid">
        <div class="span4">
        Reputation:
        </div><div class="span8">
            {{ $character->Reputation }}
    </div></div>
    </div>
    <div class="row-fluid">
        <div class="span8"></div>
        <div class="span4">
         <a href="{{ asset('/accounts/'.$character->CustomerID) }}" class="btn btn-success btn-small hidden-phone" data-original-title="">Account</a>
         <!--<a href="/characters//edit" class="btn btn-small btn-primary hidden-phone" data-original-title="">edit</a>-->
         </div>
         </div>
    </div>

</div>

@endforeach
</div>


 @stop
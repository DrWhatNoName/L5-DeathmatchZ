@extends('main')

@section('breadcrum')
<li>
  <a href="{{ asset('/home') }}">Dashboard</a>
</li>
@stop

@section('content')
<div class="row-fluid">
  <div class="span6">
    <div class="plain-header">
      <h4 class="title">
        Current Game Status
      </h4>
    </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget less-bottom-margin widget-border widget-border">
          <div class="widget-body">
            <div class="current-stats">
              <h4 class="text-info">{{ $accountCount }}</h4>
              <p>Existing Accounts</p>
              <div class="type">
                <span class="fs1 arrow text-info" aria-hidden="true" data-icon="&#xe048;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget less-bottom-margin widget-border">
          <div class="widget-body">
            <div class="current-stats">
              <h4 class="text-success">{{ $serials }}</h4>
              <p>Available Serial Keys</p>
              <div class="type">
                <span class="fs1 arrow text-success" aria-hidden="true" data-icon="&#xe036;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget widget-border">
          <div class="widget-body">
            <div class="current-stats">
              <h4 class="text-warning">{{ $globalInventory }}</h4>
              <p>Total Global Inventory</p>
              <div class="type">
                <span class="fs1 arrow text-warning" aria-hidden="true" data-icon="&#xe077;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget widget-border">
          <div class="widget-body">
            <div class="current-stats"><h4>{{ $bannedCount }}</h4>
              <p>Banned Accounts</p>
              <div class="type">
                <span class="fs1 arrow" aria-hidden="true" data-icon="&#xe0fa;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="span6">
    <div class="plain-header"><h4 class="title">|</h4></div>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget less-bottom-margin widget-border">
          <div class="widget-body">
            <div class="current-stats">
              <h4 class="text-info">{{ $clanCount }}</h4>
              <p>Clans</p>
              <div class="type">
                <span class="fs1 arrow text-info" aria-hidden="true" data-icon="&#xe071;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget less-bottom-margin widget-border">
          <div class="widget-body">
            <div class="current-stats">
              <h4 class="text-error">{{ $zDollarCount }}</h4>
              <p>Total Zombie Dollars</p>
              <div class="type">
                <span class="fs1 arrow text-error" aria-hidden="true" data-icon="&#xe0c6;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget widget-border">
          <div class="widget-body">
            <div class="current-stats">
              <h4 class="text-warning">{{ $charactersCount }}</h4>
              <p>Characters</p>
              <div class="type">
                <span class="fs1 arrow text-warning" aria-hidden="true" data-icon="&#xe070;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
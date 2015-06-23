@extends('main')

 @section('breadcrum')
 <li>
   <a href="{{ asset('/accounts') }}">Accounts</a>
 </li>
  <li>
    <a href="#">Edit</a>
  </li>
 @stop

 @section('content')
 <div class="row-fluid">
 <div class="span6">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon=""></span> Edit Account of ID: {{ $account->CustomerID }}
        </div>
      </div>
      <div class="widget-body">
     {!! Form::model($account, ['class' => 'form-horizontal no-margin well', 'url' =>  asset('accounts/'.$account->CustomerID), 'method' => 'PATCH']) !!}
     <h5 class="text-info">Account Infomation</h5><hr>

     <div class="control-group">
        {!! Form::label('email', 'E-Mail Address', ['class' => 'control-label'])!!}
        <div class="controls">
            {!!Form::text('email', null, ['class' => 'inputText editable editable-click']) !!}
        </div>
     </div>
     <div class="control-group">
        {!! Form::label('GamePoints', 'GC', ['class' => 'control-label'])!!}
        <div class="controls">
            {!!Form::number('GamePoints', null, ['class' => 'inputText editable editable-click']) !!}
        </div>
     </div>
     <div class="input-prepend">
        {!! Form::label('GameDollars', 'Dollars', ['class' => 'control-label'])!!}
        <div class="controls">
            <span class="add-on">$</span> {!! Form::number('GameDollars', null, ['class' => 'inputText editable editable-click', 'id' => 'prependedInput']) !!}
        </div>
     </div>
     <div class="control-group">
        {!! Form::label('AccountStatus', 'Account Status', ['class' => 'control-label']) !!}<br>
        <div class="controls">
            {!!Form::select('AccountStatus', [
                '100' => 'Active',
                '200' => 'Permanent Ban',
                '201' => 'Temporary Ban',
                '202' => 'Hardware ID Ban',
                '203' => 'IP Ban',
                '999' => 'Account Deleted Ban',
            ]) !!}
        </div>
     </div>
     <div class="control-group">
       <label class="control-label" for="date_range1">
         Ban Expire Date:
       </label>
       <div class="controls">
         <div class="input-append">
           <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Select Date"/>
           <span class="add-on">
             <i class="icon-calendar"></i>
           </span>
         </div>
       </div>
     </div>
     <div class="control-group">
       <label class="control-label" for="timepicker2">
         Ban Expire Time:
       </label>
       <div class="controls">
         <div class="bootstrap-timepicker">
           <input class="span8" name="time" id="timepicker2" type="text" value="10:40 AM" >
         </div>
       </div>
     </div>
     <div class="control-group">
        {!! Form::label('BanReason', 'Ban Reason', ['class' => 'control-label'])!!}
        <div class="controls">
            {!!Form::text('BanReason', null, ['class' => 'inputText editable editable-click']) !!}
        </div>
     </div>
     <div class="control-group">
             {!! Form::label('IsDeveloper', 'IsDeveloper', ['class' => 'control-label'])!!}
             <div class="controls">
                 {!!Form::number('IsDeveloper', null, ['class' => 'inputText editable editable-click']) !!}
             </div>
          </div>

     <br/>
     {!! Form::submit('Submit',['class' => 'class="btn btn-success']) !!}
     {!! Form::close() !!}
   </div>
  </div>
 </div>
</div>


@stop
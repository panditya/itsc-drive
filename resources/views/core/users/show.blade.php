@extends('layouts.app')
@section('title')
Show user  {{$user->officer->name}}
@stop

@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                        <h4 class="title">The user :  {{$user->officer->name}}</h4>
                      </div>
                      <div class="content">
                       <ul>
                               <div class="row">
                                   {!! Form::label('officer_id', 'NIP', ['class' => 'col-md-4 control-label']) !!}
                                   <div class="col-sm-6">
                                       {{$user->officer_id}}
                                   </div>
                               </div>

                              <div class="row">
                                   {!! Form::label('name','Name', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                      {{$user->officer->name}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$user->officer->email}}
                                  </div>
                              </div>

                              <div class="row">
                              <br>
                              <div class="col-md-6 col-md-offset-4">
                                  <a href="{{route('user.index')}}" class="btn btn-default">Return to  all users</a>
                                  </div>
                              </div>
                          </ul>

                          </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection

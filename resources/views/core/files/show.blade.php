@extends('layouts.app')
@section('title')
Show Approval
@stop

@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                        <h4 class="title">The Officer : {{$approval->officer->name}}</h4>
                      </div>
                      <div class="content">
                       <ul>
                               <div class="row">
                                    {!! Form::label('updated_at', 'Last Updated At', ['class' => 'col-md-4 control-label']) !!}
                                   <div class="col-sm-6">
                                      {{$approval->updated_at}}
                                   </div>
                               </div>

                               <div class="row">
                                   {!! Form::label('signature', 'Signature', ['class' => 'col-md-4 control-label']) !!}
                                   <div class="col-sm-6">
                                       <img src="{{ URL::asset('/images/approval/'.$approval->signature) }}" alt="{{$approval->officer->name}}" width="200px">
                                   </div>
                               </div>

                              <div class="row">
                                   {!! Form::label('name','Name', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                      {{$approval->officer->name}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('nip', 'NIP', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$approval->officer_id}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('created_at', 'Created At', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$approval->created_at}}
                                  </div>
                              </div>

                              <div class="row">
                              <br>
                                <div class="col-md-6 col-md-offset-4">
                                  <a href="{{route('approval.edit', $approval->id)}}" class="btn btn-default">Change / Edit</a>
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

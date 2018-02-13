@extends('layouts.app')
@section('title')
Show Officer  {{$officer->name}}
@stop

@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                        <h4 class="title">The Officer : {{$officer->name}}</h4>
                      </div>
                      <div class="content">
                       <ul>
                               <div class="row">
                                   {!! Form::label('officer_id', 'NIP', ['class' => 'col-md-4 control-label']) !!}
                                   <div class="col-sm-6">
                                       {{$officer->id}}
                                   </div>
                               </div>

                              <div class="row">
                                   {!! Form::label('name','Name', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                      {{$officer->name}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$officer->email}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('phonenumber', 'Phone Number', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$officer->phonenumber}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$officer->gender}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('dateofbirth', 'Date of Birth', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$officer->dateofbirth}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$officer->address}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('created_at', 'Created At', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$officer->created_at}}
                                  </div>
                              </div>

                              <div class="row">
                                   {!! Form::label('updated_at', 'Updated At', ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-sm-6">
                                     {{$officer->updated_at}}
                                  </div>
                              </div>
                              @if (!$officer->deleted_at === null)
                                <div class="row">
                                     {!! Form::label('deleted_at', 'Deleted At', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-sm-6">
                                       {{$officer->deleted_at}}
                                    </div>
                                </div>
                              @endif

                              <div class="row">
                              <br>
                                <div class="col-md-6 col-md-offset-4">
                                  <a href="{{route('officer.index')}}" class="btn btn-default">Return to  all officers</a>
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

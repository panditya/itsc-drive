@extends('layouts.app')
@section('title')
Edit Approval
@endsection

@section('breadcrumbs')
  {!! Breadcrumbs::render('user.create') !!}
@endsection

@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                        <h4 class="title">Edit Approval</h4>
                      </div>
                      <div class="content">
                            @if (count($errors) > 0)
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="alert alert-danger">
                                                <strong>Upsss !</strong> There is an error...<br /><br />
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                        {{ Form::model($approval, array('method' => 'PATCH', 'url' => route('approval.update', $approval->id), 'class' => 'form-horizontal', 'files' => true)) }}
                        <ul>
                            <div class="form-group {{ $errors->has('officer_id') ? 'has-error' : ''}}">
                                 {!! Form::label('officer_id','Officer', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-sm-6">

                                    {!! Form::select('officer_id', $officer, null, ['class' => 'form-control border-input'], ['placeholder' => 'Pick one...']) !!}
                                    {!! $errors->first('officer_id', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('signature') ? 'has-error' : ''}}">
                                 {!! Form::label('signature', 'Signature', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::file('signature', ['class' => 'form-control border-input', 'accept' => 'image/*']) !!}
                                    {!! $errors->first('signature', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-3">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                                </div>
                                <div class="col-sm-offset-4">
                                    <a href="{{route('approval.index')}}" class="btn btn-default">Return to Approval</a>
                                </div>
                            </div>


                        </ul>

                    {{ Form::close() }}

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection

@section('scripts')

@endsection

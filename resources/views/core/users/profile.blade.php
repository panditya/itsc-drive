@extends('layouts.app')

@section('title')
  Profile
@endsection

@section('style')

  <!--  Material Style -->
  <link href="{{ asset('/mdb/assets/css/material-dashboard.css') }}" rel="stylesheet">

@endsection

@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header card-chart" data-background-color="green">
                      </div>
                      <div class="card-content">
                          <h4 class="title">Total Downloads</h4>
                          <p class="category">
                              <span class="text-success"><i class="fa fa-download"></i></span>
                              Summary from all files.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header card-chart" data-background-color="orange">
                      </div>
                      <div class="card-content">
                          <h4 class="title">Total Reports</h4>
                          <p class="category">
                            <span class="text-danger"><i class="fa fa-exclamation-triangle"></i></span>
                            Summary report from users.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header card-chart" data-background-color="red">
                      </div>
                      <div class="card-content">
                          <h4 class="title">Total Files</h4>
                          <p class="category">
                            <span><i class="fa fa-server"></i></span>
                            All files available.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('scripts')

  <!-- Material Dashboard Core JavaScript -->
  <script src="{{ asset('/mdb/assets/js/material.min.js') }}"></script>
	<script src="{{ asset('/mdb/assets/js/material-dashboard.js') }}"></script>

@endsection

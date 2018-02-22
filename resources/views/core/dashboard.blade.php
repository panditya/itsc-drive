@extends('layouts.app')

@section('title')
  Dashboard
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
                          <h1><i class="fa fa-download"></i> {{ $files_dl_count }} </h1>
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
                          <h1><i class="fa fa-exclamation-triangle"></i> {{ count($reports) }} </h1>
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
                          <h1 class="block"><i class="fa fa-server"></i> {{ count($files) }} </h1>
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
          <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Reports</h4>
                        <p class="category">List of file all user reports</p>
                    </div>
                    <div class="card-content table-responsive">
                      <table class="table table-hover" id="ReportsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->description}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Users</h4>
                        <p class="category">List of registered users</p>
                    </div>
                    <div class="card-content table-responsive">
                      <table class="table table-hover" id="UsersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>
                                        <a href="{{route('user.destroy', $u->id)}}" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Files</h4>
                        <a href="{{route('file.create')}}" class="pull-right" data-toggle="modal" data-target="#addFileModal">
                          <h4><i class="fa fa-plus"></i></h4>
                        </a>
                        <p class="category">List of all files uploaded</p>
                    </div>
                    <div class="card-content table-responsive">
                      <table class="table table-hover" id="FilesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $f)
                                <tr>
                                    <td>{{$f->id}}</td>
                                    <td>{{$f->category->name}}</td>
                                    <td>{{$f->name}}</td>
                                    <td>{{$f->description}}</td>
                                    <td>
                                      <form action="{{route('file.destroy',$f->id)}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <input type="submit" class="btn btn-danger btn-xs" value="Delete"/>
                                      </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Category</h4>
                        <a href="{{route('category.create')}}" class="pull-right" data-toggle="modal" data-target="#addCategoryModal">
                          <h4><i class="fa fa-plus"></i></h4>
                        </a>
                        <p class="category">List of file categories</p>
                    </div>
                    <div class="card-content table-responsive">
                      <table class="table table-hover" id="CategoriesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c)
                                <tr>
                                    <td>{{$c->id}}</td>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->description}}</td>
                                    <td>
                                        <a href="{{route('category.destroy', $c->id)}}" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Report Type</h4>
                        <a href="{{route('report-type.create')}}" class="pull-right" data-toggle="modal" data-target="#addReportTypeModal">
                          <h4><i class="fa fa-plus"></i></h4>
                        </a>
                        <p class="category">List of available report type for users</p>
                    </div>
                    <div class="card-content table-responsive">
                      <table class="table table-hover" id="ReportTypesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($report_types as $rp)
                                <tr>
                                    <td>{{$rp->id}}</td>
                                    <td>{{$rp->name}}</td>
                                    <td>{{$rp->description}}</td>
                                    <td>
                                        <a href="{{route('user.destroy', $rp->id)}}" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>
  @include('core.categories.create')
  @include('core.files.create')
@endsection

@section('scripts')

  <!-- Material Dashboard Core JavaScript -->
  <script src="{{ asset('/mdb/assets/js/material.min.js') }}"></script>
	<script src="{{ asset('/mdb/assets/js/material-dashboard.js') }}"></script>

@endsection

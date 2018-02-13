@extends('layouts.app')

@section('title')
  Officers
@endsection

@section('breadcrumbs')
  {!! Breadcrumbs::render('officers') !!}
@endsection

@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                        <div class="row">
                          <div class="col-md-6">
                            <a href="{{route('officer.create')}}" class="btn btn-success">New Officer</a>
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="{{route('officer.export')}}" class="btn btn-success">Export Data Officer</a>
                          </div>
                        </div>
                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-striped" id="tblOfficers">
                            <thead>
                                <tr>
                                    <th>Pilih semua <input name="select_all" value="1" id="example-select-all" type="checkbox" /></th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($officers as $officer)
                                    <tr>
                                        <td>{{ Form::checkbox('sel', $officer->id, null)}}</td>
                                        <td>{{$officer->id}}</td>
                                        <td><a href="{{route('officer.show', $officer->id)}}">{{$officer->name}}</a></td>
                                        <td><a href="{{route('officer.show', $officer->id)}}">{{$officer->email}}</a></td>
                                        <td>{{$officer->phonenumber}}</td>
                                        <td>{{$officer->gender}}</td>
                                        <td>{{$officer->dateofbirth}}</td>
                                        <td>{{$officer->address}}</td>
                                        <td>
                                            <a href="{{route('officer.show', $officer->id)}}" class="btn btn-success btn-xs">View</a>
                                            {!! Form::open(['method'=>'DELETE', 'route' => ['officer.destroy', $officer->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs','id'=>'delete-confirm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                          <button id="delete_all" class='btn btn-danger btn-xs'>Delete Selected</button>
                          @endsection
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        table = $('#tblOfficers').DataTable({
          responsive: true,
            'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
            }],
          'order': [1, 'asc']
            });
    });
      // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });
  $("input#delete-confirm").on("click", function(){
        return confirm("Are you sure to delete this officer");
    });
  // start Delete All function
  $("#delete_all").click(function(event){
        event.preventDefault();
        if (confirm("Are you sure to Delete Selected?")) {
            var value=get_Selected_id();
            if (value!='') {

                 $.ajax({
                    type: "POST",
                    cache: false,
                    url : "{{action('OfficerController@ajax_all')}}",
                    data: {all_id:value,action:'delete'},
                        success: function(data) {
                          location.reload()
                        }
                    })

                }else{return confirm("You have to select any item before");}
        }
        return false;
   });
  //End Delete All Function

   function get_Selected_id() {
    var searchIDs = $("input[name=sel]:checked").map(function(){
      return $(this).val();
    }).get();
    return searchIDs;
   }
</script>
@endsection

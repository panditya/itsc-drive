@extends('layouts.app')

@section('title')
  Users
@endsection

@section('breadcrumbs')
  {!! Breadcrumbs::render('users') !!}
@endsection

@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                        <a href="{{route('user.create')}}" class="btn btn-success">New User</a>
                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-striped" id="tblUsers">
                            <thead>
                                <tr>
                                    <th>Pilih semua <input name="select_all" value="1" id="example-select-all" type="checkbox" /></th>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Terakhir masuk</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ Form::checkbox('sel', $user->id, null, ['class' => ''])}}</td>
                                        <td>{{$user->id}}</td>
                                        <td><a href="{{route('user.show', $user->id)}}">{{$user->officer_id}}</a></td>
                                        <td><a href="{{route('user.show', $user->id)}}">{{$user->officer->name}}</a></td>
                                        <td>{{$user->last_login}}</td>
                                        <td>
                                            <a href="{{route('user.show', $user->id)}}" class="btn btn-success btn-xs">View</a>
                                            {!! Form::open(['method'=>'DELETE', 'route' => ['user.destroy', $user->id], 'style' => 'display:inline']) !!}
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
        table = $('#tblUsers').DataTable({
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
        return confirm("Are you sure to delete this user");
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
                    url : "{{action('UserController@ajax_all')}}",
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

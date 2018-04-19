<!-- Report Modal -->
<div class="modal fade" id="addReportModal{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="addReportModalModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addReportModalModalTitle">Report file</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('report.store') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <input type="hidden" name="files_id" value="{{$file->id}}">
                    <div class="form-group {{ !$errors->has('type_id') ?: 'has-error' }}">
                        <label>Report as</label>
                          @foreach ($report_types as $item)
                            <input type="radio" name="type_id" value="{{$item->id}}"> {{$item->name}}
                          @endforeach
                        <span class="help-block text-danger">{{ $errors->first('type_id') }}</span>
                    </div>

                    <div class="form-group {{ !$errors->has('content') ?: 'has-error' }}">
                        <label>additional</label>
                        <textarea name="content" rows="8" cols="80" class="form-control"></textarea>
                        <span class="help-block text-danger">{{ $errors->first('content') }}</span>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-danger">Submit Report</button>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

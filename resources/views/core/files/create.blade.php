<!-- Modal -->
<div class="modal fade" id="addFilesModal" tabindex="-1" role="dialog" aria-labelledby="addFilesModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addFilesModalTitle">Upload New File</h5>
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

                <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <div class="form-group custom-file {{ !$errors->has('category') ?: 'has-error' }}">
                        <label>Category</label>
                        <select name="category" class="custom-select">
                          @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        <span class="help-block text-danger">{{ $errors->first('category') }}</span>
                    </div>

                    <div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="form-group {{ !$errors->has('description') ?: 'has-error' }}">
                        <label>Description</label>
                        <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                        <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                    </div>

                    <div class="form-group {{ !$errors->has('icon') ?: 'has-error' }}">
                        <label>Icon</label>
                        <input type="file" name="icon" class="custom-file-input">
                        <span class="help-block text-danger">{{ $errors->first('icon') }}</span>
                    </div>

                    <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                        <label>File</label>
                        <input type="file" name="file" class="custom-file-input">
                        <span class="help-block text-danger">{{ $errors->first('file') }}</span>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

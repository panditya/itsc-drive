<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalTitle">New Category</h5>
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

                <form action="{{ route('category.store') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('post') }}

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

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

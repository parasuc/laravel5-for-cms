<a data-toggle="modal" class="btn btn-danger btn-mini" href="#modal-delete-{!! $data->id !!}">
  Delete
</a>
<div id="modal-delete-{!! $data->id !!}" class="modal text-left fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route($name.'.destroy',$data->id) }}" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="DELETE">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h1 class="modal-title">Delete Data</h1>
          </div>
          <div class="modal-body">
            <p>
              Are you sure want to delete this data?
            </p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


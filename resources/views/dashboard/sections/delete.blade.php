<div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/sections_trans.warning') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sections.destroy', 'test') }}" method="post">

                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <div class="modal-body">
                            {{ trans('Dashboard/sections_trans.warning_message') }} <strong
                                class="text-danger">{{ $section->name }}</strong> ?
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $section->id }}" class="form-control"
                            id="recipient-name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">{{ trans('Dashboard/sections_trans.delete') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/sections_trans.close') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>

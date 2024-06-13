<!-- Modal trigger button -->
<button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#modal-{{ $photo->id }}">
    <i class="fas fa-trash fa-sm fa-fw"></i>
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modal-{{ $photo->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId-{{ $photo->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId-{{ $photo->id }}">
                    Deliting <i class="fa fa-photo" aria-hidden="true"></i>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">You are about to delete forever this photo for your database! Are you soure?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <form action="{{ route('admin.photographys.destroy', $photo) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Confirm
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

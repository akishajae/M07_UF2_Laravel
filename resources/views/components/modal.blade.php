<div class="modal fade" id="{{ $modalId ?? 'modal' }}" tabindex="-1" role="dialog"
    aria-labelledby="{{ $modalId ?? 'modal' }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase text-danger" id="modalConfirmDeleteLongTitle">
                    {{ $title ?? '' }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {{ $body ?? '' }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ $btnSecondary ?? 'Cancelar' }}
                </button>
                <div>
                    {!! $btnPrimary ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</div>
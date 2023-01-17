@push('plugin-styles')
    <link href="{{ asset('assets/plugins/fullcalendar/main.min.css') }}" rel="stylesheet" />
@endpush

<div>
    <div id='fullcalendar'></div>
    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle1" class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"><span class="visually-hidden">close</span></button>
                </div>
                <div id="modalBody1" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/main.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        var events = {!! json_encode($events->toArray()) !!}
    </script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>

@endpush

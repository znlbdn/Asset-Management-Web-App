@extends('layouts.modal')

@section('modal-content')
    <h5 class="modal-title" id="exampleModalLabel">Akhiri Sesi Anda?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
        <img src="{{ asset('SB-Admin-2') }}/img/exit.png" style="max-width: 200px">
        <p class="mt-3">Pilih "Logout" dibawah jika ingin mengakhiri sesi</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="/logout">Logout</a>
    </div>
@endsection

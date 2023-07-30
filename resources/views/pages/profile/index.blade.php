@extends('layouts.v_template')

@section('content')
    <section class="section">

        @if (auth()->user()->role != 1)
            @include('pages.profile.general')
        @else
            @include('pages.profile.general')
        @endif



    </section>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 d-flex flex-column justify-content-center align-items-center">
                            <img id="preview"
                                src="{{ auth()->user()->foto == '' ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/' . auth()->user()->foto . '/' . auth()->user()->foto) }}"
                                alt="" class="rounded-circle mb-2" width="100">
                            <label for="ket_simulator">Ganti foto profile</label>
                            <div class="custom-file">
                                <form action="{{ URL::to('/ubah_foto_profile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input accept="image/*" wire:model='photo' required type="file"
                                        class="custom-file-input" id="customFile" name="foto" onchange="loadFile(event)">
                                    <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var loadFile = function(event) {
            var output = document.querySelector('#preview');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
        $('#liProfile').addClass('active');
    </script>
@endsection

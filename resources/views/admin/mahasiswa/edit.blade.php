@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
<link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endpush

@section('content')

<div class="container">

    <div class="container">
        <div class="row layout-top-spacing">

            <div id="basic" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Data Mahasiswa</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">


                        <div class="row">
                            <div class="col-lg-6 col-12 mx-auto">
                                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama"
                                            value="{{ $mahasiswa->nama_mahasiswa }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nim" class="form-control" placeholder="NIM"
                                            value="{{ $mahasiswa->nim }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin"></label>
                                        <select class="form-control basic" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="{{ $mahasiswa->id }}">{{
                                                $mahasiswa->jenis_kelamin }}
                                            </option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi_id"></label>
                                        <select class="form-control basic" name="prodi_id" id="prodi_id">
                                            <option selected="selected">Program Studi...</option>
                                            @foreach ($prodi as $item)
                                            <option value="{{ $item['id'] }}" {{ $item['id']==$mahasiswa->prodi_id ?
                                                'selected' : '' }}>{{ $item['nama_prodi'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="submit" class="mt-4 btn btn-primary">
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('plugins/flatpickr/custom-flatpickr.js') }}"></script>
@endpush

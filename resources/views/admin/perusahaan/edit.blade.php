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
                                <h4>Data Perusahaan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">


                        <div class="row">
                            <div class="col-lg-6 col-12 mx-auto">
                                <form action="{{ route('admin.perusahaan.update', $perusahaan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" name="nama_perusahaan" class="form-control"
                                            placeholder="Nama perusahaan" value="{{ $perusahaan->nama_perusahaan}}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="alamat_perusahaan" class="form-control"
                                            placeholder="Alamat perusahaan" value="{{ $perusahaan->alamat_perusahaan}}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="kota_kecamatan" class="form-control"
                                            placeholder="Kota kecamatan" value="{{ $perusahaan->kota_kecamatan}}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email"
                                            value="{{ $perusahaan->email}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="no_perusahaan" class="form-control"
                                            placeholder="No perusahaan" value="{{ $perusahaan->no_perusahaan}}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="no_telpn_contact_person" class="form-control"
                                            placeholder="No telpon contact person"
                                            value="{{ $perusahaan->no_telpn_contact_person}}" required>
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
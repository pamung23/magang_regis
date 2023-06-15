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
        <div class="row layout-top-spacing" id="cancel-row">
            <div id="basic" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Data Program Studi</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-6 col-12 mx-auto">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li class="text-capitalize">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('surat.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <p>Tanggal Mulai Magang</p>
                                        <input type="date" name="tanggal_mulai" class="form-control datepicker"
                                            placeholder="Tanggal Mulai Mangang" required>
                                    </div>
                                    <div class="form-group">
                                        <p>Tanggal Selesai Magang</p>
                                        <input type="date" name="tanggal_selesai" class="form-control datepicker"
                                            placeholder="Tanggal Selesai Mangang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi_id"></label>
                                        <select class="form-control basic" name="prodi_id" id="prodi_id">
                                            <option selected="selected">Program Studi...</option>
                                            @foreach ($prodi as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['nama_prodi'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="perusahaan_id"></label>
                                        <select class="form-control basic" name="perusahaan_id" id="perusahaan_id">
                                            <option selected="selected">Perusahaan...</option>
                                            @foreach ($perusahaan as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['nama_perusahaan'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p>Nama Mahasiswa Peserta Magang</p>
                                        <label for="mahasiswa"></label>
                                        <select class="form-control basic" data-live-search="true" id="mahasiswa"
                                            multiple="multiple" name="mahasiswa[]">
                                            @foreach ($mahasiswa as $item)
                                            <option value="{{ $item['id'] }}"> {{ $item['nim'] }} |
                                                {{ $item['nama_mahasiswa'] }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Nama Mahasiswa</th>
                                                </tr>
                                            </thead>
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
    {{-- <script>
        var ss = $(".basic").select2({
    tags: true,
});
    </script> --}}

    <script>
        $(function () {
        $('.datepicker').flatpickr({
            dateFormat: "d F Y",
        });
    });
    </script>
    <script>
        $(function () {
        $('#mahasiswa').on('change', function() {
        teks = $(this).children("option").filter(":selected").map(function(i, data){
            return ($(data).text());
        }).get()

        htmlText='';
        teks.forEach(function(item){
            nim = item.substring(0, item.indexOf('|')).trim();
            nama_mahasiswa = item.substring(item.indexOf('|')+1).trim();

            htmlText += "<tr><td>"+nim+"</td><td>"+nama_mahasiswa+"</td></tr>"
        })

        $('#example1').find('tbody').html(htmlText);
         //alert()});

    });
});
    </script>
    @endpush
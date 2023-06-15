@extends('mahasiswa.layouts.app')

@section('title', 'Data Dispensasi')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('mahasiswa/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('mahasiswa/plugins/table/datatable/dt-global_style.css') }}">
@endpush

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="widget-content widget-content-area br-6 mt-4">
        <div class="widget-header">
            <div class="row py-2 m-auto">
                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                    <h5>Data Pendaftaran Magang</h5>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 col-6 m-auto text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('pendaftaran.create') }}"> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="table-responsive mb-4 mt-4">
            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Mulai - Tanggal selesai</th>
                        <th>Prodi</th>
                        <th>Status surat</th>
                        <th>Perusahaan</th>
                        <th>Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat as $item)
                    @if ($item->mahasiswa->contains(auth()->guard('mahasiswa')->user()->id))
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_mulai }} - {{ $item->tanggal_selesai }}</td>
                        <td>{{ $item->prodis->nama_prodi }}</td>
                        <td>{{ $item->status_surat_prodi }}</td>
                        <td>{{ $item->perusahaan->nama_perusahaan }}</td>
                        <td>
                            @if ($item->mahasiswa->count() > 0)
                            @foreach ($item->mahasiswa as $mahasiswa)
                            <ul>
                                <li>{{ $mahasiswa->nama_mahasiswa }}</li>
                            </ul>
                            @endforeach
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            <form id="edit-user-form-{{ $item->id }}"
                                action="{{ route('pendaftaran.edit', $item->id) }}" method="GET"
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-outline-warning btn-sm">Edit</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('mahasiswa/plugins/table/datatable/datatables.js') }}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>
@endpush
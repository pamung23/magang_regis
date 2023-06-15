@extends('mahasiswa.layouts.app')

@section('title', 'Home')

@push('styles')
<link href="{{ asset('mahasiswa/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
    <div class="bio layout-spacing ">
        <div class="widget-content widget-content-area py-3">
            <h3 class="">Informasi</h3>
            <div class="col-md-10">
                <table class="table table-borderless">
                    <tr>
                        <th>NIM </th>
                        <td>:</td>
                        <td>{{ $mahasiswa->nim ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $mahasiswa->nama_mahasiswa ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{ $mahasiswa->alamat ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>{{ $mahasiswa->jenis_kelamin ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>:</td>
                        <td>{{ $mahasiswa->prodi->nama_prodi ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>:</td>
                        <td>{{ $mahasiswa->semester ?? '' }}</td>
                    </tr>
                    <!-- Informasi surat -->
                    @if($surat)
                    <tr>
                        <th>Status Surat</th>
                        <td>:</td>
                        <td>
                            @if($surat->status_surat_prodi === 'Di Setujui')
                            <span class="badge badge-success">Approve</span>
                            @elseif($surat->status_surat_prodi === 'Pending')
                            <span class="badge badge-info">Pending</span>
                            @elseif($surat->status_surat_prodi === 'Di Tolak')
                            <span class="badge badge-danger">DI Tolak</span>
                            @endif
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th>Status Surat</th>
                        <td>:</td>
                        <td><span class="badge badge-info">Belum ada surat</span></td>
                    </tr>
                    @endif

                    @if($surat)
                    <tr>
                        <th>Print Surat</th>
                        <td>:</td>
                        <td>
                            @if($surat->status_surat_akademik === 'Sudah Di Print')
                            <span class="badge badge-success">Di Print</span>
                            @elseif($surat->status_surat_akademik === 'Pending')
                            <span class="badge badge-info">pending</span>
                            @endif
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th>Print Surat</th>
                        <td>:</td>
                        <td><span class="badge badge-danger">Belum ada surat</span></td>
                    </tr>
                    @endif

                    @if($surat)
                    <tr>
                        <th>Balasan Perusahaan Perusahaan</th>
                        <td>:</td>
                        <td>
                            @if($surat->status_surat_akademik2 === 'Di Setujui')
                            <span class="badge badge-success">Di Setujuin</span>
                            @elseif($surat->status_surat_akademik2 === 'belum')
                            <span class="badge badge-info">Belum Ada Balasan Surat</span>
                            @elseif($surat->status_surat_akademik2 === 'Di Tolak')
                            <span class="badge badge-danger">DI Tolak</span>
                            @endif
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th>Status Surat</th>
                        <td>:</td>
                        <td><span class="badge badge-danger">Belum ada surat</span></td>
                    </tr>
                    @endif

                </table>
            </div>
        </div>
    </div>
</div>

@endsection
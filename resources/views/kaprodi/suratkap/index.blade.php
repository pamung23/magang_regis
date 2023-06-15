@extends('kaprodi.layouts.app')

@section('title', 'Data Pendaftar Magang')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush
@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
  <div class="statbox widget box box-shadow">
    <div class="widget-header">
      <div class="row py-2 m-auto">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <h4>Data Pendaftar Magang</h4>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-right m-auto">

        </div>
      </div>
    </div>
    <div class="widget-content widget-content-area br-6">
      <table id="zero-config" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th> Id </th>
            <th>Tanggal Mulai-Selesai</th>
            <th>Perusahaan</th>
            <th>mahasiswa</th>
            <th class="text-center dt-no-sorting">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($surat as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tanggal_mulai }}-{{ $item->tanggal_selesai }}</td>
            <td>{{ $item->perusahaan->nama_perusahaan }}</td>
            <td>@foreach ($item->mahasiswa as $mahasiswa)
              <ul>
                <li>
                  {{ $mahasiswa->nama_mahasiswa }}
                </li>
              </ul>
              @endforeach
            </td>
            <td class="">
              @if($item->status_surat_prodi != 'Di Setujui' && $item->status_surat_prodi != 'Di Tolak')
              <form action="{{ route('kaprodi.setuju', $item->id) }}" method="POST" class="approval-form">
                @csrf
                @method('PUT')
                <input type="hidden" name="status_surat_prodi" value="disetujui">
                <button type="submit" class="btn btn-success btn-approval">Di Setujui</button>
              </form>
              <form action="{{ route('kaprodi.tolak', $item->id) }}" method="POST" class="approval-form">
                @csrf
                @method('PUT')
                <input type="hidden" name="status_surat_prodi" value="ditolak">
                <button type="submit" class="btn btn-danger btn-approval">Di Tolak</button>
              </form>
              @elseif($item->status_surat_prodi == 'Di Setujui')
              Sudah disetujui
              @elseif($item->status_surat_prodi == 'Di Tolak')
              Sudah ditolak
              @endif
            </td>

          </tr>
          @endforeach
        </tbody>

      </table>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
<script>
  $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
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
<script>
  $(document).ready(function() {
    $('.approval-form').on('submit', function() {
      $(this).find('.btn-approval').attr('disabled', true);
    });
</script>
@endpush
<!-- test -->
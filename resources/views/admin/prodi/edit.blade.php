@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="container">
        <div class="row layout-top-spacing">

            <div id="basic" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Data Prodi</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-6 col-12 mx-auto">
                                <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" name="nama_prodi" class="form-control"
                                            placeholder="Program Studi" value="{{ $prodi->nama_prodi }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nama_singkatan" class="form-control"
                                            placeholder="Program Studi" value="{{ $prodi->nama_singkatan }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenjang"></label>
                                        <select class="form-control basic" name="jenjang" id="jenjang">
                                            @if ($prodi->jenjang === 'DIPLOMA III')
                                            <option value="DIPLOMA III" selected>DIPLOMA III</option>
                                        @else
                                            <option value="DIPLOMA III">DIPLOMA III</option>
                                        @endif

                                        @if ($prodi->jenjang === 'DIPLOMA IV')
                                            <option value="DIPLOMA IV" selected>DIPLOMA IV</option>
                                        @else
                                            <option value="DIPLOMA IV">DIPLOMA IV</option>
                                        @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan_id"></label>
                                        <select class="form-control basic" name="jurusan_id" id="jurusan_id">
                                            <option value="">-- Pilih jurusan --</option>
                                            @foreach ($jurusan as $item)
                                            <option value="{{ $item['id'] }}" {{ $item['id']==$prodi->jurusan_id ?
                                                'selected' : '' }}>{{ $item['nama_jurusan'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dosen_id"></label>
                                        <select class="form-control basic" name="dosen_id" id="dosen_id">
                                            <option selected="selected">-- Ketua Program Studi --</option>
                                            @foreach ($dosen as $item)
                                            <option value="{{ $item['id'] }}" {{ $item['id']==$prodi->dosen_id ?
                                                'selected' : '' }}>{{ $item['nama_dosen'] }}</option>
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
{{-- <script>
    $("#ph-number").inputmask({mask:"(999) 999-9999"});

</script> --}}
@endpush

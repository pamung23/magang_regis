<!DOCTYPE html>
<html>

<head>
    <title>Surat Magang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table>
            <tr>
                <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo_politani.png'))) }}"
                        width="90" height="90"></td>
                <td>
                    <center>
                        <font size="4">KEMENTRIAN PENDIDIKAN KEBUDAYAAN,RISET DAN TEKNOLOGI </font><br>
                        <font size="5"><b>POLITEKNIK PERTANIAN NEGERI SAMARINDA </b></font><br>
                        <font size="2"><i>Kampus Gunung Panjang Jl.Samratulangi Samarinda 75131 Telp. 0541-260421,Fax.
                                0541-260680 <br></font>
                        <font size="2">email : info@politanisamarinda.ac.id dan
                            politanismd@gmail.com, www.politanisamarinda.ac.id</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
        </table>
        <table>
            <tr class="text2">
                <td>Nomer</td>
                <td width="572">: </td>
            </tr>
            <tr class="text2">
                <td>Lampiran</td>
                <td width="572">: 1 (satu) lembar</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td width="564">: Permohonan {{ $surat->perihal }} (MI)</td>
            </tr>
        </table>
        <br>
        <table width="525">
            <tr>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                    <td>
                <td class='text-justify'>
                    <font size="2">Kepada Yth.<br>Pimpinan {{ $surat->perusahaan->nama_perusahaan
                        }}<br>Jl.{{$surat->perusahaan->alamat_perusahaan}}, {{ $surat->perusahaan->kota_kecamatan }}
                        <br>di-
                        <br>Tempat
                    </font>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
            </tr>
        </table>
        <br>
        <table width="500">
            <tr>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td class='text-justify'>
                    <font size="2">Dalam rangka menuju pencapaian standar kompetensi lulusan, kurikulum Politeknik
                        Pertanian Negeri Samarinda mencantumkan kegiatan Magang Industri (MI) sebagai kegiatan wajib
                        yang harus diikuti mahahsiswa dengan melibatkan instansi pemerintah maupun swasta yang dianggap
                        layak untuk menyelenggarakannya.</font>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
            </tr>
        </table>
        <table width="500">
            <tr>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td class='text-justify'>
                    <font size="2">Sehubungan dengan hal tersebut diatas maka dengan ini kami mengajukan permohonan
                        untuk dapat melaksanakan kegiatan Magang Industri (MI) bagi mahasiswa Program Studi
                        {{$surat->prodis->nama_prodi}}, sehingga mahasiswa diharapkan memperoleh peningkatan pengetahuan
                        dan keterampilan
                        sesuai dengan bidang ilmu yang dipelajari.</font>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
            </tr>
        </table>
        </table>
        <table width="500">
            <tr>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td class='text-justify'>
                    <font size="2">Rencana kegiatan Magang Industri (MI) tersebut akan dilaksanakan selama
                        4 Bulan bulan mulai
                        {{$surat->tanggal_mulai}} sd {{$surat->tanggal_selesai}} dengan jumlah mahasiswa {{
                        $jumlahMahasiswa }}
                        orang sebagaimana
                        daftar terlampir.
                    </font>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
            </tr>
        </table>
        <table width="500">
            <tr>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td class='text-justify'>
                    <font size="2">Demikian permohonan ini kami ajukan dengan harapan dapat Bapak/Ibu kabulkan. Atas
                        bantuan dan kerjasama yang baik dengan ini dihaturkan terimakasih.
                    </font>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
            </tr>
        </table>
        <br>
        <table width="">
            <tr>
                <td width="350"><br><br><br><br></td>
                <td class="text" align="center"> <br> <br>
                    Samarinda, {{ $tanggalRealtime }}<br> A.n. Direktur
                    <br>{{ $surat->wadir->jabatan }},<br><br><br><br>{{ $surat->wadir->nama }}
                    NIP. {{ $surat->wadir->nip }}
                </td>
            </tr>
        </table>

    </center>
    </table>
    </td>
    </tr>
    </tr>
    </table>
    <br>
    <h5>
        <font size="1"><b>Tembusan :<br></font>
        <font size="1">1 Direktur (sebagai laporan)</font>
        <br>
        <font size="1">2 Arsip</font>
        </b>
    </h5>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>contoh surat pengunguman</title>
    <style type="text/css">
        table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table>

            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>

        </table>
        <table>
            <tr class="text2">
                <td>Lampiran</td>
                <td width="572"> surat Nomor : </td>
            </tr>
            <tr class="text2">
                <td>Tentang</td>
                <td width="572">: Permohonan {{ $surat->perihal }} (MI)</td>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table width="520">
            <tr>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                <td>
                    <font size="2"> Daftar Nama Mahasiswa Peserta Magang Industri (MI) pada {{
                        $surat->perusahaan->nama_perusahaan}}
                    </font>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
                </td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Program Studi</th>
                    <th class="text-center">Jenjang Studi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>@foreach ($surat->mahasiswa as $mahasiswa)
                        <ul>

                            {{ $loop->iteration }}

                        </ul>
                        @endforeach
                    </td>
                    <td>@foreach ($surat->mahasiswa as $mahasiswa)
                        <ul>

                            {{ $mahasiswa->nama_mahasiswa }}

                        </ul>
                        @endforeach
                    </td>
                    <td class="text-center">@foreach ($surat->mahasiswa as $mahasiswa)
                        <ul>

                            {{ $mahasiswa->nim }}

                        </ul>
                        @endforeach
                    </td>
                    <td>@foreach ($surat->mahasiswa as $mahasiswa)
                        <ul>

                            {{ $mahasiswa->prodi->nama_prodi }}

                        </ul>
                        @endforeach
                    </td>
                    <td>@foreach ($surat->mahasiswa as $mahasiswa)
                        <ul>

                            {{ $mahasiswa->prodi->jenjang }}

                        </ul>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="">
            <tr>
                <td width="350"><br><br><br><br></td>
                <td class="text" align="center"> <br> <br>
                    Samarinda, {{ $tanggalRealtime }}<br> A.n. Direktur
                    <br>{{ $surat->wadir->jabatan }},<br><br><br><br>{{ $surat->wadir->nama }}
                    NIP. {{ $surat->wadir->nip }}
                </td>
            </tr>
        </table>
    </center>
    </table>
    </td>
    </tr>
    </tr>
    </table>
    <br>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>

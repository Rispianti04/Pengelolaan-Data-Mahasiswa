<!DOCTYPE html>
<html>

<head>
    <title>Laporan Mahasiswa Asing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Laporan Mahasiswa Asing</h4>
    </center>

    <table class='table table-bordered'>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA MAHASISWA</th>
                    <th>NPM MAHASISWA</th>
                    <th>PROGRAM STUDI</th>
                    <th>TAHUN MASUK</th>
                    <th>KELAS</th>
                    <th>NAMA UNIVERSITAS</th>
                    <th>JENIS KELAMIN</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->name_mhs }}</td>
                        <td>{{ $siswa->npm_mhs }}</td>
                        <td>{{ $siswa->jurusan->nama_jurusan }}</td>
                        <td>{{ $siswa->penilaian2->tahun_akademik }}</td>
                        <td>{{ $siswa->kelas == 'reg' ? 'Reguler' : 'Non Reguler' }}</td>
                        <td style="text-transform:capitalize;">{{ $siswa->nama_univ }}</td>
                        <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $siswa->keterangan == 'pindahan' ? 'Pindahan' : 'MBKM' }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8">TOTAL MAHASISWA</th>
                    <th>{{ $totalmhs }}</th>
                </tr>
            </tfoot>
        </table>
    </table>

</body>

</html>

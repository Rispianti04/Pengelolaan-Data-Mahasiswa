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
                    <th rowspan="2">Tahuan Akademik</th>
                    <th colspan="2" class="text-center">Jumlah <br>Mahasiswa baru</th>
                    <th colspan="2" class="text-center">Jumlah <br>Mahasiswa Aktif</th>
                    <th colspan="2" class="text-center">Jumlah <br>Mahasiswa Asing</th>
                </tr>
                <tr>
                    <th class="text-center">Reguler</th>
                    <th class="text-center">Transfer</th>
                    <th class="text-center">Reguler</th>
                    <th class="text-center">Transfer</th>
                    <th class="text-center">Pindahan</th>
                    <th class="text-center">MBKM</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penilaian as $nilai)
                    <tr>
                        <td>{{ $nilai->tahun_akademik }}</td>
                        <td>{{ $nilai->jml_calon_mhs_baru_reguler }}</td>
                        <td>{{ $nilai->jml_calon_mhs_baru_transfer }}</td>
                        <td>{{ $nilai->jml_calon_mhs_aktif_reguler }}</td>
                        <td>{{ $nilai->jml_calon_mhs_aktif_transfer }}</td>
                        <td>{{ $nilai->jml_mhs_asing_full }}</td>
                        <td>{{ $nilai->jml_mhs_asing_part }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </table>

</body>

</html>

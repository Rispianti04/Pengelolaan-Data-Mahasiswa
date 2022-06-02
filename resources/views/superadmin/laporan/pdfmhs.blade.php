<!DOCTYPE html>
<html>
<head>
	<title>Laporan Mahasiswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Mahasiswa</h4>
	</center>
 
	<table class='table table-bordered'>
        <thead>
            <tr>
                <th class="text-center">NO</th>
                <th class="text-center">NAMA MAHASISWA</th>
                <th class="text-center">NPM MAHASISWA</th>
                <th class="text-center">PROGRAM STUDI</th>
                <th class="text-center">TAHUN MASUK</th>
                <th class="text-center">KELAS</th>
                <th class="text-center">JENIS KELAMIN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $mhs->name_mhs }}</td>
                <td>{{ $mhs->npm_mhs }}</td>
                <td>{{ $mhs->jurusan->nama_jurusan }}</td>
                <td>{{ $mhs->penilaian->tahun_akademik}}</td>
                <td>{{ $mhs->kelas == 'reg' ? 'Reguler' : 'Non Reguler' }}</td>
                <td>{{ $mhs->jenis_kelamin  == 'L' ? 'Laki-Laki': 'Perempuan'}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6" >TOTAL MAHASISWA</th>
                <th>{{ $totalmhs }}</th>
            </tr>
        </tfoot>
	</table>
 
</body>
</html>
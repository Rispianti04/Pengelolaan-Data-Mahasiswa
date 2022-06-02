@foreach ($mahasiswa as $mhs)
    <div class="modal fade" id="Details{{ $mhs->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Lengkap Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-primary"></i>{{ $mhs->name_mhs }}</h3>
                    <br>

                    <div class="text-muted">
                        <p class="text-sm">Jenis Kelamin
                            <b class="d-block">{{ $mhs->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</b>
                        </p>
                        <p class="text-sm">NPM Mahasiswa
                            <b class="d-block">{{ $mhs->npm_mhs }}</b>
                        </p>
                        <p class="text-sm">Program Studi
                            <b class="d-block">{{ $mhs->jurusan->nama_jurusan }}</b>
                        </p>
                        <p class="text-sm">Kelas
                            <b class="d-block">{{ $mhs->kelas == 'Reguler' ?: 'Non-Reguler' }}</b>
                        </p>
                        <p class="text-sm">Tahun Masuk
                            <b class="d-block">{{ $mhs->penilaian2->tahun_akademik }}</b>
                        </p>
                        <p class="text-sm">Nama Universitas
                            <b class="d-block">{{ $mhs->nama_univ }}</b>
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

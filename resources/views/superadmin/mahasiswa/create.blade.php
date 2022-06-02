<form action="{{ url('store_mahasiswa') }}" method="POST">
    @csrf
    <div class="modal" tabindex="-1" role="dialog" id="Create">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_mhs">Nama Mahasiswa</label>
                        <input id="name_mhs" name="name_mhs" type="text"
                            class="@error('name_mhs') is-invalid @enderror form-control" placeholder="Nama Mahasiswa"
                            value="{{ old('name_mhs') }}">
                        @error('name_mhs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="npm_mhs">NPM Mahasiswa</label>
                        <input id="npm_mhs" name="npm_mhs" type="text"
                            class="@error('npm_mhs') is-invalid @enderror form-control" placeholder="NPM Mahasiswa"
                            value="{{ old('npm_mhs') }}">
                        @error('npm_mhs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_jurusan">Program Studi</label>
                        <select name="id_jurusan" id="id_jurusan"
                            class="@error('id_jurusan') is-invalid @enderror form-control">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $jurusan)
                                <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @error('id_jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas Mahasisa</label>
                        <select name="kelas" id="kelas"
                            class="@error('kelas') is-invalid @enderror form-control">
                            <option value="">Pilih Kelas</option>
                            <option value="reg">Reguler</option>
                            <option value="nr">Non Reguler</option>
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                <div class="form-group">
                    <label for="id_penilaian">Tahun Masuk</label>
                    <select name="id_penilaian" id="id_penilaian"
                        class="@error('id_penilaian') is-invalid @enderror form-control">
                        <option value="">Pilih Tahun Masuk</option>
                        @foreach ($penilaian as $nilai)
                            <option value="{{ $nilai->id_penilaian }}">{{ $nilai->tahun_akademik }}</option>
                        @endforeach
                    </select>
                    @error('id_penilaian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="@error('jenis_kelamin') is-invalid @enderror form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
                <div class="modal-footer">
                    <button type="Submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

</form>

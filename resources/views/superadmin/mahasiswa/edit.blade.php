@foreach($mahasiswa as $mhs)
<div class="modal fade" id="Edit{{$mhs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('SuperAdmin/update', ['id'=> $mhs->id])}}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="" name="name_mhs"
                            value="{{$mhs->name_mhs}}">
                    </div>
                    <div class="form-group">
                        <label for="">NPM Mahasiswa</label>
                        <input type="text" class="form-control" id="" name="npm_mhs"
                            value="{{$mhs->npm_mhs}}">
                    </div>
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <select class="form-control" name="id_jurusan">
                            @foreach($jurusan as $jur)
                            <option value="{{$jur->id_jurusan}}" {{$mhs->id_jurusan == $jur->id_jurusan ? 'selected' : ''}}>
                                {{$jur->nama_jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas Mahasiswa</label>
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
                            <option value="">Pilih Jurusan</option>
                            <option value="Laki-Laki" {{$mhs->jenis_kelamin == $mhs->jenis_kelamin ? 'selected' : ''}}>Laki-Laki</option>
                            <option value="Perempuan {{$mhs->jenis_kelamin == $mhs->jenis_kelamin ? 'selected' : ''}}">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div class="modal-footer">
                        <button type="Submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

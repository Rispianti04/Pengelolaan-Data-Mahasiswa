<form action="{{ url('store_nilai') }}" method="POST">
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
                        <label for="tahun_akademik">Tahun Akademik</label>
                        <input id="tahun_akademik" name="tahun_akademik" type="text"
                            class="@error('tahun_akademik') is-invalid @enderror form-control" placeholder="Tahun Akademik"
                            value="{{ old('tahun_akademik') }}">
                        @error('tahun_akademik')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="daya_tampung">Daya Tampung</label>
                        <input id="daya_tampung" name="daya_tampung" type="text"
                            class="@error('daya_tampung') is-invalid @enderror form-control" placeholder="Daya Tampung"
                            value="{{ old('daya_tampung') }}">
                        @error('daya_tampung')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jml_calon_mhs_pendaftar">Jumlah Pendaftar</label>
                        <input id="jml_calon_mhs_pendaftar" name="jml_calon_mhs_pendaftar" type="number"
                            class="@error('jml_calon_mhs_pendaftar') is-invalid @enderror form-control" placeholder="Jumlah Pendaftar"
                            value="{{ old('jml_calon_mhs_pendaftar') }}">
                        @error('jml_calon_mhs_pendaftar')
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

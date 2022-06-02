<form action="{{ url('store_nilai2') }}" method="POST">
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
                        <label for="tahun_akademik">Tahun</label>
                        <input id="tahun_akademik" name="tahun_akademik" type="text"
                            class="@error('tahun_akademik') is-invalid @enderror form-control" placeholder="Tahun Akademik"
                            value="{{ old('tahun_akademik') }}">
                        @error('tahun_akademik')
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

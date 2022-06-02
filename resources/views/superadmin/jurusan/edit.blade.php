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
                <form action="{{ route('/SuperAdmin/edit', ['id'=> $mhs->id])}}" method="post">;
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <input type="text" class="form-control" id="" name="nama_jurusan"
                            value="{{$mhs->nama_jurusan}}">
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

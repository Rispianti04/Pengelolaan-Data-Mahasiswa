<form action="{{ url('Laporan/laporan') }}" method="POST">
    @csrf
    <<div class="form-group">
        <label>Select</label>
        <select class="form-control">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
          <option>option 4</option>
          <option>option 5</option>
        </select>
      </div>
</form>
    
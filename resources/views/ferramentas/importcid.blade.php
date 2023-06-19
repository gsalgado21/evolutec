<form action="{{ route('cids.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Arquivo CSV:</label>
        <input type="file" name="file" id="file" class="form-control-file">
        @error('file')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Importar</button>
</form>

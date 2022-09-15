<div class="modal fade" id="editGenreFilm-{{ $genre->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('genre-film.update', $genre->id) }}" method="post">
                    @csrf
                    @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Genre Film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori"
                            value="{{ $genre->kategori }}" required autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

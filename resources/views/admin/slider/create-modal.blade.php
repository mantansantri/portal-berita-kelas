<div class="modal fade" id="createCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Slider Name</label>
                            <input type="file" class="form-control" id="inputName5" name="image"
                                value="{{ old('image') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="inputImage" class="form-label">Url</label>
                            <input class="form-control" type="link" id="inputImage" name="url">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Slider</button>
                </div>
            </form>
        </div>
    </div>
</div>

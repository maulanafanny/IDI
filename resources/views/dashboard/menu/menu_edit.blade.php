@extends('layouts.dash')

@section('content')
    <div class="card">
        <div class="card-body p-5 pt-4">
            <h4 class="fw-bold">Menu</h4>
            <br>
            <form action="/dash/menu" method="post">
                @csrf

                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input required aria-required="true" type="text" class="form-control" name="name" aria-label="name" value="{{ $menu->name }}">
                        </div>

                        <div class="mb-4">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" aria-label="category" name="category">
                                <option {{ $menu->category == 'Coffee' ? 'selected' : '' }} value="Coffee">Coffee</option>
                                <option {{ $menu->category == 'Non-Coffee' ? 'selected' : '' }} value="Non-Coffee">Non-Coffee</option>
                                <option {{ $menu->category == 'Snack' ? 'selected' : '' }} value="Snack">Snack</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label">Harga</label>
                            <input required aria-required="true" type="text" class="form-control" name="price" aria-label="price" value="{{ $menu->price }}">
                        </div>

                        <div class="mb-4">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <textarea required aria-required="true" class="form-control" name="desc" placeholder="Masukkan deskripsi produk" style="height: 150px">{{ $menu->desc }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12" style="padding-top: 33px">
                        <div class="dropzone" id="menu-dropzone"></div>
                    </div>
                </div>

                <input type="submit" class="btn btn-success py-3 fw-semibold px-4 float-end" value="Simpan">
            </form>
            <br>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script>
        var uploadedDocumentMap = {};
        Dropzone.options.menuDropzone = { // camelized version of the `id`

            url: '/dropzone-store',
            maxFilesize: 2, // MB
            uploadMultiple: false,
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            renameFile: function(file) {
                var date = new Date();
                var time = date.getTime();
                return time + file.name;
            },

            success: function(file, response) {
                $('form').append('<input type="hidden" name="img" value="/image/menu/' + response + '">');
                uploadedDocumentMap[file.name] = response.name;
            },

            removedfile: function(file) {
                file.previewElement.remove();
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="img"][value="' + name + '"]').remove();
            },

            init: function() {
                @if (isset($menu->img))
                    var file = {!! json_encode($menu->img) !!}
                    console.log(file);
                    file = {
                        ...file,
                        width: 226,
                        height: 324
                    }
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.original_url)
                    file.previewElement.classList.add('dz-complete')

                    $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
                @endif
            }
        }
    </script>
@endpush

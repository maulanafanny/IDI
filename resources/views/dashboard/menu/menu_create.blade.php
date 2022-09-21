@extends('layouts.dash')

@section('content')
    <div class="card">
        <div class="card-body p-5">
            <br>
            <form action="/dash/menu" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama<span><small class="text-danger"> *</small></span></label>
                    <input required aria-required="true" type="text" class="form-control" name="name" aria-label="name">
                </div>
                <div class="mb-4">
                    <label for="category" class="form-label">Kategori<span><small class="text-danger"> *</small></span></label>
                    <input required aria-required="true" type="text" class="form-control" name="category" aria-label="category">
                </div>
                <div class="mb-4">
                    <label for="price" class="form-label">Harga<span><small class="text-danger"> *</small></span></label>
                    <input required aria-required="true" type="text" class="form-control" name="price" aria-label="price">
                </div>
                <div class="mb-4">
                    <label for="price" class="form-label">Deskripsi<span><small class="text-danger"> *</small></span></label>
                    <textarea required aria-required="true" class="form-control" placeholder="Masukkan deskripsi produk" style="height: 150px"></textarea>
                </div>
                <input type="submit" class="btn btn-success py-3 fw-semibold px-4 float-end" value="Simpan">
            </form>
            <br>
        </div>
    </div>
@endsection

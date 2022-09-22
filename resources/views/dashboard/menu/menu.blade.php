@extends('layouts.dash')

@section('content')
    <div class="card">
        <div class="card-body p-5 pt-4">
            <a href="/dash/menu/create" class="btn btn-success mb-3">Tambah Menu Baru</a>
            <table id="menu-table" class="hover order-column row-border text-secondary" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th class="text-center" data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $index => $menu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>@currency($menu->price)</td>
                            <td>{{ $menu->category }}</td>
                            <td class="text-center d-flex align-items-center justify-content-center">
                                <form method="POST" action="{{ route('menu.destroy', $menu->id) }}">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-outline-danger btn-delete px-0 mx-1" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <a class="btn btn-outline-primary px-0 mx-1" href="{{ route('menu.edit', $menu->id) }}"><i class="fa-solid fa-pen"></i></a>
                                <input type="checkbox" {{ $menu->best_seller ? 'checked' : '' }} class="form-check-input mx-1" name="best-seller">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#menu-table').DataTable();
        });
    </script>
@endpush

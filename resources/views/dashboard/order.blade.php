@extends('layouts.dash')

@section('content')
    <div class="card">
        <div class="card-body p-5">
            <table id="order-table" class="hover order-column row-border text-secondary" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Total</th>
                        <th>Seat</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th class="text-center" data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>@currency($order->total)</td>
                            <td>{{ $order->seat }}</td>
                            <td>{{ $order->code }}</td>
                            <td>{{ $order->status ? 'pending' : 'selesai' }}</td>
                            <td class="text-center">
                                <a href="#"><i class="fa-solid fa-pen mx-1" style="color: #599584"></i></a>
                                <input type="checkbox" class="form-check-input mx-1" name="best-seller">
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
            $('#order-table').DataTable();
        });
    </script>
@endpush

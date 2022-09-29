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
                        <th>Waktu Dibuat</th>
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
                            <td>{{ $order->status ? 'proses' : 'selesai' }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td class="text-center d-flex align-items-center justify-content-center">
                                <form method="POST" action="{{ route('order.destroy', $order->id) }}">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-outline-danger btn-delete px-0 mx-1" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <button type="button" class="btn btn-outline-primary px-1" data-bs-toggle="modal" data-bs-target="#modal-{{ $order->id }}">
                                    <i class="fa-solid fa-pen mx-1"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modal-{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-4 pb-0 bg-back-white">
                                    <div class="modal-body">

                                        <h3 class="title-menu pb-4 fs-3">Payment Summary</h3>

                                        <div class="card shadows card-order">
                                            <div class="card-body px-5 p-4">
                                                <h5>{{ $order->customer_name }}#{{ $order->id }}</h5>
                                                <br>
                                                <div class="col-11">
                                                    <div class="categories text-success mb-4">
                                                        @foreach ($order->orderItem->groupBy('menu.category') as $category => $items)
                                                            <p class="fs-5">{{ $category }}</p>
                                                            @foreach ($items as $item)
                                                                <div class="sub-categories ms-4 text-green-regular">
                                                                    <p class="fs-5">{{ $item->menu->name }}<span class="float-end fs-5">@currency($item->menu->price)</span></p>
                                                                    @if ($item->notes != '')
                                                                        <p class="fs-6 mb-0" style="margin-top: -16px"><small>Notes :</small></p>
                                                                        <p class="fs-6 text-dark"><small>{{ $item->notes }}</small></p>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <h4 class="fw-semibold mt-5 text-serif">Total<span class="float-end fs-5">@currency($order->total)</span></h4>
                                                    <h5 class="fw-semibold mt-4 text-serif">Seat<span class="float-end fs-5">{{ $order->seat }}</span></h5>
                                                </div>
                                            </div>
                                        </div>

                                        <br>

                                        <form action="/update/{{ $order->id }}" method="POST">
                                            @csrf
                                            <label for="code" class="form-label fw-semibold mb-1"><small>Queue</small></label>
                                            <div class="card shadows mb-3">
                                                <div class="card-body py-3">
                                                    <input required aria-required="true" type="text" class="w-100 queue-input border-0" name="code" aria-label="code" value="{{ $order->code }}">
                                                </div>
                                            </div>

                                            <div class="modal-footer border-0">
                                                <div class="col me-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="true" name="status" {{ $order->status ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="proses">Proses</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="false" name="status" {{ $order->status ? '' : 'checked' }}>
                                                        <label class="form-check-label" for="completed">Selesai</label>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="js:window.print()" class="btn btn-green py-2">
                                                    Print
                                                </button>
                                                <button type="submit" class="btn submit btn-success py-2 text-serif">
                                                    Edit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal End --}}
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

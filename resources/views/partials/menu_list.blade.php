<div class="row">
    @foreach ($menus as $menu)
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="card shadows">

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-fluid image-menu mb-3" src="{{ asset($menu->img) }}" alt="coffee-menu">
                        </div>
                        <div class="col-6">
                            <h3 class="text-capitalize title-menu title-ellipsis">{{ $menu->name }}</h3>
                            <p class="text-desc mb-2 menu-desc">{{ $menu->desc }}</p>
                            <p class="fw-semibold title-medium">@currency($menu->price)</p>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success fw-semibold w-100 py-3 d-flex align-items-center justify-content-center" data-bs-toggle="modal"
                        data-bs-target="#modal-{{ $menu->id }}">
                        <i class="fa-solid fa-plus fa-fw me-1"></i>
                        <span class="text-serif">Tambah</span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $menu->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content py-3 px-3">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="img-fluid image-menu" src="{{ asset($menu->img) }}" alt="coffee-menu">
                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-capitalize title-menu mb-3">{{ $menu->name }}</h3>
                                            <p class="text-desc">{{ $menu->desc }}</p>
                                            <div style="width: 180px" class="text-center align-middle">
                                                <a class="btn btn-min btn-outline-success btn-range float-start"><i class="fa-solid fa-minus fs-6"></i></a>
                                                <span class="menu_quantity fs-4 fw-semibold">1</span>
                                                <a class="btn btn-plus btn-outline-success btn-range float-end"><i class="fa-solid fa-plus fs-6"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-3">
                                            <div class="form-label fw-semibold text-secondary">Notes</div>
                                            <textarea name="notes" class="form-control notes" style="resize: none" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <input type="hidden" id="menu_id" value="{{ $menu->id }}">
                                    <button type="submit" class="btn submit btn-success w-100 py-2 fw-semibold">
                                        <i class="fa-solid fa-plus fa-fw me-1"></i>
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal End --}}

                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    $('.btn-plus').click(function(e) {
        e.preventDefault();
        const menu = this.previousElementSibling;
        let quantity = parseInt(menu.innerText);
        menu.innerText = (quantity + 1);
    });

    $('.btn-min').click(function(e) {
        e.preventDefault();
        const menu = this.nextElementSibling;
        let quantity = parseInt(menu.innerText);
        if (quantity > 0) {
            menu.innerText = (quantity - 1);
        }
    });

    $('.submit').click(function() {
        const menu = this.previousElementSibling.value;
        const quantity = this.closest('.modal-footer').previousElementSibling.querySelector('.menu_quantity').innerText;
        const notes = this.closest('.modal-footer').previousElementSibling.querySelector('.notes').value;
        $.ajax({
            url: "/add",
            type: "get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            data: {
                menu_id: menu,
                quantity: quantity,
                notes: notes
            },
            success: function() {
                alert('Berhasil menambahkan menu');
            }
        });
    });
</script>

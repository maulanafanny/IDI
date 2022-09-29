<div class="row">
    @foreach ($menus as $menu)
        <div class="col-lg-3 col-md-6 mb-5 px-4">
            <div class="card shadows" style="border-radius: 25px; height: 509px">

                <img class="card-img-top" src="{{ asset($menu->img) }}" alt="menu-image" style="border-radius: 25px 25px 0 0">
                {{-- <img class="card-img-top" src="{{ Str::substr($menu->img, 0, strpos($menu->img, ".")) . '-alt.png' }}" alt="menu-image"> --}}
                <div class="card-body position-relative">
                    <div class="row align-items-end mb-3 px-4">
                        <div class="col-10 p-0">
                            <h3 class="text-capitalize title-menu title-ellipsis">{{ $menu->name }}</h3>
                            <p class="text-desc mb-2 menu-desc">{{ $menu->desc }}</p>
                            <p class="fw-semibold title-medium m-0 text-success position-absolute bottom-0 mb-4">@currency($menu->price)</p>
                        </div>
                        <div class="col-2 p-0">
                            <a href="/login" class="btn btn-success rounded-circle position-absolute bottom-0 mb-4" style="padding: 5px 10px"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@unless ($breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb">
        <div class="breadcrumb title-breadcrumb fs-4 justify-content-between mb-5">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb != Breadcrumbs::current())
                    <a class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" href="{{ $breadcrumb->url }}">
                        <i class="{{ $breadcrumb->icon }} fs-5 fa-fw me-2"></i>
                        <span class="breadcrumb-text">{{ $breadcrumb->title }}</span>
                    </a>
                @else
                    <div class="breadcrumb-item active px-3 d-flex align-items-center" aria-current="page">
                        <i class="{{ $breadcrumb->icon }} fs-5 fa-fw me-2"></i> 
                        <span class="breadcrumb-text">{{ $breadcrumb->title }}</span>
                    </div>
                @endif

            @endforeach
        </div>
    </nav>
    <br>
@endunless

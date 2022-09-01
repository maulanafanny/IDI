@unless ($breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb">
        <div class="breadcrumb title-breadcrumb fs-4 justify-content-center mb-5">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb != Breadcrumbs::current())
                    <a class="breadcrumb-item mx-5 text-decoration-none text-light" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                @else
                    <div class="breadcrumb-item active mx-5" aria-current="page">{{ $breadcrumb->title }}</div>
                @endif

            @endforeach
        </div>
    </nav>
    <br>
@endunless

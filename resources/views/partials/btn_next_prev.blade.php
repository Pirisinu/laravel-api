<div class="btn-box d-flex p-3 gap-4 justify-content-center">
    @if ($prev)
    <a href="{{ route(request()->route()->getName(), $prev->id) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
    @endif

    @if ($next)
    <a href="{{ route(request()->route()->getName(), $next->id) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></a>
    @endif
</div>

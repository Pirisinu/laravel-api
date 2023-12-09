<header id="admin-header" class="h-100">
    <nav class="d-flex justify-content-between">
        <button class="btn btn-light"><a href="{{ route('admin.home')}}" class="navbar-brand">Home <i class="fa-solid fa-house"></i></a></button>
        <form class="form-inline" method="POST" action="{{ route('logout')}}">
            @csrf
          <button class="btn btn-light" type="submit">Logout</button>
        </form>
      </nav>
</header>

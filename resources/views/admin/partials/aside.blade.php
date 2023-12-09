<aside>
    <nav>
        <ul class="list-unstyled">
            <li>
                <div class="dropdown">
                    <button class="btn text-white btn-outline-secondary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Projects
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item active" href="{{route('admin.project.index')}}">All Projects</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('admin.project.create')}}">Add new Project</a></li>
                    </ul>
                  </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Technology
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item active" href="{{route('admin.technology.index')}}">All Technologies</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('admin.technology.create')}}">Add new Technology</a></li>
                    </ul>
                  </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Types
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item active" href="{{route('admin.type.index')}}">All Types</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('admin.type.create')}}">Add new Type</a></li>
                    </ul>
                  </div>
            </li>

        </ul>
    </nav>
</aside>

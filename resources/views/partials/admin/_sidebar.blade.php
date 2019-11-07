<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link flex items-center active"
                href="{{ route('admin.index') }}">
                    <i class="fa fa-tachometer mr-2 text-gray-600" aria-hidden="true"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link flex items-center" href="#">
                    <i class="fa fa-database mr-2 text-gray-600" aria-hidden="true"></i>
                    Articles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link flex items-center" href="#">
                    <i class="fa fa-share-alt mr-2 text-gray-600" aria-hidden="true"></i>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link flex items-center" href="#">
                    <i class="fa fa-tags mr-2 text-gray-600" aria-hidden="true"></i>
                    Tags
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link flex items-center" data-toggle="collapse" href="#collapseUsers" role="button" aria-expanded="false" aria-controls="collapseUsers">
                    <i class="fa fa-users mr-2 text-gray-600" aria-hidden="true"></i>
                    Users
                </a>
                <div class="collapse" id="collapseUsers">
                    <div class="card card-body py-0">
                        <ul class="nav flex-column">
                            <li class="nav-item font-light">
                                <a class="nav-link text-sm py-1 flex items-center"
                                href="{{ route('users.index') }}" >
                                    <i class="fa fa-eye mr-2 text-gray-600" aria-hidden="true"></i>
                                    All Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-1 text-sm flex items-center"
                                    href="{{ route('users.create') }}">
                                    <i class="fa fa-pencil mr-2 text-gray-600" aria-hidden="true"></i>
                                    Create user
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link flex items-center" href="#">
                    <i class="fa fa-user-circle mr-2 text-gray-600" aria-hidden="true"></i>
                    Profiles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link flex items-center" href="#">
                    <i class="fa fa-suitcase mr-2 text-gray-600" aria-hidden="true"></i>
                    Roles
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link flex items-center active"
                href="{{ route('admin.index') }}">
                    <i class="fa fa-tachometer mr-2 text-gray-600" aria-hidden="true"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>

            @navitem(['icon' => 'fa-database']) Articles
            @endnavitem

            @navitem(['icon' => 'fa-share-alt']) Categories
            @endnavitem

            @navitem(['icon' => 'fa-tags']) Tags
            @endnavitem

            @navitem(['icon' => 'fa-users']) Users
            @endnavitem

            <li class="nav-item">
                <a class="nav-link flex items-center" href="#">
                    <i class="fa fa-user-circle mr-2 text-gray-600" aria-hidden="true"></i>
                    Profiles
                </a>
            </li>

            @navitem(['icon' => 'fa-suitcase']) Roles
            @endnavitem
        </ul>
    </div>
</div>
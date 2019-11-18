<li class="nav-item">
    <a class="nav-link flex items-center" data-toggle="collapse" href="#collapse{{ $slot }}" role="button" aria-expanded="false" aria-controls="collapse{{ $slot }}">
        <i class="fa {{ $icon }} mr-2 text-gray-600" aria-hidden="true"></i>
        {{ $slot }}
    </a>

    <div class="collapse" id="collapse{{ $slot }}">
        <div class="card card-body py-0">
            <ul class="nav flex-column">
                <li class="nav-item font-light">
                    <a class="nav-link text-sm py-1 flex items-center"
                    href="{{ route('admin.'.strtolower($slot).'.index') }}" >
                        <i class="fa fa-eye mr-2 text-gray-600" aria-hidden="true"></i>
                        View all
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-1 text-sm flex items-center"
                        href="{{ route(strtolower($slot).'.create') }}">
                        <i class="fa fa-pencil mr-2 text-gray-600" aria-hidden="true"></i>
                        Add new
                    </a>
                </li>
            </ul>
        </div>
    </div>
</li>

<ul class="navbar-nav">
    @foreach ($navbars as $navbarItem)
        <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName() == $navbarItem->route) active @endif" href="{{ route($navbarItem->route) }}">{{ $navbarItem->name }}</a>
        </li>
    @endforeach
</ul>

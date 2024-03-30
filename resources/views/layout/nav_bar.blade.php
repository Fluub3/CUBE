<ul class="navbar-nav">
    @php
        $displayAll = false;
        $currentRouteUrl = request()->url(); // Obtention de l'URL de la route actuelle
    @endphp

    @foreach ($navbars as $navbarItem)
        @php
            $navbarRouteUrl = url($navbarItem->route); // Obtention de l'URL de l'élément de navigation
        @endphp

        @if(strtolower($navbarRouteUrl) == strtolower($currentRouteUrl) && $navbarItem->ordering >= 2)
            @php
                $displayAll = true;
            @endphp
        @endif

        @if($displayAll || $navbarItem->ordering <= 2)
            <li class="nav-item">
                <a class="nav-link @if($navbarRouteUrl == $currentRouteUrl) active @endif" href="{{ route($navbarItem->route) }}">{{ $navbarItem->name }}</a>
            </li>
        @endif
    @endforeach
</ul>

<nav class="page-nav">
    <div class="sidebarMenuWrapper">
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>
        <div id="sidebarMenu">
            <ul class="sidebarMenuInner">
                <li id="first-sidebar-item">Name <span>Position</span></li>
                <li><a class="menu-link" href="{{ route('home') }}">Главная</a></li>
                <li class="menu-dropdown sidebar-dropdown">
                    <span class="menu-dropdown__toggle">Продукция</span>
                    <ul class="menu-dropdown__list">
                        @foreach ($products as $product_sidebar_item)
                            <li><a href="{{ $product_sidebar_item['url'] }}">{{ $product_sidebar_item['short_name'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="menu-link" href="#pagecontacts">Контакты</a></li>
            </ul>
        </div>
    </div>
    <a href="{{ route('home') }}">
        <div class="main-logo">
            <h1 class="main-logo-text">НефтеГазХим</h1>
        </div>
    </a>
    <section class="main-menu">
        <a class="menu-link" href="{{ route('home') }}">Главная</a>
        <div class="menu-dropdown">
            <span class="menu-link menu-dropdown__toggle">Продукция</span>
            <ul class="menu-dropdown__list">
                @foreach ($products as $product_item)
                    <li><a href="{{ $product_item['url'] }}">{{ $product_item['short_name'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <a class="menu-link" href="#pagecontacts">Контакты</a>
    </section>

    @include('partials.modal-contact-form')
</nav>

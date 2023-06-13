<header class="navbar bar-dark sticky-top flex-md-nowrap p-0 shadow bg-dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 link-light" href="/admin">Админка новостного портала</a>
    <button class="navbar-toggle position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggle-icon"></span>
    </button>
{{--Поменять цвет обводки поиска--}}
    <input class="form-control w-100 rounded-0 border-0 bg-dark text-white" type="text" aria-label="Поиск">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3 link-light" href="{{ route('account.logout') }}">Выйти</a>
        </div>
    </div>
</header>

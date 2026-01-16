<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold">Task Manager</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('tasks.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Task">Task</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Category">Category</div>
            </a>
        </li>
        
    </ul>
    <div class="menu-footer mt-auto">
        <form method="POST" action="{{ route('logout') }}" class=" d-flex justify-content-center">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </div>
</aside>

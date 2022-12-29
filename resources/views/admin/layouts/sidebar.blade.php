<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('user/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <a style="text-decoration: none" href="{{route('home')}}">
                <h4 class="logo-text">Licar</h4>
            </a>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('drivers.index')}}">
                <div class="parent-icon"><i class="bi bi-person"></i>
                </div>
                <div class="menu-title">Haydovchilar</div>
            </a>
        </li>
        <li>
            <a href="{{route('branches.index')}}">
                <div class="parent-icon"><i class="bi bi-building"></i>
                </div>
                <div class="menu-title">Fillialar</div>
            </a>
        </li>
        <li>
            <a href="{{route('cars.index')}}">
                <div class="parent-icon"><i class="bi bi-car-front"></i>
                </div>
                <div class="menu-title">Avtomobillar</div>
            </a>
        </li>
        @can('admin')
            <li>
                <a href="{{route('repo')}}">
                    <div class="parent-icon"><i class="bi bi-car-front"></i>
                    </div>
                    <div class="menu-title">Xisobot</div>
                </a>
            </li>
            <li>
                <a href="{{route('users.index')}}">
                    <div class="parent-icon"><i class="bi bi-person"></i>
                    </div>
                    <div class="menu-title">Xodimlar</div>
                </a>
            </li>
        @endcan
    </ul>
    <!--end navigation-->
</aside>

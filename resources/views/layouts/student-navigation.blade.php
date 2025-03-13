<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('student.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="{{ route('student.grades') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                My Grades
            </a>
            <a class="nav-link" href="{{ route('student.subjects') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                My Subjects
            </a>
            <div class="sb-sidenav-menu-heading">Account</div>
            <a class="nav-link" href="{{ route('profile.edit') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>
            </form>
        </div>
    </div>
</nav> 
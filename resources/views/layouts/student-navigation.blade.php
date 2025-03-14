<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('student-dashboard') }}">
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
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav> 
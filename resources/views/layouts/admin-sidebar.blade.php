<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #343a40; color: #ffffff;">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{ route('dashboard') }}" style="color: #ffffff;">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="{{ route('student.index') }}" style="color: #ffffff;">
                <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                Students
            </a>
            <a class="nav-link" href="{{ route('subject.index') }}" style="color: #ffffff;">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Subjects
            </a>
            <a class="nav-link" href="{{ route('enrollment.index') }}" style="color: #ffffff;">
                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                Enrollments
            </a>
            <a class="nav-link" href="{{ route('grade.index') }}" style="color: #ffffff;">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                Grades
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer" style="background-color: #23272b; color: #ffffff;">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav> 
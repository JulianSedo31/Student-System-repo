<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #e7f1ff; color: #333;">
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
    <div class="sb-sidenav-footer" style="background-color: #007bff; color: #ffffff;">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>

<style>
    /* Sidebar link styles */
    .sb-sidenav .nav-link {
        color: #333; /* Dark text for links */
    }

    /* Hover effect for links */
    .sb-sidenav .nav-link:hover {
        background-color: #cce5ff; /* Light blue on hover */
        color: #333; /* Keep text dark on hover */
    }

    /* Sidebar footer styles */
    .sb-sidenav-footer {
        background-color: #007bff; /* Blue footer */
        color: #ffffff; /* White text for footer */
    }
</style>
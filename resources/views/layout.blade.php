<!DOCTYPE html>
<html>
<head>
    <title>EMS System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: relative; z-index: 10;">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">EMS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('departments.index') }}">
                        Departments
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobroles.index') }}">
                        Job Roles
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.index') }}">
                        Employees
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employmenthistory.index') }}">
                        Employment History
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hrstaff.index') }}">
                        HR Staff
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reports.index') }}">
                        Reports
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auditlogs.index') }}">
                        Audit Logs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('systemadmin.index') }}">
                        System Admin
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<div class="py-4">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

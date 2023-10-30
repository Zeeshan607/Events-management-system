<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">ES-Admin</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Manage
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("admin.dashboard")}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("admin.user_profiles.index")}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("admin.eo_profiles.index")}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Event organizers</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("admin.events.show_unapproved")}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">New pending Events <sup><span class="badge badge-warning">New</span></sup> </span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("admin.events.index")}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Events</span>
                </a>
            </li>

        </ul>

        <!-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> -->
    </div>
</nav>

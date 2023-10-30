<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/eo/dashboard">
            <span class="align-middle">ES-Event Organizer</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Manage
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("eo.dashboard")}}">
                    <i class="fa fa-tachometer-alt"></i><span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("eo.events.index")}}">
                    <i class="align-middle fa fa-calendar-alt" ></i> <span class="align-middle">Events</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route("eo.events.unapproved")}}">
                    <i class="align-middle fa fa-calendar-alt" ></i><span class="align-middle">Events: Pending for approval</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('eo.inbox.index')}}">
                    <i class="align-middle fa fa-inbox" ></i> <span class="align-middle">Inbox</span>
                </a>
            </li>

{{--            <li class="sidebar-item">--}}
{{--                <a class="sidebar-link" href="{{route("admin.event.show_unapproved")}}">--}}
{{--                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">New pending Events <sup><span class="badge badge-warning">New</span></sup> </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="sidebar-item">--}}
{{--                <a class="sidebar-link" href="{{route("admin.event.index")}}">--}}
{{--                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Events</span>--}}
{{--                </a>--}}
{{--            </li>--}}

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

<div class="sidebar" data-color="dark" data-background-color="white" >


    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            EMS
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="m-3 rounded profile-card text-white bg-primary text-left">
            <div class="row m-0 w-100">
                <div class="col-4">
                    <figure class="m-0 user-img online">
                        <img src="{{asset("storage/eo/".\Auth::guard('event_organizer')->user()->image)}}" class="img-fluid user-img" alt="image here" >

                    </figure>
                </div>
                <div class="col-8 pl-0">
                    <b>
                        {{\Auth::guard("event_organizer")->user()->name}}
                    </b>
                    <span class="seperator"></span>
                    <span>
                                Event Organizer
                                    </span>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{route("eo.dashboard")}}">
                    <i class="fa fa-home"></i>
                    <p class="d-inline">Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('eo.events.index')}}">
                    <i class="fa fa-globe-africa"></i>
                    <p class="d-inline">Events</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="fa fa-envelope"></i>
                    <p class="d-inline">Inbox</p>
                </a>
            </li>

            <!-- <li class="nav-item ">
                <a class="nav-link" href="upcoming-movies.php">
                    <i class="fa fa-angle-double-right"></i>
                    <p class="d-inline">Upcoming movies</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="movies-in-cinemas.php">
                    <i class="fa fa-film"></i>
                    <p class="d-inline">Movies In Cinemas Now</p>
                </a>
            </li> -->

            <!--                    <li class="nav-item">-->
            <!--                        <a class="nav-link d-flex align-items-center " href="javascript:void(0)">-->
            <!--                            <i class="fa fa-heart"></i>-->
            <!--                            <p class="d-inline">Favorite</p>-->
            <!--                            <span class="badge badge-primary d-inline ml-auto ">3</span>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li class="nav-item  ">-->
            <!--                        <a class="nav-link d-flex align-items-center" href="javascript:void(0)">-->
            <!--                            <i class="fas fa-ticket-alt"></i>-->
            <!--                            <p class="d-inline">Purchase</p>-->
            <!--                            <span class="badge badge-primary d-inline ml-auto ">3</span>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!-- your sidebar here -->
        </ul>
    </div>

</div>

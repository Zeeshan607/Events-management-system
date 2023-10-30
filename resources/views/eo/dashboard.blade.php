@extends("eo.layouts.app")



@section("content")


    <div class="container-fluid p-0">
        @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Welcome</strong>{{Auth::guard('event_organizer')->user()->name}}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <h1 class="h3 mb-3">Events <strong>Analytics</strong> </h1>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Users Registered</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="fa fa-users" ></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{$users_count}}</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> {{$users_registered_in_last_week}} </span>
                                        <span class="text-muted">Registered in last week</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Visitors</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">14.212</h1>
                                    <div class="mb-0">
                                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Published Events</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="fas fa-glass-cheers"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{$events_count}}</h1>
                                    <div class="mb-0">
                                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{$events_published_in_last_week }}</span>
                                        <span class="text-muted">Published in last week</span>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title">Orders</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h1 class="mt-1 mb-3">64</h1>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>--}}
{{--                                        <span class="text-muted">Since last week</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="col-xl-6 col-xxl-7">--}}
{{--                <div class="card flex-fill w-100">--}}
{{--                    <div class="card-header">--}}

{{--                        <h5 class="card-title mb-0">Recent Movement</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-body py-3">--}}
{{--                        <div class="chart chart-sm">--}}
{{--                            <canvas id="chartjs-dashboard-line"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>










    </div>


    @endsection

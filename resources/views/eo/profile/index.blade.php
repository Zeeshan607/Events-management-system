@extends("eo.layouts.app")







@section("content")


    <div class="container-fluid content-container">
        <div class="row mx-0">
            <div class="col-12 text-end">
                <a href="{{route('eo.profile.edit',$profile->id)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 d-flex flex-column align-items-center">
                <img src="{{asset("storage/eo/".$profile->image)}}" width="250px" height="100%" class="rounded-circle" alt="profile picture here">
            </div>
        </div>
        <div class="row mx-0 d-flex flex-row justify-content-center mt-5">
            <div class="col-8">
                <ul class="list-group list-unstyled">
                    <li><b>Name :  </b>{{$profile->name}}</li>
                    <li><b>Email : </b>{{$profile->email}}</li>
                    <li><b>Country : </b>{{$profile->country}}</li>
                    <li><b>City : </b>{{$profile->city}}</li>
                </ul>
            </div>
        </div>
    </div>


    @endsection

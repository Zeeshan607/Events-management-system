@extends('front.layouts.app')


@section("header-content")

    <div class="row mx ">
        <div class="col-12">
            <h1 class="text-start">Register:</h1>
        </div>
    </div>

    @endsection
@section('content')

<section class="register-section pt-5">
    <div class="container">
        <div class="row mx-0">
            <div class="col-12 text-center">
                <h2>Welcome</h2>
                <div id="err">
                </div>
            </div>
        </div>
        <div class="row mx-0 d-flex flex-row justify-content-center">

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-3">

                <form action="{{ route('register') }}" method="POST" autocomplete="off">
                        @csrf
                    <div class="form-group mt-1">
                        <label for="">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group mt-1">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row mx-0">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-0 pe-md-2 pe-lg-2">
                            <div class="form-group ">
                                <label for="country">Country</label>
                                <input name="country" id="country" class="form-control"  value="Pakistan" />
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-0 ps-md-2 ps-lg-2">
                            <div class="form-group ">
                                <label for="city">City</label>
                                <select name="city" id="city" class="form-select">
                                    <option value="null" selected>--Select--</option>
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-1">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mt-1">
                        <label for="confirm_password">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="row mx-0 mt-3">
                        <div class="col-12 p-0 text-end">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


@endsection

@section('scripts')

    <script>
        {{--var country_cities=[];--}}
        {{--$(document).ready(function(){--}}
        {{--    $.getJSON("{{asset('APi/countries+cities.json')}}", function(data){--}}
        {{--                data.map(function(obj, i) {--}}
        {{--                    $('#country').append("<option value='" + obj.name + "'>" + obj.name + "</option>");--}}
        {{--                    let country=new Object();--}}
        {{--                    country["name"]=obj.name;--}}
        {{--                    country["cities"]=obj.cities.filter(c=> {return c.name});--}}
        {{--                    country_cities.push(country);--}}
        {{--                });--}}
        {{--    }).fail(function(){--}}
        {{--        $("#err").append("<p class='text-danger'>OOPs! something went wrong while loading countries data,please try again</p>")--}}
        {{--        setTimeout(function(){--}}
        {{--            $("#err > p").remove();--}}
        {{--        },4000)--}}
        {{--    });--}}
        {{--    });--}}

        {{--function fetch_cities(country){--}}
        {{--    let citiz=  country_cities.find(c=>{return c.name==country})--}}
        {{--    if($("#city").children("option").length>1){--}}
        {{--        $("#city").empty();--}}
        {{--        $('#city').append("<option value='null'>--Select--</option>")--}}
        {{--    }--}}
        {{--    citiz.cities.map(function(c){--}}
        {{--        $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>")--}}
        {{--    })--}}
        {{--}--}}

{{--new code--}}
        $(document).ready(function() {
            $.getJSON("{{asset('APi/countries+cities.json')}}", function (data) {
                data.map(function (obj, i) {
                    if (obj.name == "Pakistan") {

                        $('#country').val(obj.name);
                        $('#country').prop('readonly', "true");
                        if ($("#city").children("option").length > 1) {
                            $("#city").empty();
                            $('#city').append("<option value='null'>--Select--</option>")
                        }
                        obj.cities.map(function (c) {
                            $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>")
                        });
                    }

                });

            }).fail(function () {
                $("#err").append("<p class='text-danger'>OOPs! something went wrong while loading countries data,please try again</p>")
                setTimeout(function () {
                    $("#err > p").remove();
                }, 4000)
            });


        })



    </script>


@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('web/assets/bootstrap-5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/fonts/font-awesome-icons/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('web/assets/plugins/jcarousel/css/jcarousel.responsive.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/plugins/pretty-checkbox-3.0/pretty-checkbox.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

    @if(in_array(Route::currentRouteName(),['chat.index']))
    @vite('resources/js/user_chat/user_chat_app.js')
    @endif
</head>
<body>



@if(!request()->is("/"))

{{--header code for all pages except home and events page--}}
<header class="header">
    <section class="ct-header-section">
        <div class="overlay">
            <div class="container"  >
                <div class="row mx-auto ">
                    <div class="col-12 ">

                        @include("front.layouts.partials.navbar")

                    </div>
                </div>
            </div>

            <div class="container ct-header-content ">



                @yield("header-content")

            </div>
        </div>
    </section>
</header>






@endif



@yield("content")



@include("front.layouts.partials.footer")

<script src="{{asset('web/assets/bootstrap-5/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{asset("web/assets/bootstrap-5/js/popper.min.js")}}" defer></script>
@if(!in_array(Route::currentRouteName(),['chat.index']))
<script src="{{asset('web/assets/bootstrap-5/js/bootstrap.min.js')}}" defer></script>
@endif
<script type="text/javascript" src="{{asset('web/assets/plugins/jcarousel/js/jquery.jcarousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/assets/plugins/jcarousel/js/jcarousel.responsive.js')}}"></script>

<script src="{{asset('web/js/script.js')}}"></script>
<script>

    const header = document.querySelector(".navbar");
    const sectionOne = document.querySelector(".header");


    const sectionOneOptions = {
        rootMargin: "-200px 0px 0px 0px"
    };
    const sectionOneObserver = new IntersectionObserver(function(
            entries,
            sectionOneObserver
        ) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    header.classList.add("bg-dark");
                } else {
                    header.classList.remove("bg-dark");
                }
            });
        },
        sectionOneOptions);

    sectionOneObserver.observe(sectionOne);

    $(document).ready(function(){
        $(".navbar-toggler").click(function(){
            $(".navbar").toggleClass("bg-dark")
        })

    })

</script>


@yield("scripts")


</body>
</html>

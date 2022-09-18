<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('template/assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="{{asset('template/assets/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('template/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('template/assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">KidKinder</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="{{route('template.home')}}"  class="nav-item nav-link {{Route::currentRouteName() == 'template.home' ? 'active' : ''}}">Home</a>
                    <a href="{{route('template.about')}}" class="nav-item nav-link {{Route::currentRouteName() == 'template.about' ? 'active' : ''}}">About</a>
                    <a href="{{route('template.class')}}" class="nav-item nav-link {{Route::currentRouteName() == 'template.class' ? 'active' : ''}}">Classes</a>
                    <a href="{{route('template.team')}}" class="nav-item nav-link {{Route::currentRouteName() == 'template.team' ? 'active' : ''}}">Teachers</a>
                    <a href="{{route('template.gallery')}}" class="nav-item nav-link {{Route::currentRouteName() == 'template.gallery' ? 'active' : ''}}">Gallery</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{route('template.blog')}}" class="dropdown-item {{Route::currentRouteName() == 'template.blog' ? 'active' : ''}}">Blog Grid</a>
                            <a href="{{route('template.single')}}" class="dropdown-item {{Route::currentRouteName() == 'template.single' ? 'active' : ''}}">Blog Detail</a>
                        </div>
                    </div>
                    <a href="{{route('template.contact')}}" class="nav-item nav-link {{Route::currentRouteName() == 'template.contact' ? 'active' : ''}}">Contact</a>
                </div>
                <a href="" class="btn btn-primary px-4">Join Class</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    
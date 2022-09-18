@extends('template.layouts.master')
@section('title', 'KidKinder - Teachers')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Our Teachers</p>
            </div>
        </div>
    </div>
    <!-- Header End -->
    @include('template.moduls.team')
    @include('template.moduls.testimonial')
@endsection
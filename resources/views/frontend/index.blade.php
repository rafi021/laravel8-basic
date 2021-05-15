@extends('frontend.frontend_master')

@section('hero-section')
  <!-- ======= Hero Section ======= -->
  @include('frontend.frontend_layout.hero-section')
  <!-- End Hero -->
@endsection

@section('frontend_content')
    <!-- ======= About Us Section ======= -->
    @include('frontend.frontend_layout.aboutus-section')
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    @include('frontend.frontend_layout.services-section')
    <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    @include('frontend.frontend_layout.portfolio-section')
    <!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    @include('frontend.frontend_layout.our-clients-section')
    <!-- End Our Clients Section -->

@endsection
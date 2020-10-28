@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush
@section('content')


            <div class="row">
                <div class="col-sm-12">
                    <div class="header">
                        <!-- <img src="{{ asset('heading/PVGC-HERO-3.jpg')}}" class="card-img-top" alt="..."> -->
                        <!-- <img src="{{ asset('heading/lo-sarno-QLdp9SGDf5Y-unsplash.jpg')}}" class="card-img-top" alt="..."> -->
                        <img src="{{ asset('heading/noah-rosenfield-njAGLWiohCM-unsplash.jpg')}}" class="card-img-top" alt="...">

                        <!-- <img src="{{ asset('heading/PVGC-HERO-3.jpg')}}" class="card-img-top" alt="..."> -->

                        <div class="text">
                            <h4>Texas Scramble</h4>
                        </div>
                        <div class="button">
                        <a class="a-button" type="button" href="#section2">Bekijk meer</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="section2" class="row">

                
       
                <div class="col-md-4">
                    <div class="card">
                        <p>d</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <p>d</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <p>d</p>
                    </div>
                </div>
            </div>

@endsection

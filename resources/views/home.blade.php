@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">AI Image Generator</h1>
            <p class="lead mb-4">Transform your ideas into stunning visuals using Recraft V3's state-of-the-art AI</p>
            
            @guest
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Register</a>
                </div>
            @else
                <a href="{{ route('generate') }}" class="btn btn-primary btn-lg px-5">
                    Start Creating &rarr;
                </a>
            @endguest
            
            <div class="mt-5">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Instant Generation</h5>
                                <p class="card-text">Create images in seconds using natural language prompts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Multiple Styles</h5>
                                <p class="card-text">Choose from realistic images, digital art, or vector illustrations</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">HD Quality</h5>
                                <p class="card-text">Generate high-resolution images ready for professional use</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

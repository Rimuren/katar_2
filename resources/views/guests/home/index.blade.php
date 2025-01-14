@extends('guests.layouts.app')  

@section('title', 'Katar')

@section('content')
<div class="" id="card-color">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Inner -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1200x500?text=Slide+1" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome to Katar</h1>
                    <p class="lead">The Best Smart Cashier Application in the Universe and the Entire Planet</p>
                    <a href="#" class="btn btn-custom" style="color: #007bff;">Get Started <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
    
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1200x500?text=Slide+2" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Ini Adalah Katar</h1>
                    <p class="lead">The Best Smart Cashier Application in the Universe and the Entire Planet</p>
                    <a href="#" class="btn btn-custom" style="color: #007bff;">Get Started <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
    
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1200x500?text=Slide+3" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Hanya di Sinilah Katar Terbaik</h1>
                    <p class="lead">The Best Smart Cashier Application in the Universe and the Entire Planet</p>
                    <a href="#" class="btn btn-custom" style="color: #007bff;">Get Started <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    
        <!-- Carousel Controls -->
        <div class="carousel1">
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    &lt; <!-- Ikon panah kiri -->
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    &gt; <!-- Ikon panah kanan -->
    <span class="visually-hidden">Next</span>
</button>
</div>

    </div>
    
    <div class="features mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="#" class="card-img-top" alt="Feature 1">
                    <div class="card-body">
                        <h5 class="card-title">Feature 1</h5>
                        <p class="card-text">This is a short description of Feature 1.</p>
                        <a href="#" class="btn btn-custom" style="color: #007bff;">Explore Feature 1 <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="#" class="card-img-top" alt="Feature 2">
                    <div class="card-body">
                        <h5 class="card-title">Feature 2</h5>
                        <p class="card-text">This is a short description of Feature 2.</p>
                        <a href="#" class="btn btn-custom" style="color: #007bff;">Explore Feature 2 <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="#" class="card-img-top" alt="Feature 3">
                    <div class="card-body">
                        <h5 class="card-title">Feature 3</h5> 
                        <p class="card-text">This is a short description of Feature 3.</p>
                        <a href="#" class="btn btn-custom" style="color: #007bff;">Explore Feature 3 <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

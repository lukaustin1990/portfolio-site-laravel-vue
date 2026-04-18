@extends("layouts.app")

@section("title", "home")

@section("content")
<div id="carouselExampleControls" class="carousel slide mb-3" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://placehold.co/800x200" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://placehold.co/800x200" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://placehold.co/800x200" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<h1 class="display-1">Hello World</h1>
<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.</p>
<grid class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card h-100">
            <img src="https://placehold.co/400x200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="https://placehold.co/400x200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">    
            <img src="https://placehold.co/400x200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
            </div>
        </div>
    </div>
</grid>
@endsection
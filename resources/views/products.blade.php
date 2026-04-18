@extends("layouts.app")

@section("title", "All Products")

@section("content")
    <h1 class="display-1">All Products</h1>
    <p>##Blurb##</p>
    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="card">
                <h2 class="card-header">Filters</h2>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9"> 
            <div id="product-list">
            </div>
        </div>
    </div>
    @vite("resources/js/pages/ProductList.jsx")
@endsection
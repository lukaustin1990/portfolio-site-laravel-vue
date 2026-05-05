<x-layout title="{{ $product->name }}" description="{{ $product->description_short }}">
    <div class="mb-3">
        <a href="{{ route('products') }}" class="btn btn-secondary"><i class="fa fa-chevron-left"></i> Back to Products</a>
    </div>
    <div class="row">    
        <div class="col-12 col-lg-3">
            <img src="https://placehold.co/800?text=No+Image" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-12 col-lg-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted small">Product Code: {{ $product->product_code }}</p>
            <p>{{ $product->description_short }}</p>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body text-end">
                    <h2>£{{ number_format($product->price, 2) }} <span class="text-muted fs-6">ex. VAT</span></h2>
                    <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to Basket</button>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs mt-4" id="productTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
        </li>
    </ul>
    <div class="tab-content" id="productTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="row mt-3">
                <div class="col-12">
                    <p>{{ $product->description_long }}</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby ="reviews-tab">
            <div class="row mt-3">
                <div class="col-12">
                    <p>No reviews yet.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Relateed products -->
    <h2 class="mt-5">Related Products</h2>
    <div class="row">
        
    </div>
</x-layout>
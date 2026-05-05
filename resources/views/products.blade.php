<x-layout>
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
            <form method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <div id="vue-product-list">
                <!-- Vue component will be mounted here -->
            </div>
        </div>
    </div>
</x-layout>
@extends("admin.admin")

@section("title", "Manage Products")

@section("header", "Manage Products")

@section("content")
    <div id="products_admin_list"></div>
    @vite("resources/js/admin/ProductAdmin.jsx")
@endsection

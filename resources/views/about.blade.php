@extends("layouts.app")

@section("title", "About Me")

@section("content")
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/tutorials/timelines/timeline-3/assets/css/timeline-3.css">
    <div id="about-me-hero"></div>
    <!-- Timeline 3 - Bootstrap Brain Component -->
<section class="bsb-timeline-3 bg-light py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-center">
      <div id="about-timeline" class="col-12"></div>
    </div>
  </div>
</section>
    @vite("resources/js/pages/About.jsx")
@endsection

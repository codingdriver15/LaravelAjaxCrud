@extends('layouts.frontend')
@section('content')
<section id="intro" class="clearfix">
  @include('frontend.intropage')
</section>
<main id="main">
  <section id="about">
    @include('frontend.about')
  </section>
  <section id="services" class="section-bg">
    @include('frontend.about')
  </section>
  <section id="why-us" class="wow fadeIn">
    @include('frontend.why_us')
  </section>
  <section id="call-to-action" class="wow fadeInUp">
    @include('frontend.why_us')
  </section>
  <section id="features">
    @include('frontend.features')
  </section>
  <section id="portfolio" class="section-bg">
    @include('frontend.portfolio')
  </section>
  <section id="testimonials">
    @include('frontend.testimonials')
  </section>
  <section id="team" class="section-bg">
    @include('frontend.team')
  </section>
  <section id="clients" class="wow fadeInUp">
    @include('frontend.clients')
  </section>
  <section id="pricing" class="wow fadeInUp section-bg">
    @include('frontend.pricing')
  </section>
  <section id="faq">
    @include('frontend.faq')
  </section>
</main>
@endsection

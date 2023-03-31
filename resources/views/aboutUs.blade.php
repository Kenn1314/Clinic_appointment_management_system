@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  {{-- <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">
          <h6 class="card-title">INVOICE NINJA</h6>
          <h1 class="card-subtitle mb-4">Our Story</h1>
          <p class="card-text">We launched in early 2014 to build a suite of apps for freelancers &amp; small-businesses. From the very beginning we worked to make Invoice Ninja different.</p>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="bg-yellow points-block text-center block-text" style="background-image: url('test.png'); background-size: cover; background-position: center center;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="block-title block-title_md">Contentoo Proof Points</h2>
        </div>
                      <div class="col-12 col-md-4">
            <span class="icon-check icon-check_white m-b-15"></span>
            <p>Enjoy a two-month pilot period</p>
          </div>
                      <div class="col-12 col-md-4">
            <span class="icon-check icon-check_white m-b-15"></span>
            <p>Your team is assembled for free</p>
          </div>
                      <div class="col-12 col-md-4">
            <span class="icon-check icon-check_white m-b-15"></span>
            <p>100% quality guarantee</p>
          </div>
                  </div>
    </div>
    <br/>
  </div>
  <br/>
  <br/>
  <section class="has_ae_slider ae-bg-gallery-type-default">
    <div class="row row-cols-1 row-cols-md-2 g-0">
      <div class="col">
        <div class="card border-0 ae-bg-gallery-type-default">
          <img src="https://invoiceninja.com/wp-content/uploads/2022/07/Rectangle-18-1.jpg" class="card-img-top" alt="">
        </div>
      </div>
      <div class="col">
        <div class="card border-0 ae-bg-gallery-type-default">
          <div class="card-body">
            <h3 class="card-title">Team Ninja! Bootstrapped since 2014!</h3>
            <p class="card-text">We’re a small team of three founders – Hillel, Dave, Shalom. Hillel &amp; Shalom met for coffee in late 2013 to discuss the idea of Invoice Ninja. By March 2014, Invoice Ninja was live! Dave (CTO) came on board in 2015 and we never looked back!&nbsp;</p>
            <p class="card-text">Fast forward 8 years and we’ve created a suite of business tools we believe in and love. Now our invoicing platform easily rivals the largest companies in our industry, despite being 100% “bootstrapped” (i.e., self-funded, no VC overlords!).</p>
            <p class="card-text"><span style="color: var( --e-global-color-text );">We have the tools you need to facilitate business &amp; get paid.</span></p>
            <p class="card-text"><strong><span style="color: var( --e-global-color-text );">Email for support and we – the co-founders – will reply, fast.</span></strong></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
  <div class="row ae-bg-gallery-type-default">
    <div class="col-md-6 has_ae_slider">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Open Source Development</h3>
          <p class="card-text">
            We also offer Users the option to self-host Invoice Ninja on their own servers. The nature of our developmental process allows for a level of testing and quality assurance companies many times our size are just not able to match. When we release our latest release to production updates, it has already been deployed across 10’s of thousands of servers for QA. The result? An awesome experience feature you could possibly need, at a fraction of the cost of our competitors.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 has_ae_slider">
      <div class="card">
        <img src="https://invoiceninja.com/wp-content/uploads/2022/11/Team-Invoice-Ninja.jpg" class="card-img-top" alt="">
      </div>
    </div>
  </div>
</div>

    <h2 class="text-center text-white">Our Instructors</h2>
    <p class="lead text-center text-white mb-5">
      Our instructors all have 5+ years working as a web developer in the
      industry
    </p>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card bg-light">
          <div class="card-body text-center">
            <img
              src="https://randomuser.me/api/portraits/men/11.jpg"
              class="rounded-circle mb-3"
              alt=""
            />
            <h3 class="card-title mb-3">John Doe</h3>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
            </p>
            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card bg-light">
          <div class="card-body text-center">
            <img
              src="https://randomuser.me/api/portraits/women/11.jpg"
              class="rounded-circle mb-3"
              alt=""
            />
            <h3 class="card-title mb-3">Jane Doe</h3>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
            </p>
            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card bg-light">
          <div class="card-body text-center">
            <img
              src="https://randomuser.me/api/portraits/men/12.jpg"
              class="rounded-circle mb-3"
              alt=""
            />
            <h3 class="card-title mb-3">Steve Smith</h3>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
            </p>
            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card bg-light">
          <div class="card-body text-center">
            <img
              src="https://randomuser.me/api/portraits/women/12.jpg"
              class="rounded-circle mb-3"
              alt=""
            />
            <h3 class="card-title mb-3">Sara Smith</h3>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.
            </p>
            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
<br/>
<br/>
  <h1 style="text-align: center;">This is my Google Maps web page</h1>
  <br/><br/>
  <div class="google-map" style="text-align: center;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  
@endsection
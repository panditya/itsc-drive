@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{ asset('v1/assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('v1/assets/owlcarousel/css/owl.carousel.min.css') }}">
@endsection

@section('content')

      <div class="slidefeatured">
        <div class="owl-carousel">
          <div class="item">
            <img src="v1\data\img\slide1.jpg">
          </div>
          <div class="item">
            <img src="v1\data\img\slide2.jpg">
          </div>
          <div class="item">
            <img src="v1\data\img\slide3.jpg">
          </div>
          <div class="item">
            <img src="v1\data\img\slide4.jpg">
          </div>
          <div class="item">
            <img src="v1\data\img\slide5.jpg">
          </div>
          <div class="item">
            <img src="v1\data\img\slide6.jpg">
          </div>
        </div>
      </div>

      <div class="container">
        @foreach ($categories as $c)
          <section id="{{ $c->name }}">
            <p class="judsec">{{ $c->name}}</p>
            <div class="owl-carousel slide">
              @foreach ($c->file as $i)
                <div class="item">
                  <div class="file">
                    <div class="thumbnail">
                      <img src="{{ Storage::url($i->icon) }}">
                    </div>
                    <div class="tag">
                      {{ $i->name }}
                    </div>
                    <div class="name">
                      {{ substr($i->description,0,30) }}..
                      <form action="{{route('download',$i->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <input type="submit" class="btn btn-default btn-xs" value="Download"/>
                      </form>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </section>
        @endforeach
      </div>

@endsection

@section('script')
  <script src="{{ asset('v1/assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
  <script type="text/javascript">
  $('.slide').owlCarousel({
      stagePadding: 50,
      margin:10,
      autoWidth:true,
      nav: true,
      navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"]
  })

  $('.slidefeatured .owl-carousel').owlCarousel({
    loop:true,
    stagePadding: 50,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        700:{
            items:3
        },
        1400:{
            items:5
        }
    }
  })
  </script>
@endsection

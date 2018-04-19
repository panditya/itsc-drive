@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{ asset('v1/assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('v1/assets/owlcarousel/css/owl.carousel.min.css') }}">
@endsection

@section('content')

      <div class="container">
          <section id="{{ $file->name }}">
              <p class="judsec">{{ $file->category->name}}</p>
            <div class="row m-auto">
              <div class="col-md-5 m-auto">
                <img class="img-300" src="{{ Storage::url($file->icon) }}" alt="">
              </div>
              <div class="col-md-6 m-auto">
                <h4 class="text-white">{{ $file->name }} <i class="trigger fa fa-exclamation-circle text-white" data-toggle="modal" data-target="#addReportModal{{$file->id}}"></i> </h4>
                <p class="text-white">{{ $file->description }}</p>
                <hr>
                <div class="stats d-flex justify-content-around">
                  <div class="favorite">
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="download d-flex">
                    <i class="fa fa-download"></i><p>{{ $file->count }}</p>
                  </div>
                  <div class="share d-flex">
                      <i class="fa fa-facebook"></i>
                      <i class="fa fa-twitter"></i>
                      <i class="fa fa-envelope"></i>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @include('core.reports.modal')
      </div>
      <div class="container">
        @foreach ($categories as $c)
          <section id="{{ $c->name }}">
            <p class="judsec">{{ $c->name}}</p>
            <div class="owl-carousel slide">
              @foreach ($c->file as $i)
                @if ($file->id == $i->id)
                @else
                  <div class="item">
                    <div class="file">
                      <i class="trigger fa fa-info-circle" data-toggle="modal" data-target="#addReportModal{{$i->id}}"></i>
                      <div class="thumbnail">
                        <img src="{{ Storage::url($i->icon) }}">
                      </div>
                      <div class="tag">
                        {{ $i->name }}
                      </div>
                      <div class="name">
                        {{ substr($i->description,0,20) }}..
                        <form action="{{route('download',$i->id)}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('post') }}
                          <input type="submit" class="btn btn-default btn-xs" value="Download"/>
                        </form>
                      </div>
                    </div>
                  </div>
                @endif
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
  </script>
@endsection

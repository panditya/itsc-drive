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
        <section id="os">
          <p class="judsec">Sistem Operasi</p>
          <div class="owl-carousel slide">
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\ubuntu.jpg">
                </div>
                <div class="tag">
                  Ubuntu
                </div>
                <div class="name">
                  <a class="x" href="Z:\OS\ubuntu-17.04-desktop-amd64.iso">ubuntu-17.04-desktop-amd64.iso</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\windows.jpg">
                </div>
                <div class="tag">
                  Windows
                </div>
                <div class="name">
                  ru-en_windows_10_1703_x86-x64_20in1_KMS-activation.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\kali.jpg">
                </div>
                <div class="tag">
                  Kali
                </div>
                <div class="name">
                  kali-linux-2017.1-i386.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\redhat.jpg">
                </div>
                <div class="tag">
                  RedHat
                </div>
                <div class="name">
                  redhat.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\mikrotik.jpg">
                </div>
                <div class="tag">
                  MikroTik
                </div>
                <div class="name">
                  mikrotik-6.33.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\remixos.jpg">
                </div>
                <div class="tag">
                  Remix OS
                </div>
                <div class="name">
                  Remix_OS_for_PC_64_B2016011402_Alpha_Legacy.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\deepin.jpg">
                </div>
                <div class="tag">
                  Deepin
                </div>
                <div class="name">
                  deepin-15.4.1-amd64.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\debian.jpg">
                </div>
                <div class="tag">
                  Debian
                </div>
                <div class="name">
                  debian-8.6.0-amd64-DVD-1.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\debian.jpg">
                </div>
                <div class="tag">
                  Debian
                </div>
                <div class="name">
                  debian-8.6.0-amd64-DVD-2.iso
                </div>
              </div>
            </div>
            <div class="item">
              <div class="file">
                <div class="thumbnail">
                  <img src="v1\data\img\thumbnail\debian.jpg">
                </div>
                <div class="tag">
                  Debian
                </div>
                <div class="name">
                  debian-8.6.0-amd64-DVD-3.iso
                </div>
              </div>
            </div>
          </div>
        </section>

          <section id="aplikasi">
            <p class="judsec">Aplikasi</p>
            <div class="owl-carousel slide">
              @foreach ($files as $i)
              <div class="item">
                <div class="file">
                  <div class="thumbnail">
                    <img src="{{ Storage::url($i->icon) }}">
                  </div>
                  <div class="tag">
                    {{ $i->name }}
                  </div>
                  <div class="name">
                    {{ substr($i->description,0,30) }}
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


                  <section id="adobe">
                    <p class="judsec">Adobe</p>
                    <div class="owl-carousel slide">
                      <div class="item">
                        <div class="file">
                          <div class="thumbnail">
                            <img src="v1\data\img\thumbnail\ae.jpg">
                          </div>
                          <div class="tag">
                            After Effect
                          </div>
                          <div class="name">
                            A.AE.CC 2017.v14.2.0.198.rar
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="file">
                          <div class="thumbnail">
                            <img src="v1\data\img\thumbnail\ai.jpg">
                          </div>
                          <div class="tag">
                            Illustrator
                          </div>
                          <div class="name">
                            AI.CC2017.21.0.x64.rar
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="file">
                          <div class="thumbnail">
                            <img src="v1\data\img\thumbnail\au.jpg">
                          </div>
                          <div class="tag">
                            Audition
                          </div>
                          <div class="name">
                            AuditionCC2018.11.0.0.199.rar
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="file">
                          <div class="thumbnail">
                            <img src="v1\data\img\thumbnail\lr.jpg">
                          </div>
                          <div class="tag">
                            Lightroom
                          </div>
                          <div class="name">
                            AL.CC.6.0.rar
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="file">
                          <div class="thumbnail">
                            <img src="v1\data\img\thumbnail\pr.jpg">
                          </div>
                          <div class="tag">
                            Premiere Pro
                          </div>
                          <div class="name">
                            A.P.Pro.CC.11.1.2.x64.rar
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="file">
                          <div class="thumbnail">
                            <img src="v1\data\img\thumbnail\ps.jpg">
                          </div>
                          <div class="tag">
                            Photoshop
                          </div>
                          <div class="name">
                            AP.CC.18.0.1.29.x64.rar
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
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

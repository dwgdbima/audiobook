<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Audio Book - Subiakto Priosoedarsono">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Audio Book - Subiakto Priosoedarsono</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('dist/img/icons/icon-72x72.png')}}">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="{{asset('dist/img/icons/icon-96x96.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('dist/img/icons/icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('dist/img/icons/icon-167x167.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('dist/img/icons/icon-180x180.png')}}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/nice-select.css') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('dist/style.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
    <!-- Web App Manifest -->
    {{-- <link rel="manifest" href="{{asset('dist/manifest.json')}}"> --}}
    <style>
      .progress {
        width: 100%;
        -webkit-appearance: none;
        height: 6px;
        background: #a1a1a1;
        outline: none;
        /* opacity: 0.7; */
        -webkit-transition: 0.2s;
        transition: opacity 0.2s;
      }
      /* .progress::-webkit-slider-runnable-track{
        background: #fff;
      } */
      .progress::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 12px;
        height: 6px;
        background-color: #fff;
        cursor: pointer;
      }
      .btn-toggle-play {
        width: 20px;
        height: 24px;
        border-radius: 50%;
        font-size: 11px;
        color: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
      }

      .btn-toggle-play:hover{
        background-color: #d7d7d7;
      }

      .player .icon-pause {
        display: none;
      }

      .player.playing .icon-pause {
        display: inline-block;
      }

      .player.playing .icon-play {
        display: none;
      }
    </style>
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only"></div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="container mb-5">
          <div class="d-flex justify-content-end">
            <a style="color: #747794 !important; font-size: 13px;" href="{{route('login')}}" class="text-white">Login</a><span style="color: #747794 !important; font-size: 13px;" class="text-white mx-1">|</span><a style="color: #747794 !important; font-size: 13px;" href="{{route('login')}}" class="text-white">Affiliate</a>
          </div>
        </div>
        <div class="intro-wrapper-2 align-items-center justify-content-center text-center mb-5">
          <div class="container">
            <img class="big-logo rounded" style="width: 90%;" src="{{ asset('dist/img/human/subiakto-intro-bg-black.png') }}" alt="subiakto-image">
          </div>
        </div> 

        <div class="container mb-5 player" style="width: 350px; margin: auto;">
          <div class="d-flex align-items-center">
            <div class="btn btn-toggle-play">
              <i class="fas fa-pause icon-pause"></i>
              <i class="fas fa-play icon-play"></i>
            </div>
            <input id="progress" class="progress ms-2" type="range" value="0" step="1" min="0" max="100">
          </div>

          <audio id="audio" src=""></audio></div> 
        <div class="container text-center">
          <a class="btn btn-success btn-lg w-100 mb-2" style="display: block; margin:auto; width: 50% !important; background-color: #146c43;" href="{{route('login')}}">Mulai Diajarin Pak Bi</a>
          <span style="font-size: 13px;">Hanya Rp. 50rb mulai di ajarin langsung Pak Bi sepuasnya</span>  
        </div>  
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/waypoints.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('dist/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.passwordstrength.js')}}"></script>
    <script src="{{asset('dist/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('dist/js/theme-switching.js')}}"></script>
    <script src="{{asset('dist/js/active.js')}}"></script>
    {{-- <script src="{{asset('dist/js/pwa.js')}}"></script> --}}
    @include('sweetalert::alert')
    <script>
      $(document).ready(function(){

const $ = document.querySelector.bind(document);

const PlAYER_STORAGE_KEY = "F8_PLAYER";

const player = $(".player");
const audio = $("#audio");
const playBtn = $(".btn-toggle-play");
const progress = $("#progress");

const app = {
  currentIndex: 0,
  isPlaying: false,
  isRepeat: true,
  config: {},
  // (1/2) Uncomment the line below to use localStorage
  // config: JSON.parse(localStorage.getItem(PlAYER_STORAGE_KEY)) || {},
  songs: [
    {
      path:'/sinopsis.mp3'
    }
  ],
  setConfig: function (key, value) {
    this.config[key] = value;
    // (2/2) Uncomment the line below to use localStorage
    // localStorage.setItem(PlAYER_STORAGE_KEY, JSON.stringify(this.config));
  },
  defineProperties: function () {
    Object.defineProperty(this, "currentSong", {
      get: function () {
        return this.songs[this.currentIndex];
      }
    });
  },
  handleEvents: function () {
    const _this = this;

    playBtn.onclick = function () {
      if (_this.isPlaying) {
        audio.pause();
      } else {
        audio.play();
      }
    };

    audio.onplay = function () {
      _this.isPlaying = true;
      player.classList.add("playing");
    };

    audio.onpause = function () {
      _this.isPlaying = false;
      player.classList.remove("playing");
    };

    audio.ontimeupdate = function () {
      if (audio.duration) {
        const progressPercent = Math.floor(
          (audio.currentTime / audio.duration) * 100
        );
        progress.value = progressPercent;
      }
    };

    audio.onended = function () {
      if (_this.isRepeat) {
        audio.play();
      }
    };
  },
  loadCurrentSong: function () {
    audio.src = this.currentSong.path;
  },
  loadConfig: function () {
    this.isRepeat = this.config.isRepeat;
  },
  start: function () { 
      
    this.loadConfig();

    this.defineProperties();

    this.handleEvents();

    this.loadCurrentSong();

    // randomBtn.classList.toggle("active", this.isRandom);
    // repeatBtn.classList.toggle("active", this.isRepeat);
  }
};

app.start();
})
    </script>
  </body>
</html>
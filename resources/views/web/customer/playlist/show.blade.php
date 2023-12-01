@extends('web.customer.layout.main')
@push('styles')
<style>
.player {
  position: relative;
  margin-top: 50px;
  max-width: 480px;
  margin: 0 auto;
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

.dashboard {
  margin-top: 50px;
  padding: 16px 16px 14px;
  background-color: #fff;
  position: fixed;
  top: 0;
  width: 100%;
  max-width: 480px;
  border-bottom: 1px solid #ebebeb;
}

/* HEADER */
.header-players {
  text-align: center;
  margin-bottom: 10px;
}

.header-players h4 {
  color: #ea4c62;
  font-size: 12px;
}

.header-players h2 {
  color: var(--text-color);
  font-size: 20px;
}

/* CD */
.cd {
  display: flex;
  margin: auto;
  width: 200px;
}

.cd-thumb {
  width: 100%;
  padding-top: 100%;
  border-radius: 50%;
  background-color: #333;
  background-size: cover;
  margin: auto;
}

/* CONTROL */
.control {
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding: 18px 0 8px 0;
}

.control .btn {
  color: #666;
  padding: 18px;
  font-size: 18px;
}

.control .btn.active {
  color: #ea4c62;
}

.control .btn-toggle-play {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  font-size: 24px;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #ea4c62;
}

.progress {
  width: 100%;
  -webkit-appearance: none;
  height: 6px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: 0.2s;
  transition: opacity 0.2s;
}

.progress::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 12px;
  height: 6px;
  background-color: #ea4c62;
  cursor: pointer;
}

/* PLAYLIST */
.playlist {
  margin-top: 435px;
  padding: 12px;
}

.song {
  display: flex;
  align-items: center;
  margin-bottom: 12px;
  background-color: #fff;
  padding: 8px 16px;
  border-radius: 5px;
  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
}

.song.active {
  background-color: #ea4c62 !important;
}

.song:active {
  opacity: 0.8;
}

.song.active .option,
.song.active .author,
.song.active .title {
  color: #fff;
}

.song .thumb {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background-size: cover;
  margin: 0 8px;
}

.song .body {
  flex: 1;
  padding: 0 16px;
}

.song .title {
  font-size: 18px;
  color: var(--text-color);
}

.song .author {
  font-size: 12px;
  color: #999;
}

.song .option {
  padding: 16px 8px;
  color: #999;
  font-size: 18px;
}
[theme-color=dark] .dashboard {
  background-color: #332858;
  border-bottom: 1px solid #332858;
}
[theme-color=dark] .song{
  background-color: #332858;
}
</style>
@endpush
@section('content')
<div class="player">
    <!-- Dashboard -->
    <div class="dashboard">
        <!-- Header -->
        <div class="header-players">
            <h4>Now playing:</h4>
            <h2>String 57th & 9th</h2>
        </div>

        <!-- CD -->
        <div class="cd">
            <div class="cd-thumb">
            </div>
        </div>

        <!-- Control -->
        <div class="control">
            <div class="btn btn-repeat">
                <i class="fas fa-redo"></i>
            </div>
            <div class="btn btn-prev">
                <i class="fas fa-step-backward"></i>
            </div>
            <div class="btn btn-toggle-play">
                <i class="fas fa-pause icon-pause"></i>
                <i class="fas fa-play icon-play"></i>
            </div>
            <div class="btn btn-next">
                <i class="fas fa-step-forward"></i>
            </div>
            <div class="btn btn-random">
                <i class="fas fa-random"></i>
            </div>
        </div>

        <input id="progress" class="progress" type="range" value="0" step="1" min="0" max="100">

        <audio id="audio" src=""></audio>
    </div>

    <!-- Playlist -->
    <div class="playlist">
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){

const $ = document.querySelector.bind(document);

const PlAYER_STORAGE_KEY = "F8_PLAYER";

const player = $(".player");
const cd = $(".cd");
const heading = $(".header-players h2");
const cdThumb = $(".cd-thumb");
const audio = $("#audio");
const playBtn = $(".btn-toggle-play");
const progress = $("#progress");
const prevBtn = $(".btn-prev");
const nextBtn = $(".btn-next");
const randomBtn = $(".btn-random");
const repeatBtn = $(".btn-repeat");
const playlist = $(".playlist");

const app = {
  currentIndex: 0,
  isPlaying: false,
  isRandom: false,
  isRepeat: false,
  config: {},
  // (1/2) Uncomment the line below to use localStorage
  // config: JSON.parse(localStorage.getItem(PlAYER_STORAGE_KEY)) || {},
  songs: {{ Js::from($chapters) }},
  setConfig: function (key, value) {
    this.config[key] = value;
    // (2/2) Uncomment the line below to use localStorage
    // localStorage.setItem(PlAYER_STORAGE_KEY, JSON.stringify(this.config));
  },
  render: function () {
    const htmls = this.songs.map((song, index) => {
      return `
                        <div class="song ${
                          index === this.currentIndex ? "active" : ""
                        }" data-index="${index}">
                            <div class="thumb"
                                style="background-image: url('${song.image}')">
                            </div>
                            <div class="body">
                                <h3 class="title">${song.name}</h3>
                                <p class="author">${song.singer}</p>
                            </div>
                            <div class="option">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                    `;
    });
    playlist.innerHTML = htmls.join("");
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
    const cdWidth = cd.offsetWidth;

    const cdThumbAnimate = cdThumb.animate([{ transform: "rotate(360deg)" }], {
      duration: 10000, // 10 seconds
      iterations: Infinity
    });
    cdThumbAnimate.pause();

    document.onscroll = function () {
      const scrollTop = window.scrollY || document.documentElement.scrollTop;
      const newCdWidth = cdWidth - scrollTop;

      cd.style.width = newCdWidth > 0 ? newCdWidth + "px" : 0;
      cd.style.opacity = newCdWidth / cdWidth;
    };

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
      cdThumbAnimate.play();
    };

    audio.onpause = function () {
      _this.isPlaying = false;
      player.classList.remove("playing");
      cdThumbAnimate.pause();
    };

    audio.ontimeupdate = function () {
      if (audio.duration) {
        const progressPercent = Math.floor(
          (audio.currentTime / audio.duration) * 100
        );
        progress.value = progressPercent;
      }
    };

    progress.onchange = function (e) {
      const seekTime = (audio.duration / 100) * e.target.value;
      audio.currentTime = seekTime;
    };

    nextBtn.onclick = function () {
      if (_this.isRandom) {
        _this.playRandomSong();
      } else {
        _this.nextSong();
      }
      audio.play();
      _this.render();
      _this.scrollToActiveSong();
    };

    prevBtn.onclick = function () {
      if (_this.isRandom) {
        _this.playRandomSong();
      } else {
        _this.prevSong();
      }
      audio.play();
      _this.render();
      _this.scrollToActiveSong();
    };

    randomBtn.onclick = function (e) {
      _this.isRandom = !_this.isRandom;
      _this.setConfig("isRandom", _this.isRandom);
      randomBtn.classList.toggle("active", _this.isRandom);
    };

    repeatBtn.onclick = function (e) {
      _this.isRepeat = !_this.isRepeat;
      _this.setConfig("isRepeat", _this.isRepeat);
      repeatBtn.classList.toggle("active", _this.isRepeat);
    };

    audio.onended = function () {
      if (_this.isRepeat) {
        audio.play();
      } else {
        nextBtn.click();
      }
    };

    playlist.onclick = function (e) {
      const songNode = e.target.closest(".song:not(.active)");

      if (songNode || e.target.closest(".option")) {
        if (songNode) {
          _this.currentIndex = Number(songNode.dataset.index);
          _this.loadCurrentSong();
          _this.render();
          audio.play();
        }

        if (e.target.closest(".option")) {
        }
      }
    };
  },
  scrollToActiveSong: function () {
    setTimeout(() => {
      $(".song.active").scrollIntoView({
        behavior: "smooth",
        block: "nearest"
      });
    }, 300);
  },
  loadCurrentSong: function () {
    heading.textContent = this.currentSong.name;
    cdThumb.style.backgroundImage = `url('${this.currentSong.image}')`;
    audio.src = this.currentSong.path;
  },
  loadConfig: function () {
    this.isRandom = this.config.isRandom;
    this.isRepeat = this.config.isRepeat;
  },
  nextSong: function () {
    this.currentIndex++;
    if (this.currentIndex >= this.songs.length) {
      
      this.currentIndex = 0;
    }
    this.loadCurrentSong();
  },
  prevSong: function () {
    this.currentIndex--;
    if (this.currentIndex < 0) {
      this.currentIndex = this.songs.length - 1;
    }
    this.loadCurrentSong();
  },
  playRandomSong: function () {
    let newIndex;
    do {
      newIndex = Math.floor(Math.random() * this.songs.length);
    } while (newIndex === this.currentIndex);

    this.currentIndex = newIndex;
    this.loadCurrentSong();
  },
  start: function () { 
      
    this.loadConfig();

    this.defineProperties();

    this.handleEvents();

    this.loadCurrentSong();

    this.render();

    // randomBtn.classList.toggle("active", this.isRandom);
    repeatBtn.classList.toggle("active", this.isRepeat);
  }
};

app.start();
})
</script>
@endpush
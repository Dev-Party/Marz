<template>
<div>
  <div class="row">
    <div v-for="radio in radios">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="media">
              <div v-if="radio.streaming" class="media-left">
                <a href="#" v-on:click.prevent="listen(radio.id)"><img id="{{ radio.id }}" class="media-object" src="/img/play.png"></a>
                <audio id="player-{{ radio.id }}" preload="none">
                  <source :src="radio.streaming + '/;'" type="audio/mpeg">
                  <source :src="radio.streaming" type="audio/ogg">
                  <source :src="radio.streaming" type="audio/wav">
                </audio>
              </div>
              <div class="media-body">
                <h4 class="media-heading"> {{radio.name}} <small>{{radio.frequency}} MHz</small></h4>
                <span>{{ radio.city }}, {{ radio.state }}</span>
              </div>
            </div>
          </div>
        </div>
      </div><!-- .col-md-2 -->
    </div>
  </div><!-- .row -->
</div>
</template>

<script>
export default {
  data () {
    return {
      state: 0,
      playing: 0,
      radios: []
    }
  },

  ready: function () {
    this.listRadios();
  },

  methods: {
    listRadios() {
      this.$http.get('/api/radio').then(function (response) {
        this.radios = response.data.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    searchRadio: function () {
      this.$http.get('/api/radio/search?q=' + this.search).then(function (response) {
        this.radios = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    listen: function (radioId) {
      if (radioId != this.playing) {
        if (this.playing) this.pauseRadio(this.playing);
        this.playRadio(radioId);
        this.playing = radioId;
      } else {
        this.pauseRadio(radioId);
        this.playing = 0;
      }
    },
    playRadio: function (index) {
      var player = document.getElementById("player-" + index);
      player.play(); // Reproducir audio
      player.onplaying = function () {
        document.getElementById(index).src = "/img/pause.png";
      }
    },
    pauseRadio: function (index) {
      var player = document.getElementById("player-" + index);
      player.pause(); // Detener la reproducción
      document.getElementById(index).src = "/img/play.png";
    }
  },
  notify: function () {
    if (this.state) {
      this.$dispatch('child-state', this.state)
      console.log(this.state)
      this.state = 0
    }
  }
}
</script>
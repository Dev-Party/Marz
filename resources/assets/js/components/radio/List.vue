<template>
<div class="row search">
  <div class="col-xs-12">
    <input type="text" v-model.trim="search" v-on:keyup.prevent="searchRadio" class="form-control" placeholder="Buscar">
  </div>
</div>
<div class="panel panel-default" v-for="radio in radios">
  <div class="panel-body">
    <div class="media">
      <div v-if="radio.streaming" class="media-left">
        <a href="#" v-on:click.prevent="listen(radio.id)"><img id="{{ radio.id }}" class="media-object" src="http://marz.herokuapp.com/img/play.png"></a>
        <audio id="player-{{ radio.id }}" preload="none">
          <source :src="radio.streaming + '/;'" type="audio/mpeg">
          <source :src="radio.streaming" type="audio/ogg">
          <source :src="radio.streaming" type="audio/wav">
        </audio>
      </div>
      <div class="media-body">
        <h4 class="media-heading"><small>{{ radio.modulation }}</small> {{ radio.name }} {{ radio.frequency }} Mhz.</h4>
        <span>{{ radio.city }}, {{ radio.state }}</span>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  data () {
    return {
      search: '',
      playing: 0,
      radios: []
    }
  },

  ready: function () {
    this.loadRadios();
  },

  methods: {
    loadRadios: function () {
      this.$http.get('api/radio').then(function (response) {
        this.radios = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    searchRadio: function () {
      this.$http.get('api/radio/search?q=' + this.search).then(function (response) {
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
        document.getElementById(index).src = "http://marz.herokuapp.com/img/pause.png";
      }
    },
    pauseRadio: function (index) {
      var player = document.getElementById("player-" + index);
      player.pause(); // Detener la reproducción
      document.getElementById(index).src = "http://marz.herokuapp.com/img/play.png";
    }
  }
}
</script>
<style>
.search {
  margin-bottom: 20px;
}
</style>
<template>
<div class="row">
  <div class="col-xs-7">
    <input type="text" v-model.trim="search" v-on:keyup.prevent="searchRadio" class="form-control" placeholder="Buscar">
  </div>
  <div class="col-xs-5">
    <select v-model="city" class="form-control">
      <option value="" selected="selected">Todas las ciudades</option>
      <option v-for="city in cities | orderBy 'name'" value="{{ city.id }}">{{ city.name }}</option>
    </select>
  </div>
</div>
<hr>
<div class="panel panel-default" v-for="radio in radios | orderBy field | filterBy city in 'city_id'">
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
        <h4 class="media-heading">{{ radio.modulation }} {{ radio.name }} {{ radio.frequency }} Mhz.</h4>
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
      city: '',
      field: 'name',
      playing: 0,
      cities: [],
      radios: []
    }
  },

  ready: function () {
    this.getAllcitiesOfOneState(1);
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
    },
    getAllcitiesOfOneState: function (state) {
      this.$http.get('api/state/' + state +'/cities').then(function (response) {
        this.cities = response.data;
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
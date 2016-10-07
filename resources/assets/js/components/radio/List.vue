<template>
<div class="row">
  <div class="col-xs-12">
    <input type="text" v-model.trim="value" v-on:keyup="searchRadio($event)" class="form-control input-lg" placeholder="Buscar">
  </div>
</div>
<hr>
<div class="panel panel-default" v-for="radio in radios | orderBy field reverse">
  <div class="panel-body">
    <div class="media">
      <div class="media-left">
        <a href="#" v-on:click="playRadio(radio.name, $index, $event)"><img id="{{ $index }}" class="media-object" src="http://marz.herokuapp.com/img/play.png"></a>
        <audio id="player-{{ $index }}" preload="none">
          <source :src="radio.streaming + '/;stream/1'" type="audio/mpeg">
          <source :src="radio.streaming" type="audio/ogg">
          <source :src="radio.streaming" type="audio/wav">
        </audio>
      </div>
      <div class="media-body">
        <h4 class="media-heading">{{ radio.name }} {{ radio.frequency }} Mhz</h4>
        <span>{{ radio.city }}, {{ radio.state }}</span>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: ['radios', 'value'],
  data () {
    return {
      field: 'name',
      reverse: false
    }
  },

  ready: function (){
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
    searchRadio: function (event) {
      if (event) event.preventDefault()

      this.$http.get('api/radio/search?q=' + this.value).then(function (response) {
        this.radios = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    playRadio: function (name, index, event) {
      if (event) event.preventDefault()

      var player = document.getElementById("player-" + index);

      if (player.paused) {
        player.play(); // Reproducir audio
        player.onplaying = function () {
          document.title = name;
          document.getElementById(index).src = "http://marz.herokuapp.com/img/pause.png";
        }
      } else {
        player.pause(); // Detener la reproducción
        document.title = "Marz";
        document.getElementById(index).src = "http://marz.herokuapp.com/img/play.png";
      }

    }
  }
}
</script>

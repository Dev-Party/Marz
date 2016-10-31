<template>
<div>
  <div class="panel panel-default" v-for="radio in radios">
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
        <div class="media-right">
          <p class="text-muted">{{ radio.modulation }}</p>
        </div>
      </div>
    </div>
  </div>
  <infinite-loading :on-infinite="onInfinite" spinner="spiral">
    <span slot="no-more">...</span>
  </infinite-loading>
</div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';

export default {
  data () {
    return {
      search: '',
      per_page: 0,
      playing: 0,
      radios: []
    }
  },

  methods: {
    onInfinite() {
      let options = {
        params: {
          page: this.radios.length / this.per_page + 1
        }
      };
      this.$http.get('/api/radio', options).then((res) => {
        this.per_page = res.data.per_page;
        if (res.data.data.length) {
          this.radios = this.radios.concat(res.data.data);
          this.$broadcast('$InfiniteLoading:loaded');
          if (this.radios.length == res.data.total) {
            this.$broadcast('$InfiniteLoading:complete');
          }
        } else {
          this.$broadcast('$InfiniteLoading:complete');
        }
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

  components: {
    InfiniteLoading
  }
}
</script>
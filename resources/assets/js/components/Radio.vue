<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <audio id="audio"></audio>
              <div class="panel panel-default" v-for="radio in radios | orderBy 'name'">
                <div class="panel-body">
                  <div class="media">
                    <div class="media-left">
                      <a href="#" v-on:click="playRadio(radio.id, radio.streaming, $event)"><img id="i-{{ radio.id }}"class="media-object" src="http://marz.herokuapp.com/img/play.png"></a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">{{ radio.name }} {{ radio.frequency }} Mhz</h4>
                      <span>{{ radio.city }}, {{ radio.state }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data () {
    return {
      order: 1,
      radios: []
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
    playRadio: function (id, streaming, event) {
      if (event) event.preventDefault()

      var audio = document.getElementById('audio');

      if (audio.paused) {
        document.getElementById("i-" + id).src = "http://marz.herokuapp.com/img/pause.png";
        audio.src = streaming + "/;stream/1";
        audio.play();
      } else {
        document.getElementById("i-" + id).src = "http://marz.herokuapp.com/img/play.png";
        audio.pause();
      }

    }
  }
}
</script>

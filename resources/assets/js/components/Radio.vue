<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" v-for="radio in radios | orderBy 'name' order">
                    <div class="panel-body">
                      <div class="media">
                        <div class="media-body">
                          <h4 class="media-heading">{{ radio.name }} - {{ radio.frequency }} Mhz</h4>
                          <p>{{ radio.city }}</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var urlApi = "api/";

export default {
  data () {
    return {
      city: '',
      order: 1,
      playing: false,
      radios: []
    }
  },

  ready: function (){
    this.loadRadios();
  },

  methods: {
    loadRadios: function () {
      this.$http.get(urlApi + 'radio').then(function (response) {
        this.radios = response.data;
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>

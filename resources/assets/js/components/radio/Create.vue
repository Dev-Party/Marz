<template>
<form class="form-horizontal">

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input v-model.trim="radio.name" type="text" class="form-control" value="" placeholder="Radio Marz" autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="frequency" class="col-md-4 control-label">Frequency</label>

        <div class="col-md-6">
            <div class="input-group">
              <input v-model="radio.frequency" type="text" class="form-control" value="" placeholder="90.07">
              <span class="input-group-addon">MHz</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="modulation_id" class="col-md-4 control-label">Modulation</label>

        <div class="col-md-6">
          <label class="radio-inline" v-for="modulation in modulations">
            <input v-model="radio.modulation_id" type="radio" value="{{ modulation.id }}"> {{ modulation.name }}
          </label>
        </div>
    </div>

    <div class="form-group">
        <label for="state_id" class="col-md-4 control-label">State</label>

        <div class="col-md-6">
          <select v-model="radio.state_id" class="form-control">
            <option value="" selected="selected">Seleccione la provincia</option>
            <option v-for="state in states | orderBy 'name'" value="{{ state.id }}">{{ state.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group" v-if="radio.state_id > 0">
        <label for="city_id" class="col-md-4 control-label">City</label>

        <div class="col-md-6">
          <select v-model="radio.city_id" class="form-control">
            <option value="" selected="selected">Seleccione la ciudad</option>
            <option v-for="city in cities | orderBy 'name'" value="{{ city.id }}">{{ city.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group">
        <label for="streaming" class="col-md-4 control-label">Streaming</label>

        <div class="col-md-6">
          <input v-model.trim="radio.streaming" type="text" class="form-control" value="" placeholder="http://ejemplo.com:8080/;stream">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button v-on:click="saveRadio()" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
</template>

<script>
export default {
  data () {
    return {
      modulations: [],
      states: [],
      cities: [],
      radio: {}
    }
  },

  watch: {
    radio: function(radio) {
      if (radio.state_id > 0) {
        this.getAllcitiesOfOneState(radio.state_id)
      }
    }
  },

  ready: function (){
    this.getAllModulations();
    this.getAllStates();
  },

  methods: {
    getAllModulations: function () {
      this.$http.get('api/modulation').then(function (response) {
        this.modulations = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    getAllStates: function () {
      this.$http.get('api/state').then(function (response) {
        this.states = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    getAllcitiesOfOneState: function (state) {
      this.$http.get('api/state/' + this.radio.state_id +'/cities').then(function (response) {
        this.cities = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    saveRadio: function (event) {
      if (event) event.preventDefault()
      this.$http.post('api/radio', this.radio).then(function (response) {
        if (response.data.created == true) {
          console.log('created')
          this.radio = {}
        }
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
<template>
<validator name="validation">
<form class="form-horizontal" novalidate>

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Nombre</label>

        <div class="col-md-6">
            <input v-validate:name="{ required: true, minlength: 3, maxlength: 50 }" v-model.trim="radio.name" v-on:click="success = false" type="text" class="form-control" value="" autofocus>
            <span v-if="$validation.name.maxlength" class="text-danger">El nombre es largo.</span>
        </div>
    </div>

    <div class="form-group">
        <label for="frequency" class="col-md-4 control-label">Frecuencia</label>

        <div class="col-md-6">
            <div class="input-group">
              <input v-validate:frequency="{ required: true }" v-model="radio.frequency" type="text" class="form-control" value="" placeholder="00.00">
              <span class="input-group-addon">MHz</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="modulation_id" class="col-md-4 control-label">Modulación</label>

        <div class="col-md-6">
          <label class="radio-inline" v-for="modulation in modulations">
            <input v-validate:modulation="{ required: true }" v-model="radio.modulation_id" type="radio" value="{{ modulation.id }}"> {{ modulation.name }}
          </label>
        </div>
    </div>

    <div class="form-group">
        <label for="state_id" class="col-md-4 control-label">Provincia</label>

        <div class="col-md-6">
          <select v-validate:state="{ required: true }" v-on:change="getAllcitiesOfOneState(radio.state_id)" v-model="radio.state_id" class="form-control">
            <option value="" selected="selected">Seleccione la provincia</option>
            <option v-for="state in states | orderBy 'name'" value="{{ state.id }}">{{ state.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group">
        <label for="city_id" class="col-md-4 control-label">Ciudad</label>

        <div class="col-md-6">
          <select v-validate:city="{ required: true }" v-model="radio.city_id" class="form-control" :disabled="!radio.state_id">
            <option value="" selected="selected">Seleccione la ciudad</option>
            <option v-for="city in cities | orderBy 'name'" value="{{ city.id }}">{{ city.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group">
        <label for="website" class="col-md-4 control-label">Sitio web</label>

        <div class="col-md-6">
          <input v-model.trim="radio.website" type="text" class="form-control" value="" placeholder="http://ejemplo.com">
        </div>
    </div>

    <div class="form-group">
        <label for="streaming" class="col-md-4 control-label">Streaming</label>

        <div class="col-md-6">
          <input v-model.trim="radio.streaming" type="text" class="form-control" value="" placeholder="http://ejemplo.com:8080">
        </div>
    </div>
    <div v-if="success" class="form-group">
      <div class="col-md-6 col-md-offset-4">
        <p class="text-success"><strong>Felicidades, radio publicada!</strong></p>
      </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" v-on:click.prevent="saveRadio()" class="btn btn-primary" :disabled="!$validation.valid">Crear</button>
        </div>
    </div>
</form>
</validator>
</template>

<script>
export default {
  data () {
    return {
      success: false,
      modulations: [],
      states: [],
      cities: [],
      radio: {
        state_id: 0
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
      if (state > 0) {
        this.$http.get('api/state/' + state +'/cities').then(function (response) {
          this.cities = response.data;
        }, function (response) {
          console.log(response.status);
        });
      }
    },
    saveRadio: function () {
      this.$http.post('api/radio', this.radio).then(function (response) {
        if (response.data.created == true) {
          this.success = true;
          this.radio = {}
        }
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
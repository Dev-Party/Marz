<template>
<div>
<validator name="validation">
<form class="form-horizontal" novalidate>

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Nombre</label>
        <div class="col-md-6">
            <input v-validate:name="{ required: true, minlength: 3, maxlength: 50 }" v-model.trim="radio.name" type="text" class="form-control" value="" autofocus>
            <span v-if="$validation.name.maxlength" class="text-danger">El nombre es largo.</span>
        </div>
    </div>

    <div class="form-group">
        <label for="frequency" class="col-md-4 control-label">Frecuencia</label>
        <div class="col-md-6">
            <div class="input-group">
              <input v-validate:frequency="{ required: true }" v-model="radio.frequency" type="text" class="form-control" :value="frequency" placeholder="00.00">
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
          <select v-validate:state="{ required: true }" v-model="radio.state_id" v-on:change="getAllcitiesOfOneState(radio.state_id)" class="form-control">
            <option value="0" selected="selected">Seleccione la provincia</option>
            <option v-for="state in states" value="{{ state.id }}">{{ state.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group">
        <label for="city_id" class="col-md-4 control-label">Ciudad</label>
        <div class="col-md-6">
          <select v-validate:city="{ required: true }" v-model="radio.city_id" class="form-control" :disabled="radio.state_id == 0">
            <option value="0" selected="selected">Seleccione la ciudad</option>
            <option v-for="city in cities" value="{{ city.id }}">{{ city.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-md-4 control-label">Dirección</label>
        <div class="col-md-6">
          <input v-model.trim="radio.address" type="text" class="form-control" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="website" class="col-md-4 control-label">Sitio web</label>
        <div class="col-md-6">
          <input v-model.trim="radio.website" type="url" class="form-control" value="" placeholder="http://radio.com">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-4 control-label">Correo</label>
        <div class="col-md-6">
          <input v-model.trim="radio.email" type="email" class="form-control" value="" placeholder="contacto@radio.com">
        </div>
    </div>

    <div class="form-group">
        <label for="phone" class="col-md-4 control-label">Teléfono</label>
        <div class="col-md-6">
          <input v-model.trim="radio.phone" type="text" class="form-control" value="" placeholder="(000) 000-0000">
        </div>
    </div>

    <div class="form-group">
        <label for="streaming" class="col-md-4 control-label">Streaming</label>
        <div class="col-md-6">
          <input v-model.trim="radio.streaming" type="url" class="form-control" value="" placeholder="http://ejemplo.com:8080">
        </div>
    </div>

    <div v-if="success" class="form-group">
      <div class="col-md-6 col-md-offset-4">
        <div class="alert alert-success" role="alert">
        Felicidades, datos guardados :)
        </div>
      </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="button" v-on:click.prevent="saveRadio()" class="btn btn-primary" :disabled="$validation.invalid">Guardar</button>
        </div>
    </div>
</form>
</validator>
</div>
</template>

<script>
export default {
  props: {
    id: Number
  },
  data () {
    return {
      success: false,
      modulations: [],
      states: [],
      cities: [],
      radio: this.initialRadio()
    }
  },

  ready: function () {
    this.getAllModulations();
    this.getAllStates();

    if (this.id > 0) {
      this.getRadio();
    }
  },

  methods: {

    // Metodo para inicializar los datos de la radio.
    initialRadio: function () {
      return {
        name: '',
        frequency: '',
        modulation_id: 0,
        state_id: 0,
        city_id: 0,
        address: '',
        website: '',
        email: '',
        streaming: ''
      };
    },

    // Metodo para obtener una radio segun el id.
    getRadio: function () {
      this.$http.get('/api/radio/' + this.id).then(function (response) {
        this.radio = response.data;
        this.getAllcitiesOfOneState(this.radio.state_id);
      }, function (response) {
        console.log(response.status);
      });
    },

    // Metodo para obtener todas las modulaciones.
    getAllModulations: function () {
      this.$http.get('/api/modulation').then(function (response) {
        this.modulations = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },

    // Metodo para obtener todas las provincias.
    getAllStates: function () {
      this.$http.get('/api/state').then(function (response) {
        this.states = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },

    // Metodo para obtener todas las ciudades de una provincia.
    getAllcitiesOfOneState: function (state) {
      if (state > 0) {
        this.$http.get('/api/state/' + state +'/cities').then(function (response) {
          this.cities = response.data;
        }, function (response) {
          console.log(response.status);
        });
      }
    },

    // Metodo para enviar los datos de la nueva radio.
    saveRadio: function () {
      console.log('Guardar');
      if (this.id > 0) {
        // Guardar los nuevos cambios
        this.$http.put('/api/radio/' + this.id, this.radio).then(function (response) {
          console.log(response.status);
          if (response.status == 200) {
            this.success = true;
            var self = this;
              setTimeout(function(){
                  self.success = false;
              }, 3000);
          }
        }, function (response) {
          console.log(response.status);
        });
      } else {
        // Crear una radio nueva
        this.$http.post('/api/radio', this.radio).then(function (response) {
          this.radio = this.initialRadio();
          this.success = true;
          var self = this;
            setTimeout(function(){
                self.success = false;
            }, 3000);
        }, function (response) {
          console.log(response.status);
        });
      }
    }
  }
}
</script>
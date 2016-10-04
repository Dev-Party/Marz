<template>
<form class="form-horizontal" role="form" method="POST">

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="frequency" class="col-md-4 control-label">Frequency</label>

        <div class="col-md-6">
            <input id="frequency" type="text" class="form-control" name="frequency" value="" required>
        </div>
    </div>

    <div class="form-group">
        <label for="modulation_id" class="col-md-4 control-label">modulation_id</label>

        <div class="col-md-6">
          <select class="form-control" name="modulation_id">
            <option value="" selected="selected">Seleccione la modulación</option>
            <option v-for="modulation in modulations" value="{{ modulation.id }}">{{ modulation.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group">
        <label for="streaming" class="col-md-4 control-label">streaming</label>

        <div class="col-md-6">
            <input id="streaming" type="text" class="form-control" name="streaming" value="" required>
        </div>
    </div>

    <div class="form-group">
        <label for="state_id" class="col-md-4 control-label">state_id</label>

        <div class="col-md-6">
          <select class="form-control" name="state_id">
            <option value="" selected="selected">Seleccione la provincia</option>
            <option v-for="state in states" value="{{ state.id }}">{{ state.name }}</option>
          </select>
        </div>
    </div>

    <div class="form-group">
        <label for="city_id" class="col-md-4 control-label">city_id</label>

        <div class="col-md-6">
            <input id="city_id" type="text" class="form-control" name="city_id" value="" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </div>
</form>
</template>

<script>
var urlApi = "api/";

export default {
  data () {
    return {
      modulations: [],
      states: []
    }
  },

  ready: function (){
    this.listModulations();
    this.listStates();
  },

  methods: {
    listModulations: function () {
      this.$http.get(urlApi + 'modulation').then(function (response) {
        this.modulations = response.data;
      }, function (response) {
        console.log(response.status);
      });
    },
    listStates: function () {
      this.$http.get(urlApi + 'state').then(function (response) {
        this.states = response.data;
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
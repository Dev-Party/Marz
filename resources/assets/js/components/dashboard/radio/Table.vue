<template>
<div>
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Frecuencia</th>
          <th>Modulación</th>
          <th>Provincia</th>
          <th>Ciudad</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="radio in radios">
          <th scope="row">{{ radio.id }}</th>
          <td>{{ radio.name }}</td>
          <td>{{ radio.frequency }} MHz</td>
          <td>{{ radio.modulation }}</td>
          <td>{{ radio.state }}</td>
          <td>{{ radio.city }}</td>
          <td><a href="/radio/{{ radio.id }}/edit">Editar</a></td>
        </tr>
      </tbody>
    </table>
  </div><!-- .panel-body -->
</div><!-- .panel -->
</div>
</template>

<script>
export default {
  data () {
    return {
      radios: []
    }
  },

  ready: function () {
    this.loadRadios();
  },

  methods: {
    loadRadios: function () {
      this.$http.get('/api/radio').then(function (response) {
        this.radios = response.data;
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
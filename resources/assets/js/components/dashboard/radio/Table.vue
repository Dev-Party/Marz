<template>
<div>
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>Nombre</th>
          <th>MHz</th>
          <th>Modulación</th>
          <th>Provincia</th>
          <th>Ciudad</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="radio in radios">
          <td v-if="radio.active">
            <a v-on:click="activeRadio(0, $index)" class="text-muted" title="Desactivar">
              <i class="fa fa-circle-o"></i>
            </a>
          </td>
          <td v-else>
            <a v-on:click="activeRadio(1, $index)" class="text-danger" title="Activar">
              <i class="fa fa-circle"></i>
            </a>
          </td>
          <td>{{ radio.name }}</td>
          <td>{{ radio.frequency }}</td>
          <td>{{ radio.modulation }}</td>
          <td>{{ radio.state }}</td>
          <td>{{ radio.city }}</td>
          <td>
          <div class="dropdown">
            <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="/radio/{{ radio.id }}/edit">Editar</a></li>
            </ul>
          </div>
          </td>
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
    activeRadio: function (active, index) {
      var radio = this.radios[index];
      radio.active = active;

      // Guardar los nuevos cambios
      this.$http.put('/api/radio/' + radio.id, radio).then(function (response) {
        console.log(response.body);
      }, function (response) {
        console.log(response.status);
      });
    },
    loadRadios: function () {
      let options = {
        params: {
          active: 'all',
          streaming: 'all',
          order: 'desc'
        }
      };
      this.$http.get('/api/radio', options).then(function (response) {
        this.radios = response.data.data;
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
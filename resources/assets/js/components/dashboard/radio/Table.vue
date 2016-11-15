<template>
<div>
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table">
    <caption>Total: {{ pagination.total }}</caption>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Ubicación</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="radio in radios">
          <td>{{ radio.name }} {{ radio.frequency }} MHz</td>
          <td>{{ radio.city }}, {{ radio.state }}</td>
          <td class="text-right">
            <a v-if="radio.active" v-on:click="activeRadio(0, $index)" class="text-success" title="Desactivar">
            <i class="fa fa-toggle-on" aria-hidden="true"></i>
            </a>
            <a v-else v-on:click="activeRadio(1, $index)" class="text-danger" title="Activar">
            <i class="fa fa-toggle-off" aria-hidden="true"></i>
            </a> 
            - 
            <a href="/radio/{{ radio.id }}/edit" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
      <nav class="text-center" v-if="pagination.total >= pagination.per_page">
          <ul class="pagination">
              <li v-if="pagination.current_page > 1">
                  <a href="#" aria-label="Previous"
                     @click.prevent="changePage(pagination.current_page - 1)">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>
              <li v-for="page in pagesNumber"
                  v-bind:class="[ page == isActived ? 'active' : '']">
                  <a href="#"
                     @click.prevent="changePage(page)">{{ page }}</a>
              </li>
              <li v-if="pagination.current_page < pagination.last_page">
                  <a href="#" aria-label="Next"
                     @click.prevent="changePage(pagination.current_page + 1)">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
          </ul>
      </nav>
  </div><!-- .panel-body -->
</div><!-- .panel -->
</div>
</template>

<script>
export default {
  data () {
    return {
      pagination: {
        total: 0,
        per_page: 7,
        from: 1,
        to: 0,
        current_page: 1
      },
      offset: 4,
      radios: []
    }
  },

  ready: function () {
    this.fetchRadios(this.pagination.current_page);
  },

  computed: {
    isActived: function () {
      return this.pagination.current_page;
    },
    pagesNumber: function () {
      if (!this.pagination.to) {
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }
      var to = from + (this.offset * 2);
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  },

  methods: {
    fetchRadios: function (page) {
      let options = {
        params: {
          active: 'all',
          streaming: 'all',
          order: 'desc',
          page: page
        }
      };

      this.$http.get('/api/radio', options).then(function (response) {
        this.$set('radios', response.data.data);
        this.$set('pagination', response.data);
      }, function (error) {
        console.log(error);
      });
    },
    changePage: function (page) {
      this.pagination.current_page = page;
      this.fetchRadios(page);
    },
    activeRadio: function (active, index) {
      var radio = this.radios[index];
      radio.active = active;

      // Guardar los nuevos cambios
      this.$http.put('/api/radio/' + radio.id, radio).then(function (response) {
        console.log(response.body);
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
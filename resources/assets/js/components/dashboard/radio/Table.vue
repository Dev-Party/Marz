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
      <nav class="text-center" v-if="pagination.total > 22">
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
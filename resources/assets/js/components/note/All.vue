<template>
<div>
    <div class="panel panel-primary">
      <div class="panel-heading">Notas</div>
      <ul class="list-group notes">
        <li class="list-group-item" v-for="note in notes">
          <small class="text-danger blink" v-if="! note.audio">AHORA</small>
          <small class="text-muted" v-else>{{ timestamp(note.created_at) }}</small> -
          <a href="/uploads/audios/{{ note.audio }}" v-if="note.audio" title="Descargar audio" target="_blank">{{ note.title }}</a>
          <span v-else>{{ note.title }}</span>
           / <small class="text-muted text-left">{{ note.radio_name }} {{ note.radio_frequency }} MHz</small>
        </li>
      </ul><!-- .list-group -->
    </div><!-- .panel -->
</div>
</template>

<script>
import moment from 'moment'

export default {
  data () {
    return {
      initialized: false,
      notes: []
    }
  },

  ready: function () {
    this.listNotes();
  },
  methods: {
    timestamp: function (date) {
      return moment(date).format('hh:mm')
    },
    listNotes() {
      this.$http.get('/api/note').then(function (response) {
        this.$set('notes', response.data);
        
        if ( !this.initialized) {
          this.$el.classList.add("is-ready");
          this.initialized = true;
        }

        setTimeout(this.listNotes, 10000);
      
      }, function (response) {
        console.log(response.status);
      });
    }
  }
}
</script>
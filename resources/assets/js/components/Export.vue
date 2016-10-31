<template>
<div>
<a class="btn btn-default" v-on:click.prevent="exportChaco" role="button">
  <i class="fa fa-file-code-o" aria-hidden="true"></i> Descargar
</a>
</div>
</template>
<script>

export default {
  methods: {
    exportChaco: function () {
      window.open('/export/chaco.xml');
    }
  }
}
</script>
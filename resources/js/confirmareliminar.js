var confirmareliminar = new Vue({
      el: '#confirmareliminar',
      data: {
          url_eliminar: '',
      }, 
      methods: {
          deseas_eliminar(id) {
                this.url_eliminar = `${document.getElementById('ruta').innerHTML}/${id}`
          }
      }    
  })
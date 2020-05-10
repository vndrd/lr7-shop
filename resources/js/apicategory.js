var apicategory = new Vue({
    el: '#apicategory',
    data: {
        nombre: 'Nombre',
        slug: '',
        descripcion: '',
        settings : {
            clase_slug: 'badge badge-danger',
            deshabilitar_boton: true,
            mostrar_mensaje: false
        },
        div_mensajeslug:'Slug Existe',
    }, 
    computed: {
        generarSLug : function(){
            var char= {
                "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;
            this.slug =  this.nombre.trim().replace(expr, (e) => char[e] ).toLowerCase()
            return this.slug;
        }
    },
    methods: {
        getCategory() {
            let url = `/api/category/${this.slug}`;
            axios.get(url).then(response => {
                this.div_mensajeslug = response.data;
                this.settings = {
                    clase_slug: this.div_mensajeslug==="Slug Disponible" ? 
                            'badge badge-success': 
                            'badge badge-danger',
                    deshabilitar_boton: !(this.div_mensajeslug==="Slug Disponible"),
                    mostrar_mensaje: true
                }
            })
        }
    }
})
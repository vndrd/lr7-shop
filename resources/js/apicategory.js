var apicategory = new Vue({
    el: '#apicategory',
    data: {
        nombre: 'Nombre',
        slug: '',
        descripcion: '',
        settings : {
            clase_slug: 'badge badge-danger',
            mensaje_slug: 'Slug Existe',
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
            axios.get(url).then(({data}) => {
                this.settings = {
                    mensaje_slug: data,
                    clase_slug: data ==='Slug Disponible' ? 
                            'badge badge-success': 
                            'badge badge-danger',
                    deshabilitar_boton: !(data ==='Slug Disponible'),
                    mostrar_mensaje: true
                }
            })
        }
    }
})
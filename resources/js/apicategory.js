var apicategory = new Vue({
    el: '#apicategory',
    data: {
        nombre: '',
        slug: '',
        settings : {
            mostrar_mensaje: false,
            clase_slug: 'badge badge-danger',
            mensaje_slug: 'Slug Existe',
            deshabilitar_boton: true,
        },
    }, 
    mounted(){
        if( document.getElementById('nombretemp') )
            this.nombre = document.getElementById('nombretemp').innerHTML
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
            if( document.getElementById('nombretemp') ){
                let nomtemp = document.getElementById('nombretemp').innerHTML
                if ( nomtemp !== this.nombre){
                    this.buscarCategoria()
                }
            }else {    
                this.buscarCategoria()
            }
        },
        buscarCategoria(){
            let url = `/api/category/${this.slug}`;
            axios.get(url).then(({data}) => {
                this.settings = {
                    mostrar_mensaje: true,
                    mensaje_slug: data,
                    clase_slug: data ==='Slug Disponible' ? 
                            'badge badge-success':
                            'badge badge-danger',
                    deshabilitar_boton: !(data ==='Slug Disponible'),
                }
            })
        }
    }
})
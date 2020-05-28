//asd
var apiproduct = new Vue({
    el: '#apiproduct',
    data: {
        nombre: '',
        slug: '',
        settings : {
            mostrar_mensaje: false,
            clase_slug: 'badge badge-danger',
            mensaje_slug: 'Slug Existe',
            deshabilitar_boton: true,
        },
        porcentajededescuento: 0,
        precioactual: 0,
        precioanterior: 0,
        descuento: 0,
        mensaje_descuento: '',
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
        },
        generardescuento(){
            if(this.porcentajededescuento > 100){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puede ser mayor a 100%',
                })
                this.porcentajededescuento = 100
            }
            if(this.porcentajededescuento < 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puede ser menor a 0%',
                })
                this.porcentajededescuento = 0
            }
            
            if(this.porcentajededescuento > 0){
                this.descuento = (this.precioanterior*this.porcentajededescuento)/100
                this.precioactual = this.precioanterior - this.descuento
                this.mensaje_descuento =  'Hay un descuento de $US ' + this.descuento
            }else {
                this.mensaje_descuento =  ''
                this.precioactual = this.precioanterior
            }
            if(this.porcentajededescuento == 100){
                this.mensaje_descuento = 'Este producto tiene un descuento del 100%, por tanto es gratis'
            }
            return this.mensaje_descuento
        }
    },
    methods: {
        getProduct() {
            if( document.getElementById('nombretemp') ){
                let nomtemp = document.getElementById('nombretemp').innerHTML
                if ( nomtemp !== this.nombre){
                    this.buscarProducto()
                }
            }else {    
                this.buscarProducto()
            }
        },
        buscarProducto(){
            let url = `/api/product/${this.slug}`;
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
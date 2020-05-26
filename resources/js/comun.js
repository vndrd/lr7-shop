
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


/*var app = new Vue({
    el: "#app"
});*/

if(document.getElementById('apicategory')){
    require('./apicategory')
}
if(document.getElementById('confirmareliminar')){
    require('./confirmareliminar')
}

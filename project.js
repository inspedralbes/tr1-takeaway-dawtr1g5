import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from './copManager.js';

createApp({
    data() {
        return {
           productes: [],
           divActual: 'portada',
           search: ''
        };
    },
    async created () {
        getProductes().then(data=>{
            this.productes=data;
        });
    },
   
    methods: {
        mostrar(div) {
            return this.divActual == div;
        },
        cambiarDiv(div) {
            this.divActual = div;
        }
    }
}).mount('#app');
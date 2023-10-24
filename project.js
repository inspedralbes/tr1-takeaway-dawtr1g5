import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from '/copManager.js';

createApp({
    data() {
        return {
           productes: [],
           message: 'ver bambas',
           divActual: 'portada',
           search: ''
           
        };
    },
    computed: {
        filteredProducts(){
            return this.productes.filter((disc) =>
                disc.nombre.toLowerCase().includes(this.search.toLowerCase()) || 
                disc.artista.toLowerCase().includes(this.search.toLowerCase())
            );
        },
    },

    methods: {
        mostrar(div) {
            return this.divActual == div;
        },
        cambiarDiv(div) {
            this.divActual = div;
        }
    },
    async created() {
        // Cargar los datos de las bambas
        this.productes = await getProductes();
    },
}).mount('#app');
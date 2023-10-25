import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from '/copManager.js';

createApp({
    data() {
        return {
            productes: [],
            divActual: 'portada',
            search: '',
            selectedProduct: null
        };
    },
    computed: {
        filteredProducts() {

            return this.productes.productes.filter((disc) =>
                disc.nombre.toLowerCase().includes(this.search.toLowerCase()) ||
                disc.artista.toLowerCase().includes(this.search.toLowerCase()) ||
                disc.genero.toLowerCase().includes(this.search.toLowerCase())
            );
        },
    },

    methods: {
        mostrar(div) {
            return this.divActual == div;
        },
        cambiarDiv(div) {
            this.divActual = div;
        },
        showProductDetails(product) {
            this.selectedProduct = product;
            this.cambiarDiv('compra');
        }
    },
    created() {
        getProductes().then(data => {
            this.productes = data;
            console.log(this.productes)
        })
    },
}).mount('#app');
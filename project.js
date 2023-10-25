import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from './copManager.js';

createApp({
    data() {
        return {
            productes: [],
            divActual: 'tienda',
            search: '',
            productesAddToCart: []

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
        agregarAlCarro(id) {
            this.productesAddToCart = ([...this.productesAddToCart, { ...this.productes[id] }]);
            console.log(this.productesAddToCart);
        },
        addCountMovie(index) {
            this.productes[index].count++;
        },
        substractCountMovie(index) {
            if (this.productes[index].count > 0) {
                this.productes[index].count--;
            }

        }
    },
    created() {
        getProductes().then(data => {
            this.productes = data;
        })
    },
}).mount('#app');
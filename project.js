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
            if (this.productes[id].count >= 1) {
                let elementosRepetidos = this.repeatedProduct(id);
                if (elementosRepetidos.length === 0) {
                    this.productesAddToCart = ([...this.productesAddToCart, { ...this.productes[id] }]);
                } else {
                    let index = this.findByIndex(this.productesAddToCart, id);
                    this.productesAddToCart[index].count += this.productes[id].count;
                }
                this.productes[id].count = 0;
            }
            console.log(this.productesAddToCart);
        },
        addCountMovie(index) {
            this.productes[index].count++;
        },
        substractCountMovie(index) {
            if (this.productes[index].count > 0) {
                this.productes[index].count--;
            }

        },
        findByIndex(array, id) {
            return array.findIndex(product => product.id === this.productes[id].id);
        },
        repeatedProduct(id) {
            return this.productesAddToCart.filter(product => product.id === this.productes[id].id)
        }
    },
    created() {
        getProductes().then(data => {
            this.productes = data;
        })
    },
}).mount('#app');
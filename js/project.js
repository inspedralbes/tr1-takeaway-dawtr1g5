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
        },
        addCountProduct(index) {
            this.productes[index].count++;

        },
        substractCountProduct(index) {
            if (this.productes[index].count > 0) {
                this.productes[index].count--;
            }

        },
        findByIndex(array, id) {
            return array.findIndex(product => product.id === this.productes[id].id);
        },
        repeatedProduct(id) {
            return this.productesAddToCart.filter(product => product.id === this.productes[id].id)
        },
        calcularPriceTotal() {
            let total = 0;
            for (let i = 0; i < this.productesAddToCart.length; i++) {
                total += this.productesAddToCart[i].price * this.productesAddToCart[i].count;
            }
            return total;
        }
    },
    created() {
        getProductes().then(data => {
            this.productes = data;
        });
    }
}).mount('#app');
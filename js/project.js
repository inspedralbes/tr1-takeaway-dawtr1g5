import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from './copManager.js';

createApp({
    data() {
        return {
            productes: [],
            divActual: 'tienda',
            search: '',
            productesAddToCart: [],
            // totalPrice: 0,

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
                this.productes[id].count = 1;
            }
        },
        addCountProduct(array, index) {
            array[index].count++;

        },
        substractCountProduct(array, index) {
            if (array[index].count > 1) {
                array[index].count--;
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
            total = (Math.round(total * 100) / 100).toFixed(2);
            return total;
        },
        calcularPriceProduct(id) {
            let total = 0;
            total = this.productesAddToCart[id].price * this.productesAddToCart[id].count;
            return total;
        },
        deleteProduct(array, index) {
            array.splice(index, 1);
        }
    },
    created() {
        getProductes().then(data => {
            this.productes = data;
        });
    }
}).mount('#app');
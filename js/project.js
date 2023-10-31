import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from './copManager.js';
import { storeTicket } from './copManager.js';
import { getLastTicket } from './copManager.js';
import { getTicket } from './copManager.js';

createApp({
    data() {
        return {
            productes: [],
            productesFiltered: [],
            divActual: 'portada',
            search: '',
            productesAddToCart: [],
            shoppingCartCount: 0,
            totalPrice: 0,
            userName: '',
            userEmail: '',
            activeModal: false,
            inputValue: null,
            ticketInput: '',
            ticket: [],
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
            this.totalPrice = 0;
            for (let i = 0; i < this.productesAddToCart.length; i++) {
                this.totalPrice += this.productesAddToCart[i].price * this.productesAddToCart[i].count;
            }
            this.totalPrice = (Math.round(this.totalPrice * 100) / 100).toFixed(2);
            return this.totalPrice;
        },
        calcularPriceProduct(id) {
            let total = 0;
            total = this.productesAddToCart[id].price * this.productesAddToCart[id].count;
            return total;
        },
        deleteProduct(array, index) {
            array.splice(index, 1);
            if (this.productesAddToCart.length === 0) {
                this.divActual = 'tienda';
            }
        },
        calcularTotalCarrito() {
            let total = 0;
            for (let i = 0; i < this.productesAddToCart.length; i++) {
                total += this.productesAddToCart[i].count;
            }
            return total;
        },
        async checkout() {
            try {
                const data = {
                    precio: this.totalPrice,
                    compra: this.productesAddToCart,
                    userName: this.userName,
                    userEmail: this.userEmail
                };

                const data2 = await storeTicket(data);

                console.log(data2);

                this.productesAddToCart = [];
                this.activarModal();
                this.userName = '';
                this.userEmail = '';

                const lastTicketData = await getLastTicket();
                this.ticket = lastTicketData;

                this.divActual = "checkout";
            } catch (error) {
                console.error('Error:', error);
            }
        },
        activarModal() {
            this.activeModal = !this.activeModal;
        },
        buscarTicket() {
            getTicket(this.ticketInput)
                .then(data => {
                    this.ticket = data;
                })
                .then(() => {
                    this.divActual = 'check-order';
                });
        }
    },
    created() {
        getProductes().then(data => {
            this.productes = data;
        });
    }
}).mount('#app');
import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from './copManager.js';
import { storeTicket } from './copManager.js';
import { getLastTicket } from './copManager.js';
import { getTicket } from './copManager.js';

createApp({
    data() {
        return {
            navegacion: {
                divActual: 'tienda',
                activeModal: false,
                inputValue: null,
            },
            tienda: {
                productes: [],
            },
            carrito: {
                productesAddToCart: [],
                totalPrice: 0,
            },
            usuario: {
                userName: '',
                userEmail: '',
            },
            ticket: {
                ticketInput: '',
                ticket: [],
            }
        };
    },
    methods: {
        mostrar(div) {
            return this.navegacion.divActual == div;
        },
        cambiarDiv(div) {
            this.navegacion.divActual = div;
        },
        findByIndex(array, id) {
            return this.tienda.productes.findIndex(productes => productes.id === array[id].id);
        },
        agregarAlCarro(id) {
            let ogIndex = this.findByIndex(this.filterProducts, id);

            if (this.tienda.productes[ogIndex].count >= 1) {
                let elementosRepetidos = this.repeatedProduct(ogIndex);
                if (elementosRepetidos.length === 0) {
                    this.carrito.productesAddToCart = ([...this.carrito.productesAddToCart, { ...this.tienda.productes[ogIndex] }]);
                } else {
                    let index = this.findByIndex(this.carrito.productesAddToCart, ogIndex);
                    this.carrito.productesAddToCart[index].count += this.tienda.productes[index].count;
                }
                this.tienda.productes[ogIndex].count = 1;
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
        repeatedProduct(id) {
            return this.carrito.productesAddToCart.filter(product => product.id === this.tienda.productes[id].id)
        },
        calcularPriceTotal() {
            this.carrito.totalPrice = 0;
            for (let i = 0; i < this.carrito.productesAddToCart.length; i++) {
                this.carrito.totalPrice += this.carrito.productesAddToCart[i].price * this.carrito.productesAddToCart[i].count;
            }
            this.carrito.totalPrice = (Math.round(this.carrito.totalPrice * 100) / 100).toFixed(2);
            return this.carrito.totalPrice;
        },
        calcularPriceProduct(id) {
            let total = 0;
            total = this.carrito.productesAddToCart[id].price * this.carrito.productesAddToCart[id].count;
            return total;
        },
        deleteProduct(array, index) {
            array.splice(index, 1);
            if (this.carrito.productesAddToCart.length === 0) {
                this.navegacion.divActual = 'tienda';
            }
        },
        calcularTotalCarrito() {
            let total = 0;
            for (let i = 0; i < this.carrito.productesAddToCart.length; i++) {
                total += this.carrito.productesAddToCart[i].count;
            }
            return total;
        },
        async checkout() {
            try {
                const data = {
                    precio: this.carrito.totalPrice,
                    compra: this.carrito.productesAddToCart,
                    userName: this.usuario.userName,
                    userEmail: this.usuario.userEmail
                };

                const data2 = await storeTicket(data);

                console.log(data2);

                this.carrito.productesAddToCart = [];
                this.activarModal();
                this.usuario.userName = '';
                this.usuario.userEmail = '';

                const lastTicketData = await getLastTicket();
                this.ticket.ticket = lastTicketData;

                this.navegacion.divActual = "checkout";
            } catch (error) {
                console.error('Error:', error);
            }
        },
        activarModal() {
            if (this.navegacion.activeModal == false) {
                this.navegacion.activeModal = true;
            } else {
                this.navegacion.activeModal = false;
            }
        },
        buscarTicket() {
            getTicket(this.ticket.ticketInput)
                .then(data => {
                    this.ticket.ticket = data;
                })
                .then(() => {
                    this.navegacion.divActual = 'check-order';
                });
        }
    },
    computed: {
        filterProducts() {
            if (this.navegacion.inputValue == null || this.navegacion.inputValue == '') {
                return this.tienda.productes;
            } else {
                const input = this.navegacion.inputValue.toLowerCase();
                return this.tienda.productes.filter(product =>
                    product.name.toLowerCase().includes(input)
                    || product.artist.toLowerCase().includes(input)
                );
            }
        }
    },
    created() {
        getProductes().then(data => {
            this.tienda.productes = data;
        });
    },
}).mount('#app');
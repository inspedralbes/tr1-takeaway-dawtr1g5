import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from './copManager.js';
import { storeTicket } from './copManager.js';
import { getLastTicket } from './copManager.js';
import { getTicket } from './copManager.js';

createApp({
    data() {
        return {
            navegacion: {
                divActual: 'portada',
                activeModal: false,
                inputValue: null,
            },
            portada: {
                productosRandom: [],
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
                checkOrder_Activo: false,
            }
        };
    },
    created() {
        getProductes()
            .then(data => {
                this.tienda.productes = data;
            })
            .then(() => {
                const randomIndices = [];
                while (randomIndices.length < 10) {
                    const num = Math.floor(Math.random() * this.tienda.productes.length);
                    if (!randomIndices.includes(num)) {
                        randomIndices.push(num);
                    }
                }

                for (const index of randomIndices) {
                    this.portada.productosRandom.push(this.tienda.productes[index]);
                }
            });
    },
    methods: {


        mostrar(div) {
            return this.navegacion.divActual == div;
        },
        cambiarDiv(div) {
            this.navegacion.divActual = div;
        },
        findByID(array, id) {
            if (typeof array[id] !== 'undefined') {
                return this.tienda.productes.findIndex(productes => productes.id === array[id].id);
            } else {
                return -1;
            }
        },
        findByIndex(array, id) {
            return array.findIndex(product => product.id === this.tienda.productes[id].id);
        },
        agregarAlCarro(id) {
            let ogIndex = this.findByID(this.filterProducts, id);

            if (this.tienda.productes[ogIndex].count >= 1) {
                let elementosRepetidos = this.repeatedProduct(ogIndex);
                if (elementosRepetidos.length === 0) {
                    this.carrito.productesAddToCart = ([...this.carrito.productesAddToCart, { ...this.tienda.productes[ogIndex] }]);
                } else {
                    let index = this.findByIndex(this.carrito.productesAddToCart, id);
                    this.carrito.productesAddToCart[index].count++;
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
        startBuscarTicket() {
            this.ticket.checkOrder_Activo = true;
            this.buscarTicket();
            this.fetchInterval = setInterval(this.buscarTicket, 10000);
        },
        buscarTicket() {
            getTicket(this.ticket.ticketInput)
                .then(data => {
                    this.ticket.ticket = data;
                })
                .then(() => {
                    this.navegacion.divActual = 'check-order';
                });
        },
        stopBuscarTicket() {
            this.ticket.checkOrder_Activo = false;
            clearInterval(this.fetchInterval);
        },
    },
    computed: {
        filterProducts() {

            if (this.navegacion.inputValue == null || this.navegacion.inputValue == '') {
                return this.tienda.productes;
            } else {
                const inputs = this.navegacion.inputValue.split(' ').map(input => input.toLowerCase());
                let filteredProducts = this.tienda.productes;
                for (let i = 0; i < inputs.length; i++) {
                    let currentInput = inputs[i];
                    filteredProducts = filteredProducts.filter(product =>
                        product.name.toLowerCase().includes(currentInput)
                        || product.artist.toLowerCase().includes(currentInput)
                    );
                }

                return filteredProducts;
            }
        }
    },
    watch: {
        'navegacion.divActual': function (newDivActual) {
            if (newDivActual !== 'check-order') {
                this.stopBuscarTicket();
            } else if (!this.buscarActivo) {
                this.startBuscarTicket();
            }
        },
    }

}).mount('#app');
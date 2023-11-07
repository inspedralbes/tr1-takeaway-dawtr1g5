import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { productsAdvanced, getGenres, getProductes, getLandingProductes, storeTicket, getLastTicket, getTicket } from './copManager.js';

createApp({
    data() {
        return {
            navegacion: {
                divActual: 'portada',
                activeModal: false,
                inputValue: null,
                currentPage: 1,
                lastPage: '',
                showFiltroAvanzado: false,
            },
            filter: {
                advancedFilter: false,
                maxPrice: null,
                genre: 0,
            },
            portada: {
                productosRandom: [],
            },
            tienda: {
                productes: [],
                allProductes: [],
                divInfoActual: '',
                singleProduct: [],
                genres: [],
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
        getLandingProductes().then(data => {
            this.tienda.allProductes = data;
            const randomIndices = [];
            while (randomIndices.length < 10) {
                const num = Math.floor(Math.random() * data.length);
                if (!randomIndices.includes(num)) {
                    randomIndices.push(num);
                }
            }

            for (const index of randomIndices) {
                this.portada.productosRandom.push(data[index]);
            }
        });

        getGenres().then(data => {
            this.tienda.genres = data;
        })
    },
    mounted() {
    },
    methods: {
        async fetchData(page) {
            await getProductes(page).then(data => {
                this.tienda.productes.push(...data.data);
                this.navegacion.currentPage = data.current_page;
                this.navegacion.lastPage = data.last_page;
            });

        },
        fetchNextPage() {
            if (this.navegacion.currentPage < this.navegacion.lastPage) {
                const nextPage = this.navegacion.currentPage + 1;
                this.fetchData(nextPage);
            }
        },
        mostrar(div) {
            return this.navegacion.divActual == div;
        },
        cambiarDiv(div) {
            this.navegacion.divActual = div;
        },
        mostrarInfo(div) {
            if (this.tienda.divInfoActual === div) {
                this.tienda.divInfoActual = '';
            } else {
                this.tienda.divInfoActual = div;
            }
        },
        findByIndex(array, id) {
            return array.findIndex(product => product.id === this.tienda.allProductes[id].id);
        },
        findPositionById(id) {
            for (let i = 0; i < this.tienda.allProductes.length; i++) {
                if (this.tienda.allProductes[i].id === id) {
                    return i;
                }
            }
            return -1;
        },
        esRepetido(id) {
            return this.carrito.productesAddToCart.some(elemento => elemento.id === id);
        },
        agregarAlCarro(id) {
            let ogIndex = this.findPositionById(id);
            if (this.tienda.allProductes[ogIndex].count >= 1) {
                let elementosRepetidos = this.repeatedProduct(ogIndex);
                if (elementosRepetidos.length === 0) {
                    this.carrito.productesAddToCart = ([...this.carrito.productesAddToCart, { ...this.tienda.allProductes[ogIndex] }]);
                } else {
                    let index = this.findByIndex(this.carrito.productesAddToCart, ogIndex);
                    this.carrito.productesAddToCart[index].count++;
                }
                this.tienda.allProductes[ogIndex].count = 1;
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
            return this.carrito.productesAddToCart.filter(product => product.id === this.tienda.allProductes[id].id)
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
            total = total.toFixed(2);
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
                    // precio: this.carrito.totalPrice,
                    compra: this.carrito.productesAddToCart,
                    userName: this.usuario.userName,
                    userEmail: this.usuario.userEmail
                };

                const data2 = await storeTicket(data);

                // console.log(data2);

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
        botonProducte(id) {
            let index = this.findPositionById(id);
            this.tienda.singleProduct = this.tienda.allProductes[index];

            this.navegacion.divActual = 'producte';
        },
        splitTracklist(tracklist) {
            return tracklist.split('\r\n').map(track => {
                const parts = track.split('. ');
                if (parts.length === 2) {
                    const trackNumber = parts[0];
                    const trackInfo = parts[1];
                    return `${trackNumber}. ${trackInfo}`;
                }
                return track;
            });
        },
        formatDuration(duracion) {
            const horas = Math.floor(duracion / 60);
            const minutos = duracion % 60;

            if (horas > 0) {
                if (horas == 2) {
                    return `${horas} horas ${minutos} minutos`;
                } else {
                    return `${horas} hora ${minutos} minutos`;
                }
            } else {
                return `${minutos} minutos`;
            }
        },
        mostrarFiltroAvanzado() {
            if (this.navegacion.showFiltroAvanzado) {
                this.navegacion.showFiltroAvanzado = false;
            } else {
                this.navegacion.showFiltroAvanzado = true;
            }
        },
        clearFilter() {
            this.filter.genre = 0;
            this.filter.maxPrice = null;
            this.filter.advancedFilter = false;
            this.tienda.productes = [];
            this.mostrarFiltroAvanzado();
        },
    },
    computed: {
        filterProducts() {
            if (!this.filter.advancedFilter) {
                if (this.navegacion.inputValue == null || this.navegacion.inputValue == '') {
                    this.fetchData(1);
                    return this.tienda.productes;
                } else {
                    let filteredProducts = [];
                    filteredProducts = this.tienda.allProductes;
                    const inputs = this.navegacion.inputValue.split(' ').map(input => input.toLowerCase());
                    for (let i = 0; i < inputs.length; i++) {
                        let currentInput = inputs[i];
                        filteredProducts = filteredProducts.filter(product =>
                            product.name.toLowerCase().includes(currentInput)
                            || product.artist.toLowerCase().includes(currentInput)
                        );
                    }
                    return filteredProducts;
                }
            } else {
                if (this.navegacion.inputValue == null || this.navegacion.inputValue == '') {
                    return this.tienda.productes;
                } else {
                    let filteredProducts = [];
                    filteredProducts = this.tienda.productes;
                    const inputs = this.navegacion.inputValue.split(' ').map(input => input.toLowerCase());
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
        showLoadButton() {
            return !this.filter.advancedFilter && (this.navegacion.inputValue === null || this.navegacion.inputValue === '') && this.navegacion.currentPage != this.navegacion.lastPage;
        },
        fetchWithFilter() {
            this.filter.advancedFilter = true;
            const data = {
                genre: this.filter.genre,
                maxPrice: this.filter.maxPrice,
            };
            productsAdvanced(data).then(response => {
                this.tienda.productes = response;
            });
        },
    },
    watch: {
        'navegacion.divActual': function (newDivActual) {
            if (newDivActual !== 'check-order') {
                this.stopBuscarTicket();
            } else if (!this.buscarActivo) {
                this.startBuscarTicket();
            }
        },
        'filter.genre': function (newGenre) {
            if (newGenre != 0) {
                this.fetchWithFilter;
            }
        },
        // 'filter.maxPrice': function (newPrice) {
        //     if (newPrice != null) {
        //         this.fetchWithFilter;
        //     }
        // }
    }

}).mount('#app');
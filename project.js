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
        agregarAlCarro(id){
            //const productAddtoCart = this.productes.find
        //    console.log(this.productes[id]);

           this.productesAddToCart = [...this.productesAddToCart, {...this.productes[id]}];
            console.log(this.productesAddToCart);
            
           
        }
    },
    created() {
        // Cargar los datos de las bambas
        getProductes().then(data => {
            this.productes = data;
            // console.log(this.productes)
        })
    },
}).mount('#app');
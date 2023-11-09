import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { productsAdvanced, getGenres, getProductes, getLandingProductes, storeTicket, getLastTicket, getTicket } from './copManager.js';
import { registerUser, loginUser, logoutUser, getMyTickets } from './copManager.js';

createApp({
  data() {
    return {
      navegacion: {
        divActual: "portada",
        activeModal: false,
        inputValue: null,
        currentPage: 1,
        lastPage: "",
        showFiltroAvanzado: false,
        modalProfileLogin: "",
      },
      filter: {
        advancedFilter: false,
        minPrice: 0,
        maxPrice: 100,
        genre: 0,
      },
      portada: {
        productosRandom: [],
      },
      tienda: {
        productes: [],
        allProductes: [],
        divInfoActual: "",
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
        password: '',
        password_confirmation: '',
        messageError: null,
        usuarioAutenticado: false,
        usuarioRegistrado: false,
        myTickets: [],
      },
      ticket: {
        ticketInput: "",
        ticket: [],
        checkOrder_Activo: false,
        angulo: 0,
        duracionTransicion: 500,
        paso: 5,
        color: '#ff0800',
        error: '',
      }
    };
  },
  created() {
    /*
      INFO: llamada a fetch del array completo de elementos y de elementos random para la landing
    */
    getLandingProductes().then((data) => {
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

    /*
      INFO: fetch de los generos para el filtro
    */
    getGenres().then((data) => {
      this.tienda.genres = data;
    });

    /*
      INFO: fetch de la primera pagina
    */
    this.fetchData(1);

    /* 
    Recojo el tocken y compruebo si existe sesion
    */
    const token = localStorage.getItem('token');
    const user_name = localStorage.getItem('user_name');
    const user_email = localStorage.getItem('user_email');

    if (token) {
      this.usuario.usuarioRegistrado = true;
      this.getAllMyTickets();
    }

    if (user_name) {
      this.usuario.userName = user_name;
    }

    if (user_email) {
      this.usuario.userEmail = user_email;
    }

  },
  methods: {
    /*
    INFO: es una funcio que serveix per mostrar els productes paginats 
    PARAMS: 
      - page: es la pagina actual, en la que demanem la petició
    */
    async fetchData(page) {
      await getProductes(page).then((data) => {
        this.tienda.productes.push(...data.data);
        this.navegacion.currentPage = data.current_page;
        this.navegacion.lastPage = data.last_page;
      });
    },

    /*
    INFO: en la pagina es mostren 10 productes, aquesta funcio serveix per quan donas al boto, mostra els 10 seguents.
    */
    fetchNextPage() {
      if (this.navegacion.currentPage < this.navegacion.lastPage) {
        const nextPage = this.navegacion.currentPage + 1;
        this.fetchData(nextPage);
      }
    },

    /*
    INFO: Aquesta funcio serveic per mostrar el div.
    PARAMS: 
      - div: es el div que volem mostrar
    */
    mostrar(div) {
      return this.navegacion.divActual == div;
    },

    /*
    INFO: Aquesta funcio serveix per cambiar de Div.
    PARAMS: 
      - div: es el div al que volem cambiar
    */
    cambiarDiv(div) {
      this.navegacion.divActual = div;
    },

    /*
    INFO: Aquesta funcio serveix per mostrar l'informacio del div
    PARAMS: 
      - div: div que volem mostrar l'informació
    */
    mostrarInfo(div) {
      if (this.tienda.divInfoActual === div) {
        this.tienda.divInfoActual = "";
      } else {
        this.tienda.divInfoActual = div;
      }
    },

    /* 
    INFO: Aquesta funció troba l'índex d'un element en un array basat en el vostre ID.
    PARAMS: 
      - array: es on hem de buscar. 
      - id: el identificador a buscar
    */
    findByIndex(array, id) {
      return array.findIndex(
        (product) => product.id === this.tienda.allProductes[id].id
      );
    },

    /*
    INFO: troba la posicio id dintre de la tenda de productes
    PARAMS: 
      - id: identificador a buscar
    */
    findPositionById(id) {
      for (let i = 0; i < this.tienda.allProductes.length; i++) {
        if (this.tienda.allProductes[i].id === id) {
          return i;
        }
      }
      return -1;
    },

    /*
    INFO: Verifica si un producte ja ha sigut afegit al carro
    PARAMS: 
      - id: identificador del producte a verificar
    */
    esRepetido(id) {
      return this.carrito.productesAddToCart.some(
        (elemento) => elemento.id === id
      );
    },

    /*
    INFO: Afegeix un producte al carro, gestiona quantitat i verifica si esta ya al carro
    PARAMS: 
      - id: es el identificador del producte a afegir al carro
    */
    agregarAlCarro(id) {
      let ogIndex = this.findPositionById(id);
      if (this.tienda.allProductes[ogIndex].count >= 1) {
        let elementosRepetidos = this.repeatedProduct(ogIndex);
        if (elementosRepetidos.length === 0) {
          this.carrito.productesAddToCart = [
            ...this.carrito.productesAddToCart,
            { ...this.tienda.allProductes[ogIndex] },
          ];
        } else {
          let index = this.findByIndex(
            this.carrito.productesAddToCart,
            ogIndex
          );
          this.carrito.productesAddToCart[index].count++;
        }
        this.tienda.allProductes[ogIndex].count = 1;
      }
    },

    /*
    INFO: Augmenta la quantitat de un producte a la array
    PARAMS: 
      - array, es el array on conte el producte
      - index, el index del producte en l'array 
    */
    addCountProduct(array, index) {
      array[index].count++;
    },

    /*
    INFO: Redueix la quantitat d'un producte en l'array, si es menor a 1
    PARAMS: 
      - array: es el array on conte el producte
      - index: index del producte en l'array
    */
    substractCountProduct(array, index) {
      if (array[index].count > 1) {
        array[index].count--;
      }
    },

    /*
    INFO: Troba productes repetits en el carro amb la mateixa id
    PARAMS: 
      - id: es el identificador de producte a verificar
    */
    repeatedProduct(id) {
      return this.carrito.productesAddToCart.filter(
        (product) => product.id === this.tienda.allProductes[id].id
      );
    },

    /*
    INFO: Calcular el preu total de tots els productes en el carro
    */
    calcularPriceTotal() {
      this.carrito.totalPrice = 0;
      for (let i = 0; i < this.carrito.productesAddToCart.length; i++) {
        this.carrito.totalPrice +=
          this.carrito.productesAddToCart[i].price *
          this.carrito.productesAddToCart[i].count;
      }
      this.carrito.totalPrice = (
        Math.round(this.carrito.totalPrice * 100) / 100
      ).toFixed(2);
      return this.carrito.totalPrice;
    },

    /*
    INFO: Calcula el preu total de un producte basat en el seu identificador
    PARAMS: 
      - id: identificador del producte el qual es calcula el preu
    */
    calcularPriceProduct(id) {
      let total = 0;
      total =
        this.carrito.productesAddToCart[id].price *
        this.carrito.productesAddToCart[id].count;
      total = total.toFixed(2);
      return total;
    },

    /*
    INFO: Elimina un producte de l'array
    PARAMS: 
      - array: array que conte el producte a eliminar
      - index: el index del producte en l'array 
    */
    deleteProduct(array, index) {
      array.splice(index, 1);
      if (this.carrito.productesAddToCart.length === 0) {
        this.navegacion.divActual = "tienda";
      }
    },

    /*
    INFO: Calcula el nombre total de productes en el carro
    */
    calcularTotalCarrito() {
      let total = 0;
      for (let i = 0; i < this.carrito.productesAddToCart.length; i++) {
        total += this.carrito.productesAddToCart[i].count;
      }
      return total;
    },

    /*
    INFO: Realitza una operacio de pagament, introdueixes nom i correu per fer la compra
    */
    checkout() {
      if (
        this.usuario.userEmail &&
        document.getElementById("user_email").checkValidity()
      ) {
        const data = {
          compra: this.carrito.productesAddToCart,
          userName: this.usuario.userName,
          userEmail: this.usuario.userEmail,
        };

        this.activarModal();
        this.navegacion.divActual = "loader-ticket";

        storeTicket(data)
          .then(() => {
            this.goToCheckout();
          })
          .catch((error) => {
            console.error("Error al almacenar el ticket:", error);
          });
      } else {
        document.getElementById("email-error-message").textContent =
          "Correo no válido";
      }
    },

    goToCheckout() {
      getLastTicket()
        .then((lastTicketData) => {
          this.ticket.ticket = lastTicketData;
        })
        .catch((error) => {
          console.error("Error al obtener el último ticket:", error);
        })
        .finally(() => {
          this.carrito.productesAddToCart = [];
          this.usuario.userName = "";
          this.usuario.userEmail = "";
          this.navegacion.divActual = "checkout";
        });
    },

    /*
    INFO: Activa un modal, o el desactiva
    */
    activarModal() {
      if (this.navegacion.activeModal == false) {
        this.navegacion.activeModal = true;
      } else {
        this.navegacion.activeModal = false;
      }
    },
    activaModalLogin(type) {
      switch (type) {
        case 0:
          this.navegacion.modalProfileLogin = "";
          break;
        case 1:
          this.navegacion.modalProfileLogin = "login";
          break;
        case 2:
          this.navegacion.modalProfileLogin = "register";
          break;
      }
    },
    async register() {
      try {
        if (this.usuario.password !== this.usuario.password_confirmation) {
          console.log('La contraseña y la confirmación de contraseña no coinciden.');
          this.usuario.messageError = 'Credencials incorrectes!';
          return;
        }
        this.usuario.messageError = null;

        const data = {
          name: this.usuario.userName,
          email: this.usuario.userEmail,
          password: this.usuario.password,
          password_confirmation: this.usuario.password_confirmation,
        };

        const response = await registerUser(data);

        if (response.status === 409) {
          this.usuario.messageError = 'El usuario ya está registrado.';
        } else {

          this.usuarioAutenticado = true;

          setTimeout(() => {
            this.activaModalLogin(0);

          }, 100);
        }
      } catch (error) {
        console.error("Error:", error);
      }
    },
    async login() {
      try {
        const data = {
          email: this.usuario.userEmail,
          password: this.usuario.password,
        };
        const response = await loginUser(data);

        if (response.token && response.user) {
          this.usuario.messageError = null;
          localStorage.setItem('token', response.token);
          localStorage.setItem('user_name', response.user.name);
          localStorage.setItem('user_email', response.user.email);

          this.getAllMyTickets();

          this.usuario.userEmail = response.user.email;
          this.usuario.userName = response.user.name;
          this.usuario.usuarioRegistrado = true;

          setTimeout(() => {
            this.activaModalLogin(0);
          }, 100);

        } else {
          this.usuario.messageError = 'Credencials incorrectes!';
        }

      } catch (error) {
        console.error("Error:", error);
      }
    },
    async logout() {
      try {
        const response = await logoutUser();
        localStorage.clear();
        this.usuario.usuarioRegistrado = false;
        this.usuario.myTickets = [];
        this.usuario.userName = '';
        this.usuario.userEmail = '';
        this.navegacion.divActual = 'portada';
      } catch (error) {
        console.error("Error:", error);
      }
    },
    goToProfile() {
      this.navegacion.divActual = "profile";
    },
    getAllMyTickets() {
      getMyTickets().then((data) => {
        this.usuario.myTickets = data;
      });
    },

    /*
    INFO: Comença el fetch cada X segons per actualitzar l'estat de la comanda
    */
    startBuscarTicket() {
      this.ticket.checkOrder_Activo = true;
      this.buscarTicket();
      this.fetchInterval = setInterval(this.buscarTicket, 10000);
    },
    /*
    INFO: BUsca l'informació d'un ticket, i mostra els detalls del ticket
    */
    buscarTicket() {
      getTicket(this.ticket.ticketInput)
        .then((data) => {
          if (data.length > 0) {
            this.ticket.ticket = data[0];
          } else {
            throw new Error(data.error);
          }
        })
        .then(() => {
          let estat = this.ticket.ticket.estat;
          if (estat === "Pendent de preparar") {
            this.ticket.targetAngulo = 0;
            this.ticket.color = "#ff0800";
          } else if (estat === "En preparació") {
            this.ticket.targetAngulo = 135;
            this.ticket.color = "#ffae00";
          } else if (estat === "Preparat per recollir") {
            this.ticket.targetAngulo = 270;
            this.ticket.color = "#00ff6a";
          }

          this.transicionAngulo();
          this.navegacion.divActual = "check-order";
        })
        .catch((error) => {
          this.ticket.ticketInput = '';
          this.ticket.error = error.message;

          setTimeout(() => {
            this.ticket.error = '';
          }, 6000);
        });
    },

    /*
    INFO: Deteneix la busqueda d'un ticket i neteja l'interval de busqueda
    */
    stopBuscarTicket() {
      this.ticket.checkOrder_Activo = false;
      this.ticket.ticketInput = '';
      clearInterval(this.fetchInterval);
    },
    /*
    INFO: Fa que en la pagina d'estat de comandes, quan cambia l'estat de la comanda,  l'angle de l'imatge cambia
    */
    transicionAngulo() {
      const totalPasos = Math.ceil(
        this.ticket.duracionTransicion / this.ticket.paso
      );
      const pasoAngulo =
        (this.ticket.targetAngulo - this.ticket.angulo) / totalPasos;

      let pasoActual = 0;

      const temporizador = setInterval(() => {
        this.ticket.angulo += pasoAngulo;
        pasoActual++;

        if (pasoActual >= totalPasos) {
          clearInterval(temporizador);
          this.ticket.angulo = this.ticket.targetAngulo;
        }
      }, this.ticket.paso);
    },

    /*
    INFO:  Quan cliques sobre el boto, podras veure els detalls d'un producte
    PARAMS: 
      - id: es identificador del producte que volem veure
    */
    botonProducte(id) {
      let index = this.findPositionById(id);
      this.tienda.singleProduct = this.tienda.allProductes[index];

      this.navegacion.divActual = "producte";
    },

    /*
    INFO: Divideix una llista de pistes en un format especific, i la formateja
    PARAMS: 
      - tracklist: la llista de pistes que es va a dividir i formatejar
    */
    splitTracklist(tracklist) {
      return tracklist.split("\r\n").map((track) => {
        const parts = track.split(". ");
        if (parts.length === 2) {
          const trackNumber = parts[0];
          const trackInfo = parts[1];
          return `${trackNumber}. ${trackInfo}`;
        }
        return track;
      });
    },

    /*
    INFO: serviex per que la comanda quan cambia d'estat es mou cap al seguent estat
    PARAMS: 
      - duracion: es la animacio de la comanda
    */
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

    /*
    INFO: serveix per mostrar el filtre avançat
    */
    mostrarFiltroAvanzado() {
      if (this.navegacion.showFiltroAvanzado) {
        this.navegacion.showFiltroAvanzado = false;
      } else {
        this.navegacion.showFiltroAvanzado = true;
      }
    },

    /*
    INFO: serveix per natejar el filtre avançat
    */
    clearFilter() {
      this.filter.genre = 0;
      this.filter.minPrice = 0;
      this.filter.maxPrice = 100;
      this.filter.advancedFilter = false;
      this.tienda.productes = [];
      this.fetchData(1);
      this.mostrarFiltroAvanzado();
    },

  },
  computed: {

    /*
    INFO: serveix per filtrar els productes, utilitza el filtre avaçat.
    */
    filterProducts() {
      if (!this.filter.advancedFilter) {
        if (
          this.navegacion.inputValue == null ||
          this.navegacion.inputValue == ""
        ) {
          // this.fetchData(1);
          return this.tienda.productes;
        } else {
          let filteredProducts = [];
          filteredProducts = this.tienda.allProductes;
          const inputs = this.navegacion.inputValue
            .split(" ")
            .map((input) => input.toLowerCase());
          for (let i = 0; i < inputs.length; i++) {
            let currentInput = inputs[i];
            filteredProducts = filteredProducts.filter(
              (product) =>
                product.name.toLowerCase().includes(currentInput) ||
                product.artist.toLowerCase().includes(currentInput)
            );
          }
          return filteredProducts;
        }
      } else {
        if (
          this.navegacion.inputValue == null ||
          this.navegacion.inputValue == ""
        ) {
          return this.tienda.productes;
        } else {
          let filteredProducts = [];
          filteredProducts = this.tienda.productes;
          const inputs = this.navegacion.inputValue
            .split(" ")
            .map((input) => input.toLowerCase());
          for (let i = 0; i < inputs.length; i++) {
            let currentInput = inputs[i];
            filteredProducts = filteredProducts.filter(
              (product) =>
                product.name.toLowerCase().includes(currentInput) ||
                product.artist.toLowerCase().includes(currentInput)
            );
          }
          return filteredProducts;
        }
      }
    },

    /*
    INFO: funcio per determinar si es mostra el boto de "mostrar mes productes"
    */
    showLoadButton() {
      return (
        !this.filter.advancedFilter &&
        (this.navegacion.inputValue === null ||
          this.navegacion.inputValue === "") &&
        this.navegacion.currentPage != this.navegacion.lastPage &&
        this.tienda.productes.length != 0
      );
    },

    /*
    INFO: fa fetch depenent dels filtres avançats
    */
    fetchWithFilter() {
      this.filter.advancedFilter = true;
      const data = {
        genre: this.filter.genre,
        minPrice: this.filter.minPrice,
        maxPrice: this.filter.maxPrice,
      };
      productsAdvanced(data).then((response) => {
        this.tienda.productes = response;
      });
    },

  },
  watch: {
    "navegacion.divActual": function (newDivActual) {
      if (newDivActual !== "check-order") {
        this.stopBuscarTicket();
      } else {
        this.startBuscarTicket();
      }
    },
    "filter.genre": function (newGenre) {
      if (newGenre != 0) {
        this.fetchWithFilter;
      }
    },
    "filter.maxPrice": function (newPrice) {
      if (newPrice != 100) {
        this.fetchWithFilter;
      }
    },
    "filter.minPrice": function (newPrice) {
      if (newPrice != 0) {
        this.fetchWithFilter;
      }
    },
  },
}).mount("#app");
// hola
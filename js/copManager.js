const url = "http://localhost:8000/api/";
// const url = 'http://192.168.0.131:8000/api/';

/*
INFO: Realitza una solicitud per obtenir productes per la pagina d'inici
*/

export async function getLandingProductes() {
  const response = await fetch(url + "index");
  const data = await response.json();
  return data;
}

/*
INFO: Realitza una solicitud per obtindre profuctes per a una pagina especifica
PARAMS: page, el numero de la pagina en la que volem obtindre els productes
*/

export async function getProductes(page) {
  const response = await fetch(`${url}index_pg?page=${page}`);
  const data = await response.json();
  return data;
}

/*
INFO: Envia dades per almacenar un ticket de compra en el servidor
PARAMS: data, es un objecte que conte dades relacionades amb la compra i l'usuari
*/

export function storeTicket(data) {
  return fetch(url + "ticket", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  }).then((response) => response.json());
}

/*
INFO: Realiztza una solicitud per demanar l'ultim tiquet de compra en el servidor
*/

export async function getLastTicket() {
  const response = await fetch(url + "ticketLast");
  const data = await response.json();
  return data;
}

/*
INFO: Realitza una solicitud per obtindre d'etalls d'un ticket demanat
PARAMS: index, el index del tiquet que volem obtenir
*/

export async function getTicket(index) {
  const response = await fetch(`${url}ticket/${index}`);
  const data = await response.json();
  return data;
}

/*
INFO: Realitza una solicitud per demanar els generes dels productes
*/

export async function getGenres() {
  const response = await fetch(`${url}genres`);
  const data = await response.json();
  return data;
}

/*
INFO: Realitza una solicitud de busqueda avançada de productes basada en certs criteris
PARAMS: data, es un objecte que conte els criteris de busqueda avançada
*/

export async function productsAdvanced(data) {
  return fetch(`${url}index_adv`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  }).then((response) => response.json());
}

const url = 'http://localhost:8000/api/';
// const url = 'http://192.168.0.131:8000/api/';

export async function getLandingProductes() {
    const response = await fetch(url + 'index');
    const data = await response.json();
    return data;
}

export async function getProductes(page) {
    const response = await fetch(`${url}index_pg?page=${page}`);
    const data = await response.json();
    return data;
}

export function storeTicket(data) {
    return fetch(url + 'ticket', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
}

export async function getLastTicket() {
    const response = await fetch(url + 'ticketLast');
    const data = await response.json();
    return data;
}

export async function getTicket(index) {
    const response = await fetch(url + 'ticket/' + index);
    const data = await response.json();
    return data;
}

export async function getGenres() {
    const response = await fetch(`${url}genres`);
    const data = await response.json();
    return data;
}

export async function productsAdvanced(data) {
    return fetch(`${url}index_adv`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
}

const url = 'http://localhost:8000/api';

export async function getProductes() {
    const response = await fetch(url + '/index');
    const data = await response.json();
    return data;
}

export function storeTicket(data) {
    return fetch(url + '/ticket', {
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
    const response = await fetch(url + '/ticket/' + index);
    const data = await response.json();
    return data;
}
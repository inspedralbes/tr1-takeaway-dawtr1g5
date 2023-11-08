const url = 'http://localhost:8000/api/';
// const url = 'http://192.168.0.131:8000/api/';
import axios from 'axios'

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
    return data[0];
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

axios.post(url + '/register', data)
    .then(
        res => {
            console.log(res)
        }
    ).catch(
        err => {
            console.log(err);
        }
    )



export async function authenticationRegister(data) {
    try {
        const response = await fetch('/register', {
            method: 'POST',
            headers: {
                'Content Type': 'application/json',
            },

            body: JSON.stringify(data),
        });

        if (response.ok) {
            const responseData = await response.json();

            console.log('Register complete!:', responseData);
        } else {
            console.error('Error en el registre: ', response.statusText);
        }
    } catch (error) {
        console.error('Error en la solicitud: ', error);
    }
}

export async function authenticationLogin(data) {
    try {
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content Type': 'application/json',
            },

            body: JSON.stringify(data),
        });

        if (response.ok) {
            const responseData = await response.json();

            const token = responseData.token;
            localStorage.setItem('token', token);

            console.log('Login success!:', responseData);
        } else {
            console.error('Error en el inicio de sessión: ', response.statusText);
        }
    } catch (error) {
        console.error('Error en la solicitud: ', error);
    }
}

export async function authenticationLogout() {
    try {
        const response = await fetch('/logout', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer' + localStorage.getItem('token'),
            },
        });

        if (response.ok) {
            localStorage.removeItem('token');
            console.log('Loged out!');
        } else {
            console.error('Error al cerrar sessión: ', response.statusText);
        }
    } catch (error) {
        console.error('Error en la solicitud: ', error);
    }
}

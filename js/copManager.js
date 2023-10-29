export async function getProductes() {
    const response = await fetch('http://localhost:8000/api/index');
    const data = await response.json();
    return data;
}

export function storeTicket(data) {
    return fetch('http://localhost:8000/api/ticket', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
}
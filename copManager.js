export async function getProductes() {
    const response = await fetch('http://localhost:8000/api/index');
    const data = await response.json();
    return data;
}
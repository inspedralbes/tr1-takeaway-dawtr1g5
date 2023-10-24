export async function getProductes(){
    const response = await fetch('localhost:8000/api/index');
    const data = await response.json();
    return data;
}
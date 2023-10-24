export async function getBambas(){
    const response = await fetch('productes.json');
    const data = await response.json();
    return data;
}
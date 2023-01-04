//Datos
const dona = {
    usuario: "",
    aleatorio: 1,
    rotacion: "NINGUNA",
    movimiento: "NINGUNO",
    color_dona: "000000",
    color_fondo: "000000",
    opacidad: 1,
};

//Mandar datos
async function actualizarDatos() {
    const url = "/figuras/donas/actualizar";

    //Enviamos
    await fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(dona),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Éxito al actualizar dona");
            console.log(data);
        })
        .catch((err) => {
            console.error("Error al actualizar dona:");
            console.log(err);
        });
}
//Poner valores
async function ponerValores(i) {
    dona.aleatorio = datos_dona_aleatoria[i].checked ? 1 : 0;
    dona.usuario = datos_nombres[i].textContent.replace(" ", "");
    dona.rotacion = datos_rotacion[i].value;
    dona.movimiento = datos_movimiento[i].value;
    dona.color_dona = datos_color_dona[i].value.replace("#", "").toUpperCase();
    dona.color_fondo = datos_color_fondo[i].value
        .replace("#", "")
        .toUpperCase();
    dona.opacidad = parseFloat(datos_opacidad[i].value) / 100;
    await actualizarDatos();
}

//Obtenemos datos
const datos_dona_aleatoria = document.querySelectorAll(".datos-dona-aleatoria");
const datos_nombres = document.querySelectorAll(".datos-nombres");
const datos_rotacion = document.querySelectorAll(".datos-dona-rotacion");
const datos_movimiento = document.querySelectorAll(".datos-dona-movimiento");
const datos_color_dona = document.querySelectorAll(".datos-color_dona");
const datos_color_fondo = document.querySelectorAll(".datos-color_fondo");
const datos_opacidad = document.querySelectorAll(".datos-opacidad");

//Eventos del check
datos_dona_aleatoria.forEach((d, i) => {
    d.addEventListener("change", () => ponerValores(i));
});

//Eventos de los select
datos_rotacion.forEach((d, i) => {
    d.addEventListener("change", () => ponerValores(i));
});

//Eventos de los select
datos_movimiento.forEach((d, i) => {
    d.addEventListener("change", () => ponerValores(i));
});

//Eventos de los select
datos_color_dona.forEach((d, i) => {
    d.addEventListener("change", () => ponerValores(i));
});

//Eventos de los select
datos_color_fondo.forEach((d, i) => {
    d.addEventListener("change", () => ponerValores(i));
});

//Eventos de los select
datos_opacidad.forEach((d, i) => {
    d.addEventListener("change", () => ponerValores(i));
});

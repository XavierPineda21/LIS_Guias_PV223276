document.addEventListener("DOMContentLoaded", function () {
    let checkbox = document.getElementById("hextrasi");
    let numHorasEx = document.getElementById("numhorasex");
    let pagoHextra = document.getElementById("pagohextra");

    checkbox.addEventListener("change", function () {
        if (this.checked) {
            numHorasEx.removeAttribute("disabled");
            pagoHextra.removeAttribute("disabled");
        } else {
            numHorasEx.setAttribute("disabled", "true");
            pagoHextra.setAttribute("disabled", "true");
            numHorasEx.value = "";
            pagoHextra.value = "";
        }
    });
});
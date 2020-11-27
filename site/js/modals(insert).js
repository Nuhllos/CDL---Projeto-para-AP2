let modal = document.getElementById("insertModal");
let span = document.getElementsByClassName("close2")[0];

let modalCaller = () =>
    modal.style.display = "block";

modalCaller();

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
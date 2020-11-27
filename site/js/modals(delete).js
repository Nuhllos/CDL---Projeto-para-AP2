let modal = document.getElementById("deleteModal");
let span = document.getElementsByClassName("close1")[0];

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
const form = document.querySelector("form"),
    statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e) => {
    e.preventDefault();
    statusTxt.style.display = "block";
    statusTxt.style.color = "#28cca6";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'message.php', true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let response = xhr.response;
            if (response.indexOf("Mail et message requis!") != -1 || response.indexOf("Mail et mot de passe requis!") || response.indexOf("Désolé, l'envoi de votre message à échoué..")) {
                statusTxt.style.color = "red"
            }
            statusTxt.innerHTML = response;
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
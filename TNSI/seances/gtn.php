<style><?php echo file_get_contents('https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/css/gtn.css'); ?></style>
<div class='body'>
    <h1>Devine mon Nombre</h1>
    <div class="chatbox" id="chatbox"></div>
    <input type="text" id="nombre" placeholder="Votre nombre">
    <button class='button' onclick="envoyer()">Envoyer</button>
    <button class='button' onclick="arreter()">Arrêter</button>
    <div style='display: none;'><h2 id="attemps"></h2></div>
</div>

<?php
    $url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') 
         . '://' . $_SERVER['HTTP_HOST'] 
         . htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') 
         . '?session=gtn.php.com.br';
?>
<script>
const endpointURL = "<?php echo $url; ?>";
let pp_bot = "";
let pp_user = "";
let nbMessagesAffiches = 0;

function afficherMessages(messages) {
    let chatbox = document.getElementById("chatbox");

    let nouveauxMessages = messages.slice(nbMessagesAffiches); // seulement les nouveaux
    nouveauxMessages.forEach(msg => {
        let div = document.createElement("div");
        div.classList.add("message", msg[0]);
        let avatar = msg[0] === "bot" ? pp_bot : pp_user;
        div.innerHTML = `<img src='${avatar}' class='avatar'> <span>${msg[1]}</span>`;
        chatbox.appendChild(div);
    });

    nbMessagesAffiches = messages.length;
    chatbox.scrollTop = chatbox.scrollHeight;
}

function envoyer() {
    let nombre = document.getElementById("nombre").value.replace(/\s+/g, '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", endpointURL, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            pp_bot = response.pp_bot;
            pp_user = response.pp_user;
            afficherMessages(response.messages);
            document.getElementById("nombre").value = "";
            if (response.tentatives !== undefined) {
                document.getElementById("attemps").innerText = `Nombre de tentatives : ${response.tentatives}`;
            }
            if (response.game_over) {
                document.getElementById("nombre").disabled = true;
            }
        }
    };
    xhr.send("nombre=" + encodeURIComponent(nombre));
}

function arreter() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", endpointURL, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            pp_bot = response.pp_bot;
            pp_user = response.pp_user;
            afficherMessages(response.messages);

            // Désactiver input et bouton envoyer
            document.getElementById("nombre").disabled = true;
            document.querySelector("button[onclick='envoyer()']").disabled = true;
            document.getElementById("nombre").placeholder = "Partie terminée, recharge la page pour rejouer";
        }
    };
    xhr.send("arreter=true");
}

window.addEventListener("load", function () {
    fetch(endpointURL)
        .then(res => res.json())
        .then(data => {
            pp_bot = data.pp_bot;
            pp_user = data.pp_user;
            afficherMessages(data.messages);
        })
        .catch(err => console.error("Erreur JSON :", err));
});

function reset1(event) {
    if (event) event.preventDefault(); // bloque le href=''

    fetch(endpointURL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'reset1=1'
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'reset_done') {
            window.location.reload();  // recharge la page pour prendre en compte la nouvelle session
        } else {
            console.error('Reset failed:', data);
        }
    })
    .catch(err => {
        console.error('Fetch error:', err);
    });
}

document.getElementById("nombre").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        envoyer();
        event.preventDefault(); // empêche le comportement par défaut (souvent soumission du formulaire)
    }
});
</script>

<style><?php echo file_get_contents('https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/css/gtn.css'); ?></style>
<div class='body'>
    <h1>Devine mon Nombre</h1>
    <div class="chatbox" id="chatbox">
        <?php if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = [];
        } ?>
        <?php foreach ($_SESSION['messages'] as $msg) {
            $class = $msg[0] == 'bot' ? 'bot' : 'user';
            $avatar = $msg[0] == 'bot' ? $pp_bot : $pp_user;
            echo "<div class='message $class'><img src='$avatar' class='avatar'> <span>$msg[1]</span></div>";
        } ?>
    </div>
    <input type="text" id="nombre" placeholder="Votre nombre">
    <button onclick="envoyer()">Envoyer</button>
    <button onclick="arreter()">Arrêter</button>
    <?php if (isset($_GET["attemps"]) || isset($_GET["tentatives"])) { ?>
        <h2 id="attemps">Nombre de tentatives : <?php echo $_SESSION['tentatives']; ?></h2>
    <?php } ?>

    <script>
        function envoyer() {
            let nombre = document.getElementById("nombre").value.replace(/\s+/g, '');
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    let messages = response.messages;
                    let tentatives = response.tentatives;
                    let chatbox = document.getElementById("chatbox");
                    chatbox.innerHTML = "";

                    messages.forEach(msg => {
                        let div = document.createElement("div");
                        div.classList.add("message", msg[0]);
                        let avatar = msg[0] === "bot" ? "<?php echo $pp_bot; ?>" : "<?php echo $pp_user; ?>";
                        div.innerHTML = `<img src='${avatar}' class='avatar'> <span>${msg[1]}</span>`;
                        chatbox.appendChild(div);
                    });

                    <?php if (isset($_GET["attemps"]) || isset($_GET["tentatives"])) { ?>
                        document.querySelector("#attemps").innerText = `Nombre de tentatives : ${tentatives}`;
                    <?php } ?>
                    chatbox.scrollTop = chatbox.scrollHeight;
                    document.getElementById("nombre").value = "";

                    if (response.game_over) {
                        document.getElementById("nombre").disabled = true;
                        document.querySelector("button[onclick='envoyer()']").disabled = true;
                        document.querySelector("button[onclick='arreter()']").disabled = true;
                    }
                }
            };
            xhr.send("nombre=" + encodeURIComponent(nombre));
        }
        function arreter() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let messages = JSON.parse(xhr.responseText);
                    let chatbox = document.getElementById("chatbox");
                    chatbox.innerHTML = "";

                    messages.forEach(msg => {
                        let div = document.createElement("div");
                        div.classList.add("message", msg[0]);
                        let avatar = msg[0] === "bot" ? "<?php echo $pp_bot; ?>" : "<?php echo $pp_user; ?>";
                        div.innerHTML = `<img src='${avatar}' class='avatar'> <span>${msg[1]}</span>`;
                        chatbox.appendChild(div);
                    });
                    chatbox.scrollTop = chatbox.scrollHeight;
                }
            };
            xhr.send("arreter=true");
        }
    </script>
    <script>
        document.getElementById("nombre").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                envoyer();
            }
        });
    </script>
</div>
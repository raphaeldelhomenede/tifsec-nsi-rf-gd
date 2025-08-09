<?php
session_start();

$nb_min = 0;
$nb_max = 10**9;
$pp_bot = "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/ChatGPT-Logo.svg/512px-ChatGPT-Logo.svg.png";
$pp_user = "https://i.imgur.com/uCkGBeA.png";
$recompense1 = "https://tifsec-nsi.rf.gd/TNSI/session/ancienne_version_terminale";
$recompense2 = "https://www.youtube-nocookie.com/embed/--UcD80SBXM?autoplay=1&loop=1&playlist=--UcD80SBXM&controls=0&modestbranding=1&mute=1&showinfo=0&vq=hd720&rel=0";
if (!isset($_SESSION['nombre_a_trouver'])) {
    $_SESSION['nombre_a_trouver'] = rand($nb_min, $nb_max);
    $_SESSION['tentatives'] = 0;
    $_SESSION['messages'] = [
        ['bot', "Je pense à un nombre entre ".number_format($nb_min, 0, '.', ' ')." et ".number_format($nb_max, 0, '.', ' ').". Essaye de le deviner ! 🔢"]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['arreter'])) {
    $_SESSION['messages'][] = ['bot', "La partie est terminée. À bientôt ! 👋"];
    $messages = $_SESSION['messages'];
    session_destroy();
    echo json_encode($messages);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $nombre_a_trouver = $_SESSION['nombre_a_trouver']; 

    if ($nombre === "FE!N") {
        $url = "https://zu.ct.ws/" . $nombre;
        $_SESSION['tentatives']++;
        $_SESSION['messages'][] = ['user', "FE!N"];
        $_SESSION['messages'][] = ['bot', "<a href='$url' target='_blank'>$url</a>"];
    } elseif (!ctype_digit($nombre)) {
        $_SESSION['tentatives']++;
        $_SESSION['messages'][] = ['user', "$nombre"];
        $_SESSION['messages'][] = ['bot', "Désolé, $nombre n'est pas un nombre entier valide !"];
    } else {
        $nombre = (int)$nombre;

        if ($nombre < $nb_min || $nombre > $nb_max) {
            $_SESSION['messages'][] = ['bot', "⚠️ Nombre invalide ! Entre $nb_min et $nb_max."];
        } else {
            $_SESSION['tentatives']++;
            $_SESSION['messages'][] = ['user', number_format($nombre, 0, '.', ' ')];
    
            if ($nombre < $_SESSION['nombre_a_trouver']) {
                $_SESSION['messages'][] = ['bot', "Trop petit 📉"];
            } elseif ($nombre > $_SESSION['nombre_a_trouver']) {
                $_SESSION['messages'][] = ['bot', "Trop grand 📈"];
            } else {
                $tentatives = $_SESSION['tentatives'];
    
                if ($tentatives <= 40) {
                    $_SESSION['messages'][] = ['bot', "<a href='".$recompense1."'>Félicitations</a> 🎉 Tu as trouvé le nombre " . number_format($nombre_a_trouver, 0, '.', ' ') . " en $tentatives tentatives !"];
                } else {
                    $_SESSION['messages'][] = ['bot', "<a href='".$recompense2."'>Bravo</a> 🎉 Tu as trouvé le nombre " . number_format($nombre_a_trouver, 0, '.', ' ') . " en $tentatives tentatives !"];
                }
    
                $json_response = json_encode([
                    'messages' => $_SESSION['messages'],
                    'tentatives' => $_SESSION['tentatives'],
                    'game_over' => true
                ]);
            
                session_destroy();
                echo $json_response;
                exit;
            }
        }
    }

    $json_response = json_encode([
        'messages' => $_SESSION['messages'],
        'tentatives' => $_SESSION['tentatives']
    ]);
    echo $json_response;
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devine mon Nombre</title>
    <style>
        <?php echo file_get_contents('https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/css/gtn.css'); ?>
    </style>
</head>
<body>
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
</body>
</html>

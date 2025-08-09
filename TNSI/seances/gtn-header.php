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
<?php
session_start(); // INDISPENSABLE !!

$nb_min = 0;
$nb_max = 10**9;

$pp_bot = "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/ChatGPT-Logo.svg/512px-ChatGPT-Logo.svg.png";
$pp_user = "https://i.imgur.com/uCkGBeA.png";

$recompense1 = "https://tifsec-nsi.rf.gd/TNSI/session/ancienne_version_terminale";
$recompense2 = "https://www.youtube-nocookie.com/embed/--UcD80SBXM?autoplay=1&loop=1&playlist=--UcD80SBXM&controls=0&modestbranding=1&mute=1&showinfo=0&vq=hd720&rel=0";

// INIT SESSION SI NON EXISTANTE
if (!isset($_SESSION['nombre_a_trouver'])) {
    $_SESSION['nombre_a_trouver'] = rand($nb_min, $nb_max);
    $_SESSION['tentatives'] = 0;
    $_SESSION['messages'] = [
        ['bot', "Je pense à un nombre entre " . number_format($nb_min, 0, '.', ' ') . " et " . number_format($nb_max, 0, '.', ' ') . ". Essaye de le deviner ! 🔢"]
    ];
}

// GESTION DU TELECHARGEMENT JSON COMPLET (mode download)
if (isset($_GET['session']) && $_GET['session'] === "gtn.php.com" && isset($_GET['download'])) {
    // Données actuelles en session
    $data = [
        'messages' => $_SESSION['messages'],
        'tentatives' => $_SESSION['tentatives'],
        'pp_bot' => $pp_bot,
        'pp_user' => $pp_user
    ];

    $prettyJson = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $filename = "game_gtn.json";

    header('Content-Type: application/json; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($prettyJson));
    echo $prettyJson;
    exit;
}

// SUIVANT LA MÉTHODE HTTP, TRAITEMENT NORMAL DU JEU

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['session']) && $_GET['session'] === "gtn.php.com") {
        echo json_encode([
            'messages' => $_SESSION['messages'],
            'tentatives' => $_SESSION['tentatives'],
            'pp_bot' => $pp_bot,
            'pp_user' => $pp_user
        ]);
        exit;
    }
}

// POST : arrêter ou jouer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['arreter'])) {
        $_SESSION['messages'][] = ['bot', "La partie est terminée. À bientôt ! 👋<br>Partie terminée, recharge la page pour rejouer <a href=''>Actualiser</a>"];
        $messages = $_SESSION['messages'];
        session_destroy();
        echo json_encode([
            'messages' => $messages,
            'pp_bot' => $pp_bot,
            'pp_user' => $pp_user
        ]);
        exit;
    }

    if (isset($_POST['nombre'])) {
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
                $_SESSION['messages'][] = ['user', number_format($nombre, 0, '.', ' ')];
                $_SESSION['messages'][] = ['bot', "⚠️ Nombre invalide ! Entre $nb_min et $nb_max."];
            } else {
                $_SESSION['tentatives']++;
                $_SESSION['messages'][] = ['user', number_format($nombre, 0, '.', ' ')];

                if ($nombre < $nombre_a_trouver) {
                    $_SESSION['messages'][] = ['bot', "Trop petit 📉"];
                } elseif ($nombre > $nombre_a_trouver) {
                    $_SESSION['messages'][] = ['bot', "Trop grand 📈"];
                } else {
                    $tentatives = $_SESSION['tentatives'];
                    $download_link = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?session=gtn.php.com&download=1";

                    $message_final = ($tentatives <= 40)
                        ? "<a href='$recompense1'>Félicitations</a> 🎉 Tu as trouvé le nombre " . number_format($nombre_a_trouver, 0, '.', ' ') . " en $tentatives tentatives !<br><a href='$download_link'>📥 Télécharger la partie (JSON)</a><br>Tu peux maintenant <button class='button' onclick="arreter()">Rejouer ou réinitialiser</button>."
                        : "<a href='$recompense2'>Bravo</a> 🎉 Tu as trouvé le nombre " . number_format($nombre_a_trouver, 0, '.', ' ') . " en $tentatives tentatives !<br><a href='$download_link'>📥 Télécharger la partie (JSON)</a>";

                    $_SESSION['messages'][] = ['bot', $message_final];

                    echo json_encode([
                        'messages' => $_SESSION['messages'],
                        'tentatives' => $_SESSION['tentatives'],
                        'game_over' => true,
                        'pp_bot' => $pp_bot,
                        'pp_user' => $pp_user
                    ]);
                    exit;
                }
            }
        }

        echo json_encode([
            'messages' => $_SESSION['messages'],
            'tentatives' => $_SESSION['tentatives'],
            'pp_bot' => $pp_bot,
            'pp_user' => $pp_user
        ]);
        exit;
    }
}
?>

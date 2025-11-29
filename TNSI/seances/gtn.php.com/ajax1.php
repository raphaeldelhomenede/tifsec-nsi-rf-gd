<?php
session_start(); // INDISPENSABLE !!

function lien_absolu1270($params = '') {
    // Protocole : utilise HTTPS si la variable est définie ou le port est 443
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
    
    // Chemin : remplace 'index.php' à la fin par '/' ; sinon utilise le chemin complet
    $path = (basename($_SERVER['PHP_SELF']) === 'index.php') 
        ? rtrim(dirname($_SERVER['PHP_SELF']), '/') . '/' 
        : $_SERVER['PHP_SELF'];
    
    // Retourne l'URL complète
    return $protocol . $_SERVER['HTTP_HOST'] . $path . $params;
}

$nb_min = 0;
$nb_max = 10**9;

$pp_bot = lien_absolu1270("?session=gtn.php.com.br&pp_bot");
$pp_user = lien_absolu1270("?session=gtn.php.com.br&pp_user");

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

// SUIVANT LA MÉTHODE HTTP, TRAITEMENT NORMAL DU JEU
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['session']) && $_GET['session'] === "gtn.php.com.br") {
        $data = [
            'messages' => $_SESSION['messages'],
            'tentatives' => $_SESSION['tentatives'],
            'pp_bot' => $pp_bot,
            'pp_user' => $pp_user
        ];

        $prettyJson = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        function nom_de_fichier($file_name) {
            date_default_timezone_set('Europe/Paris'); // définit l'heure de Paris
            return $file_name . date("d-m-Y_H-i-s") . ".json"; // Exemple : game_gtn_10-08-2025_16-30-45.json
        }

        if (isset($_GET['download'])) {
            header('Content-Type: application/json; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . nom_de_fichier("game_gtn_") . '"');
            header('Content-Length: ' . strlen($prettyJson));
            echo $prettyJson;
            exit;
        }

        function css_in_link_insert($id, $url, $filename) {
            if (isset($_GET[$id])) {
                header("Content-Type: text/css");
                header("Content-Disposition: inline; filename=\"$filename\"");

                // Tente de récupérer le contenu
                $css = @file_get_contents($url);

                // Si la récupération a échoué, afficher un commentaire CSS d'erreur
                if ($css === false) {
                    echo "/* Erreur : impossible de charger le fichier CSS depuis $url */";
                } else {
                    echo $css;
                }
                exit;
            }
        }
        
        foreach (json_decode(file_get_contents('https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/gtn.php.com/css_inserts.json')) as [$id, $url, $filename]) {
            css_in_link_insert($id, $url, $filename);
        }

        function html_in_link_insert($id, $url, $filename) {
            if (isset($_GET[$id])) {
                header("Content-Type: text/html");
                header("Content-Disposition: inline; filename=\"$filename\"");

                // Tente de récupérer le contenu
                $css = @file_get_contents($url);

                // Si la récupération a échoué, afficher un commentaire CSS d'erreur
                if ($css === false) {
                    echo "/* Erreur : impossible de charger le fichier CSS depuis $url */";
                } else {
                    echo $css;
                }
                exit;
            }
        }
        
        foreach (json_decode(file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/gtn.php.com/html_inserts.json")) as [$id, $url, $filename]) {
            html_in_link_insert($id, $url, $filename);
        }

        function mettre_img_in_url($id, $img_path_or_link, $img_title) {
            if (isset($_GET[$id])) {
                $image_data = @file_get_contents($img_path_or_link);

                if ($image_data === false) {
                    header("HTTP/1.1 404 Not Found");
                    exit;
                }

                // Détection du type MIME
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->buffer($image_data);

                // Définition des headers
                header('Content-Type: ' . $mime_type);
                header('Content-Length: ' . strlen($image_data));
                header('Content-Disposition: inline; filename="' . nom_de_fichier($img_title . "_") . '"');

                echo $image_data;
                exit;
            }
        }
        $images_ancienne_version_terminale = json_decode(file_get_contents('https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/gtn.php.com/mettre_img_in_url.json'));
        foreach ($images_ancienne_version_terminale as [$id, $img_path_or_link, $img_title]) {
            mettre_img_in_url($id, $img_path_or_link, $img_title);
        }
        
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: inline; filename="' . nom_de_fichier("game_gtn_") . '"'); // ← ici "inline"
        echo $prettyJson;
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

    if (isset($_POST['reset1'])) {
        // Détruire la session actuelle
        session_unset();      // Supprime toutes les variables de session
        session_destroy();    // Détruit la session côté serveur

        // Redémarrer proprement une nouvelle session
        session_start();

        // Réinitialiser les valeurs comme au début
        $_SESSION['nombre_a_trouver'] = rand($nb_min, $nb_max);
        $_SESSION['tentatives'] = 0;
        $_SESSION['messages'] = [
            ['bot', "Nouvelle partie ! Je pense à un nombre entre " . number_format($nb_min, 0, '.', ' ') . " et " . number_format($nb_max, 0, '.', ' ') . ". Essaye de le deviner ! 🔢"]
        ];

        echo json_encode([
            'status' => 'reset_done',
            'message' => 'Session reset successful.'
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

                    $download_link = lien_absolu1270("?session=gtn.php.com.br&download");
                    $see_json_link = lien_absolu1270("?session=gtn.php.com.br");

                    $message_final = ($tentatives <= 40)
                        ? "<a href='$recompense1'>Félicitations</a> 🎉 Tu as trouvé le nombre " 
                        . number_format($nombre_a_trouver, 0, '.', ' ') 
                        . " en $tentatives tentatives !<br>"
                        . "<a href='$download_link'>📥 Télécharger la partie (JSON)</a><br>"
                        . "<a href='$see_json_link'>Voir le json</a><br>"
                        . "<a href='' onclick=\"reset1(event)\">Rejouer ou réinitialiser</a>"
                        : "<a href='$recompense2'>Bravo</a> 🎉 Tu as trouvé le nombre " 
                        . number_format($nombre_a_trouver, 0, '.', ' ') 
                        . " en $tentatives tentatives !<br>"
                        . "<a href='$download_link'>📥 Télécharger la partie (JSON)</a><br>"
                        . "<a href='$see_json_link'>Voir le json</a><br>"
                        . "<a href='' onclick=\"reset1(event)\">Rejouer ou réinitialiser</a>";
                    
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

<link rel="stylesheet" href="?session=gtn.php.com.br&style_ancien_cours_css">
<style>
    <?php
    $images = [
        1 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        2 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        3 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        4 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        5 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        6 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        7 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        8 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        9 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        10 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        11 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_',
        12 => '?session=gtn.php.com.br&ancienne_version_terminale_img_cour_'
    ];

    foreach ($images as $num => $filename) {
        echo "#chp_{$num} div {\n";
        echo "    background-image: url('{$filename}{$num}');\n";
        echo "    background-size: cover;\n";
        echo "}\n\n";
    }
    ?>
</style>
<?php
function Thiago_Silva_et_Korumbrofuyuki_portent_du_umbro_à_Fluminense($name27_777, $is_and_if_true_27_777) {
    if ($is_and_if_true_27_777 === TRUE) {
        return "?" . $name27_777 . "=" . $_GET[$name27_777] . "&";
    } else {
        return "?" . $name27_777 . "=" . $_GET[$name27_777];
    }
}

$chapitres = [
    1 => "1 - Modularité et mise au point de programmes",
    2 => "2 - Récursivité",
    3 => "3 - Paradigmes de programmation",
    4 => "4 - Interface et implémentation des structures de données",
    5 => "5 - Structures arborescentes",
    6 => "6 - Graphes",
    7 => "7 - Conception de bases de données",
    8 => "8 - Composants et processus",
    9 => "9 - Protocoles de routage et sécurisation des communications",
    10 => "10 - Programmes et données - Calculabilité",
    11 => "11 - Programmation avancée",
    12 => "12 - Projets informatiques"
];

$title1 = "Année de T°";
$afficheBouton = false;

for ($i = 1; $i <= 12; $i++) {
    if (isset($_GET["Cours$i"])) {
        echo '<a href="' . Thiago_Silva_et_Korumbrofuyuki_portent_du_umbro_à_Fluminense('session', FALSE) . '"><button class="button1" id="rtr_btn" style="background-color: rgb(100, 149, 237); width: 52px; display: block;">Retour</button></a>';
        $afficheBouton = true;
        $title1 = $chapitres[$i];
        break;
    }
}

if (!$afficheBouton) {
    echo '<a href="' . $_SERVER['PHP_SELF'] . '"><button class="button1" id="rtr_btn" style="background-color: rgb(100, 149, 237); width: 52px; display: block;">Accueil</button></a>';
}

// Titre principal
echo "<h1 class='h1-1' id='titre_principal'>" . $title1 . "</h1>";

// Menu principal gauche
echo "<div id='nav_menu'><ul class='ul_menu'>";
foreach ($chapitres as $num => $titre) {
    echo "<li id='chp_$num'><a href='" . Thiago_Silva_et_Korumbrofuyuki_portent_du_umbro_à_Fluminense("session", TRUE) . "Cours$num'><div><p>$titre</p></div></a></li>";
}
echo "</ul></div>";

function afficherMenuHorizontal($cours, $titres, $sous_cours_actif) {
    echo '<header class="header1"><div class="menu" id="menu"><nav class="menu_hor" id="menu_hor"><ul id="ul_li">';
    foreach ($titres as $num => $titre) {
        $bg = ($num === $sous_cours_actif) ? "background-color:orange;" : "";
        if ($num === 1) {
            echo "<a href='" . Thiago_Silva_et_Korumbrofuyuki_portent_du_umbro_à_Fluminense("session", TRUE) . "Cours{$cours}'><li id='cours$num' style='$bg'>$titre</li></a>\n";
        } else {
            echo "<a href='" . Thiago_Silva_et_Korumbrofuyuki_portent_du_umbro_à_Fluminense("session", TRUE) . "Cours{$cours}&$num'><li id='cours$num' style='$bg'>$titre</li></a>\n";
        }
    }
    echo '</ul></nav></div></header><div style="margin-top: 5px;"></div>';
}

function sous_cours_foreach($n) {
    $sous_cours = 1;

    for ($i = 1; $i <= $n; $i++) {
        if (isset($_GET[strval($i)])) {
            $sous_cours = $i;
            break;
        }
    }

    return $sous_cours;
}

if (isset($_GET['Cours1'])) {
    echo "<style>#nav_menu { display: none; }</style>";
    $titres = [
        1 => "1 - Modules et documentations",
        2 => "2 - Déboguer un programme",
        3 => "3 - Tests",
        4 => "4 - Guide de style"
    ];
    $base_url = "https://thesevendeadlysinsds.github.io/nsi.rf.gd/TNSI/pdf/1_modularite_et_mise_au_point_de_programmes/pdf/";
    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(1, $titres, $sous_cours);
    $pdf_file = match ($sous_cours) {
        1 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_1_modules_et_documentations",
        2 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_2_deboguer_un_programme",
        3 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_3_tests",
        4 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_4_guide_de_style",
        default => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_1_modules_et_documentations"
    };
    echo "<iframe id='source_iframe' src='{$pdf_file}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours2'])) {
    echo "<style>#nav_menu { display: none; }</style>";
    $titres = [
        1 => "1 - Fonctionnement d'un programme recursif",
        2 => "2 - Diviser pour régner"
    ];
    $base_url = "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_";
    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(2, $titres, $sous_cours);
    $pdf_file = ($sous_cours === 2) ? "2_diviser_pour_regner" : "1_fonctionnement_d_un_programme_recursif";
    echo "<iframe id='source_iframe' src='{$base_url}{$pdf_file}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours3'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Les principaux paradigmes de programmation",
        2 => "2 - Programmation fonctionnelle",
        3 => "3 - Programmation orientée objet"
    ];

    $base_url = "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_";
    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(3, $titres, $sous_cours);

    // Sélection du bon fichier PDF
    $pdf_file = match ($sous_cours) {
        1 => "1_les_principaux_paradigmes_de_programmation",
        2 => "2_programmation_fonctionnelle",
        3 => "3_paradigmes_de_programmation_3_programmation_orientee_objet",
        default => "1_les_principaux_paradigmes_de_programmation"
    };

    echo "<iframe id='source_iframe' src='{$base_url}{$pdf_file}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours4'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Les types abstraits",
        2 => "2 - Les listes",
        3 => "3 - Les piles",
        4 => "4 - Les files",
        5 => "5 - Les tableaux associatifs",
        6 => "6 - Exos",
        7 => "7 - Révision 1",
        8 => "8 - Révision 2"
    ];

    $base_url = "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_";
    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(4, $titres, $sous_cours);

    // Sélection du bon fichier PDF
    $pdf_file = match ($sous_cours) {
        1 => "1_les_types_abstraits",
        2 => "2_les_listes",
        3 => "3_les_piles",
        4 => "4_les_files",
        5 => "5_les_tableaux_associatifs",
        6 => "Exos",
        7 => "rev1",
        8 => "rev2",
        default => "1_les_types_abstraits"
    };

    echo "<iframe id='source_iframe' src='{$base_url}{$pdf_file}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours5'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Introduction",
        2 => "2 - Les arbres binaires",
        3 => "3 - Quelques mesures",
        4 => "4 - Définition récursive",
        5 => "5 - Généalogie",
        6 => "6 - Attributs",
        7 => "7 - Algo sur les arbres binaires",
        8 => "8 - Révision",
        9 => "9 - Exos",
        10 => "10 - ABR",
        11 => "11 - Révision",
        12 => "12 - Exos",
        13 => "13 - Implémentation des ABR à l'aide de la POO"
    ];

    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(5, $titres, $sous_cours);

    // Gestion des différents fichiers (pdf ou html selon le cas)
    $pdf_file = match ($sous_cours) {
        2 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_2_les_arbres_binaires",
        3 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_HlcB5vKats0",
        4 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_QScUqGYSFns",
        5 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_7KiGcDayfFQ",
        6 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_tKY6Dr_dqkw",
        7 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_SNK_M6Bbe4",
        8 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_8_fiche_revision_les_arbres",
        9 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_9_exercices",
        10 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_YGEYnECw7XA",
        11 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_11_fiche_revision_algo_arbres",
        12 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_12_exercices",
        13 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_13_Implementation_des_arbres_binaires_de_recherche_a_l_aide_de_la_POO",
        default => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_1_introduction"
    };

    echo "<iframe id='source_iframe' src='{$pdf_file}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours6'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Graphes"
    ];

    $base_url = "https://thesevendeadlysinsds.github.io/nsi.rf.gd/TNSI/pdf/6_graphes/pdf/";
    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(6, $titres, $sous_cours);

    $pdf_file = match ($sous_cours) {
        default => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_6_1_graphes"
    };

    echo "<iframe id='source_iframe' src='{$pdf_file}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours7'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Introduction",
        2 => "2 - Les bases de données",
        3 => "3 - Exercices",
        4 => "4 - Système de gestion de bases de données",
        5 => "5 - Le langage SQL",
        6 => "6 - TD",
        7 => "7 - Création d'une base de données",
        8 => "8 - TP PHP/MySQL"
    ];

    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(7, $titres, $sous_cours);

    if ($sous_cours === 6) {
        echo "<div id='div_cours' style='margin: 2rem;'>Vous trouverez sur le site 
        <a href='https://isn-icn-ljm.pagesperso-orange.fr/SQL/' style='color: goldenrod; cursor: default;' target='_blank'>
        https://isn-icn-ljm.pagesperso-orange.fr/SQL/</a> les exercices à réaliser.</div>";
    } else {
        $base_url_pdf = "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_7_";

        $pdf_file = match ($sous_cours) {
            2 => $base_url_pdf . "2_les_bases_de_donnees",
            3 => $base_url_pdf . "3_exercices",
            4 => $base_url_pdf . "4_SGBD",
            5 => $base_url_pdf . "5_le_langage_SQL",
            7 => $base_url_pdf . "7_creation_bdd",
            8 => $base_url_pdf . "8_tp_php_mysql",
            default => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_7_conception_de_bases_de_donnees_html_1_introduction"
        };

        echo "<iframe id='source_iframe' src='{$pdf_file}' width='100%' height='700px' style='border:none;'></iframe>";
    }
}

if (isset($_GET['Cours8'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Composants intégrés d'un système sur puce 1",
        2 => "2 - Composants intégrés d'un système sur puce 2",
        3 => "3 - Les processus 1",
        4 => "4 - Les processus 2",
        5 => "5 - JSLinux"
    ];

    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(8, $titres, $sous_cours);

    if ($sous_cours === 5) {
        echo "<div id='div_cours' style='margin: 2rem;'>\
        <a href='https://bellard.org/jslinux/vm.html?url=alpine-x86.cfg&mem=192' \
        target='_blank' style='color: black;'>JSLinux</a></div>";
    } else {
        $urls = [
            1 => "https://www.lecluse.fr/nsi/NSI_T/archi/soc/",
            2 => "https://pixees.fr/informatiquelycee/n_site/nsi_term_archi_soc.html",
            3 => "https://pixees.fr/informatiquelycee/n_site/nsi_term_archi_proc.html",
            4 => "https://www.lecluse.fr/nsi/NSI_T/archi/process/"
        ];

        $url = $urls[$sous_cours] ?? $urls[1];

        echo "<iframe id='source_iframe' src='{$url}' width='100%' height='700px' style='border:none;'></iframe>";
    }
}

if (isset($_GET['Cours9'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Mooc Routage et qualité de service dans l'Internet",
        2 => "2 - Protocoles de routage",
        3 => "3 - Cryptographie symétrique et asymétrique - Comprendre le SSL",
        4 => "4 - Sécurisation des communications - 1",
        5 => "5 - Sécurisation des communications - 2"
    ];

    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(9, $titres, $sous_cours);

    $urls = [
        1 => "https://www.youtube.com/embed/e3I4opl8EH4",
        2 => "https://pixees.fr/informatiquelycee/n_site/nsi_term_archi_routage.html",
        3 => "https://www.youtube.com/embed/jMIAoAVbcsw",
        4 => "https://pixees.fr/informatiquelycee/n_site/nsi_term_archi_secu.html",
        5 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_5_ra21_lycee_g_t_nsi_securisation-communications"
    ];

    $url = $urls[$sous_cours] ?? $urls[1];

    echo "<iframe id='source_iframe' src='{$url}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours10'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Calculabilité et décidabilité 1",
        2 => "2 - Calculabilité et décidabilité 2",
        3 => "3 - Une preuve pour le lycée de l’indécidabilité du problème de l’arrêt"
    ];

    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(10, $titres, $sous_cours);

    $urls = [
        1 => "https://pixees.fr/informatiquelycee/n_site/nsi_term_calcu.html",
        2 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_10_RA20_NSI_G_T_calculabilite_1298636",
        3 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_10_article2"
    ];

    $url = $urls[$sous_cours] ?? $urls[1];

    echo "<iframe id='source_iframe' src='{$url}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours11'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    $titres = [
        1 => "1 - Diviser pour régner 1",
        2 => "2 - Diviser pour régner 2",
        3 => "3 - Programmation dynamique 1",
        4 => "4 - Programmation dynamique 2",
        5 => "5 - Recherche Textuelle 1",
        6 => "6 - Recherche Textuelle 2",
        7 => "7 - Recherche Textuelle 3"
    ];

    $sous_cours = sous_cours_foreach(count($titres));
    afficherMenuHorizontal(11, $titres, $sous_cours);

    $urls = [
        1 => "https://video.umontpellier.fr/video/3561-hlin401-chap-4-diviser-pour-regner-calcul-de-rang/",
        2 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_11_ra21_lycee_g_t_nsi_diviser-pour-regner",
        3 => "https://pixees.fr/informatiquelycee/n_site/nsi_term_algo_progdyn.html",
        4 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_11_RA20_NSI_G_T_progdyn_1298637",
        5 => "https://pixees.fr/informatiquelycee/n_site/nsi_term_algo_boyer.html",
        6 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_11_NSI_Recherche_Textuelle",
        7 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_11_RA20_NSI_G_T_boyer-moore_1298635"
    ];

    $url = $urls[$sous_cours] ?? $urls[1];

    echo "<iframe id='source_iframe' src='{$url}' width='100%' height='700px' style='border:none;'></iframe>";
}

if (isset($_GET['Cours12'])) {
    echo "<style>#nav_menu { display: none; }</style>";

    // Titres des cours
    $titres = [
        1 => "1 - Cours de Programmation Orientée Objet (POO) en Python",
        2 => "2 - Programme de Projets POO",
        3 => "3 - Cours sur la récursivité en Python",
        4 => "4 - Vide",
        5 => "5 - Vide",
        6 => "6 - Vide",
        7 => "7 - Vide"
    ];

    // Sous-titres pour cours 1 et 2
    $sous_titres = [
        1 => [
            1 => "1 - Introduction à la Programmation Orientée Objet",
            2 => "2 - Exemple pratique 1 : Approche inspirée des jeux vidéo",
            3 => "3 - Exemple pratique 2 : Approche inspirée de la vie réelle",
            4 => "4 - Conclusion et récapitulation",
            5 => "5 - Mini-Jeu : Aventure en forêt",
            6 => "6 - Simulation de ville"
        ],
        2 => [
            1 => "1 - Un projet de jeu vidéo",
            2 => "2 - La gestion d'une bibliothèque"
        ],
        3 => [
            1 => "1 - Introduction à la récursivité",
            2 => "2 - Exemple pratique 1 - Approche inspirée des jeux vidéo",
            3 => "3 - Exemple pratique 2 - Approche inspirée de la vie réelle",
            4 => "4 - Conclusion et récapitulation"
        ]
    ];

    // URLs associées
    $urls = [
        1 => [
            1 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_1_-_Introduction_à_la_Programmation_Orientée_Objet",
            2 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_2_-_Exemple_pratique_1_-_Approche_inspirée_des_jeux_vidéo",
            3 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_3_-_Exemple_pratique_2_-_Approche_inspirée_de_la_vie_réelle",
            4 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_4_-_Conclusion_et_récapitulation",
            5 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_5_-_Mini-Jeu_-_Aventure_en_forêt",
            6 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_6_-_Simulation_de_ville"
        ],
        2 => [
            1 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_7_-_Un_projet_de_jeu_vidéo",
            2 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_8_-_La_gestion_d_une_bibliothèque"
        ],
        3 => [
            1 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_9_-_Introduction_à_la_récursivité",
            2 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_10_-_Exemple_pratique_1_-_Approche_inspirée_des_jeux_vidéo",
            3 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_11_-_Exemple_pratique_2_-_Approche_inspirée_de_la_vie_réelle",
            4 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_12_-_Conclusion_et_récapitulation"
        ],
        4 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_Sans_nom_1",
        5 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_Sans_nom_1",
        6 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_Sans_nom_1",
        7 => "?session=gtn.php.com.br&ancienne_version_terminale_pdf_cour_12_-_Projets_informatiques_Sans_nom_1"
    ];

    // Analyse de l'URL
    $params = explode('&', $_SERVER['QUERY_STRING']);
    $cours_num = null;
    $sous_num = null;

    foreach ($params as $param) {
        if (ctype_digit($param)) {
            if ($cours_num === null) {
                $cours_num = (int)$param;
            } else {
                $sous_num = (int)$param;
                break;
            }
        }
    }

    // Par défaut, afficher cours 1, sous-partie 1
    if ($cours_num === null) $cours_num = 1;
    if (isset($sous_titres[$cours_num]) && $sous_num === null) $sous_num = 1;

    afficherMenuHorizontal(12, $titres, $cours_num);

    // Affichage des sous-parties si elles existent
    if (isset($sous_titres[$cours_num])) {
        echo '<div id="menu_left"><div id="toto1"><nav class="menu_hor" id="menu_hor_cours"><ul id="ul_li">';
        foreach ($sous_titres[$cours_num] as $id => $titre) {
            $bg = ($id === $sous_num) ? "background-color:orange;" : "";
            if ($cours_num === 1 && $id === 1) {
                echo "<a href='" . Thiago_Silva_et_Korumbrofuyuki_portent_du_umbro_à_Fluminense("session", TRUE) . "Cours12" . "'><li id='cours12_{$cours_num}_{$id}' style='$bg'>$titre</li></a>\n";
            } else {
                echo "<a href='" . Thiago_Silva_et_Korumbrofuyuki_portent_du_umbro_à_Fluminense("session", TRUE) . "Cours12&" . $cours_num . "&" . $id . "'><li id='cours12_{$cours_num}_{$id}' style='$bg'>$titre</li></a>\n";
            }
        }
        echo '</ul></nav></div></div><div style="margin-top: 5px;"></div>';
    }

    // Affichage PDF
    if ($sous_num !== null && isset($urls[$cours_num][$sous_num])) {
        $url = htmlspecialchars($urls[$cours_num][$sous_num]);
    } elseif (isset($urls[$cours_num])) {
        // Cas où il n'y a pas de sous-partie, $urls[$cours_num] est directement une URL string
        $url = htmlspecialchars($urls[$cours_num]);
    } else {
        // URL par défaut si rien n'est trouvé
        $url = htmlspecialchars($urls[1][1]);
    }

    echo "<iframe id='source_iframe' src='$url' width='100%' height='700px' style='border:none;'></iframe>";
}
?>

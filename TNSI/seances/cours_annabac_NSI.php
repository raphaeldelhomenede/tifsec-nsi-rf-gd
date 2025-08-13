<?php
/*function get_url_content_base64($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    // Convertir en UTF-8 si ce n’est pas déjà le cas
    $encoding = mb_detect_encoding($data, ['UTF-8', 'ISO-8859-1', 'Windows-1252'], true);
    if ($encoding && $encoding !== 'UTF-8') {
        $data = mb_convert_encoding($data, 'UTF-8', $encoding);
    }

    // Assurer que le HTML a bien un <meta charset="utf-8"> dans <head>
    $data = preg_replace(
        '/<meta[^>]+charset=[^>]+>/i',
        '<meta charset="utf-8">',
        $data,
        1
    );

    return base64_encode($data);
}*/

$session = $_GET['session'] ?? null;
$theme = $_GET['theme'] ?? null;
$chapitre = $_GET['chapitre'] ?? null;

$urls = [
    "langages" => [
        1 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Langages_programmation_et_algorithmique_Chapitre_1.html",
        2 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Langages_programmation_et_algorithmique_Chapitre_2.html",
        3 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Langages_programmation_et_algorithmique_Chapitre_3.html"
    ],
    "structures" => [
        1 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Structures_de_données_Chapitre_1.html",
        2 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Structures_de_données_Chapitre_2.html",
        3 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Structures_de_données_Chapitre_3.html"
    ],
    "bases" => [
        1 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Conception_de_bases_de_données_Chapitre_1.html",
        2 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Conception_de_bases_de_données_Chapitre_2.html"
    ],
    "architectures" => [
        1 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Composants_et_processus_Chapitre1.html",
        2 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Composants_et_processus_Chapitre2.html"
    ],
    "avancee" => [
        1 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Programmation_avancée_et_algorithmique_Chapitre_1.html",
        2 => "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Programmation_avancée_et_algorithmique_Chapitre_2.html"
    ]
];

// Si un chapitre est demandé → afficher dans un iframe
if ($theme && $chapitre && isset($urls[$theme][(int)$chapitre])) {
    /*$encoded = get_url_content_base64($urls[$theme][(int)$chapitre]);*/
    echo <<<HTML
    <style>
        body { margin: 0; padding: 0; }
        iframe { border: none; width: 100%; height: 100vh; }
    </style>
    HTML;

    $html_content = get_url_content_curl($urls[$theme][(int)$chapitre]);
    if ($html_content === false) {
        echo "<p>Erreur lors du chargement du contenu distant.</p>";
    } else {
        echo $html_content;
    }
    exit;
}
?>

<!-- Menu visible SEULEMENT si aucun chapitre n'est sélectionné -->
<style>
    ul { line-height: 1.6; }
    a { text-decoration: none; color: #0074d9; }
</style>

<h1>📘 Cours NSI - Accès rapide aux chapitres</h1>

<h2>Langages, programmation et algorithmique</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=langages&chapitre=1">Chapitre 1 : Modularité et mise au point des programmes</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=langages&chapitre=2">Chapitre 2 : Récursivité</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=langages&chapitre=3">Chapitre 3 : Paradigmes de programmation</a></li>
</ul>

<h2>Structures de données</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=structures&chapitre=1">Chapitre 1 : Interface et implémentation des structures de données</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=structures&chapitre=2">Chapitre 2 : Structures arborescentes</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=structures&chapitre=3">Chapitre 3 : Graphes</a></li>
</ul>

<h2>Bases de données</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=bases&chapitre=1">Chapitre 1 : Conception de bases de données</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=bases&chapitre=2">Chapitre 2 : Systèmes de gestion de bases de données – SQL</a></li>
</ul>

<h2>Architectures matérielles, systèmes d'exploitation et réseaux</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=architectures&chapitre=1">Chapitre 1 : Composants et processus</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=architectures&chapitre=2">Chapitre 2 : Protocoles de routage et sécurisation des communications</a></li>
</ul>

<h2>Programmation avancée et algorithmique</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=avancee&chapitre=1">Chapitre 1 : Programmes et données – Calculabilité</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=avancee&chapitre=2">Chapitre 2 : Programmation avancée</a></li>
</ul>

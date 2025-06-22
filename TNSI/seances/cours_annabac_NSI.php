<?php
function get_url_content($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

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

// Si un chapitre est demandé → on affiche **uniquement** le cours
if ($theme && $chapitre && isset($urls[$theme][(int)$chapitre])) {
    echo get_url_content($urls[$theme][(int)$chapitre]);
    exit; // empêche l'affichage du menu après
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
    <li><a href="?session=cours_annabac_NSI&theme=langages&chapitre=1">Chapitre 1 : Modularité</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=langages&chapitre=2">Chapitre 2 : Récursivité</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=langages&chapitre=3">Chapitre 3 : Paradigmes</a></li>
</ul>

<h2>Structures de données</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=structures&chapitre=1">Chapitre 1 : Structures simples</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=structures&chapitre=2">Chapitre 2 : Arbres</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=structures&chapitre=3">Chapitre 3 : Graphes</a></li>
</ul>

<h2>Bases de données</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=bases&chapitre=1">Chapitre 1 : Modélisation</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=bases&chapitre=2">Chapitre 2 : SQL</a></li>
</ul>

<h2>Architectures matérielles</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=architectures&chapitre=1">Chapitre 1 : Composants</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=architectures&chapitre=2">Chapitre 2 : Réseaux</a></li>
</ul>

<h2>Programmation avancée</h2>
<ul>
    <li><a href="?session=cours_annabac_NSI&theme=avancee&chapitre=1">Chapitre 1 : Calculabilité</a></li>
    <li><a href="?session=cours_annabac_NSI&theme=avancee&chapitre=2">Chapitre 2 : Programmation avancée</a></li>
</ul>

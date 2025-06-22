<?php
function get_url_content_base64($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    curl_close($ch);
    return base64_encode($data);
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

// Si un chapitre est demandé → afficher dans un iframe
if ($theme && $chapitre && isset($urls[$theme][(int)$chapitre])) {
    $encoded = get_url_content_base64($urls[$theme][(int)$chapitre]);
    echo <<<HTML
    <style>
        body { margin: 0; padding: 0; }
        iframe { border: none; width: 100%; height: 100vh; }
    </style>
    <iframe src="data:text/html;base64,{$encoded}"></iframe>
HTML;
    exit;
}
?>

<!-- Menu visible SEULEMENT si aucun chapitre n'est sélectionné -->
<style>
    body { color: #555; font-family: sans-serif; }
    ul { line-height: 1.6; }
    a { text-decoration: none; color: #555; }
    a:hover { color: #000; }
</style>

<h1>📘 Cours NSI - Accès rapide aux chapitres</h1>

<?php
function base6($n) { return base_convert($n, 10, 6); }
?>

<h2>Langages, programmation et algorithmique</h2>
<ul>
    <?php for ($i = 1; $i <= 3; $i++): ?>
        <li><a href="?session=cours_annabac_NSI&theme=langages&chapitre=<?= $i ?>">Chapitre <?= $i ?> (base 6 : <?= base6($i) ?>)</a></li>
    <?php endfor; ?>
</ul>

<h2>Structures de données</h2>
<ul>
    <?php for ($i = 1; $i <= 3; $i++): ?>
        <li><a href="?session=cours_annabac_NSI&theme=structures&chapitre=<?= $i ?>">Chapitre <?= $i ?> (base 6 : <?= base6($i) ?>)</a></li>
    <?php endfor; ?>
</ul>

<h2>Bases de données</h2>
<ul>
    <?php for ($i = 1; $i <= 2; $i++): ?>
        <li><a href="?session=cours_annabac_NSI&theme=bases&chapitre=<?= $i ?>">Chapitre <?= $i ?> (base 6 : <?= base6($i) ?>)</a></li>
    <?php endfor; ?>
</ul>

<h2>Architectures matérielles, systèmes d'exploitation et réseaux</h2>
<ul>
    <?php for ($i = 1; $i <= 2; $i++): ?>
        <li><a href="?session=cours_annabac_NSI&theme=architectures&chapitre=<?= $i ?>">Chapitre <?= $i ?> (base 6 : <?= base6($i) ?>)</a></li>
    <?php endfor; ?>
</ul>

<h2>Programmation avancée et algorithmique</h2>
<ul>
    <?php for ($i = 1; $i <= 2; $i++): ?>
        <li><a href="?session=cours_annabac_NSI&theme=avancee&chapitre=<?= $i ?>">Chapitre <?= $i ?> (base 6 : <?= base6($i) ?>)</a></li>
    <?php endfor; ?>
</ul>

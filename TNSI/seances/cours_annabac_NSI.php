<?php
function get_url_content($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // suivre les redirections
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // option pour GitHub Pages si certif
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

if ($theme && $chapitre && isset($urls[$theme][(int)$chapitre])) {
    echo get_url_content($urls[$theme][(int)$chapitre]);
}
?>

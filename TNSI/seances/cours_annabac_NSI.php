<?php
$session = $_GET['session'] ?? null;
$theme = $_GET['theme'] ?? null;
$chapitre = $_GET['chapitre'] ?? null;
?>
<style>
    ul { line-height: 1.6; }
    a { text-decoration: none; color: #2980b9; }
    body { font-family: Arial, sans-serif; background: #f8f8f8; padding: 20px; }
</style>

<?php
if ($theme === null && $chapitre === null) {
    // Afficher le sommaire général seulement si aucun chapitre n'est demandé
    echo <<<HTML
    <h1>📘 Présentation générale du cours NSI</h1>
    <p>Ce site regroupe les différents chapitres du programme NSI (Numérique et Sciences Informatiques).</p>

    <h2>Langages, programmation et algorithmique</h2>
    <ul>
        <li><a href="?session=cours_annabac_NSI&theme=Langages, programmation et algorithmique&chapitre=1">Chapitre 1 : Modularité et mise au point des programmes</a></li>
        <li><a href="?session=cours_annabac_NSI&theme=Langages, programmation et algorithmique&chapitre=2">Chapitre 2 : Récursivité</a></li>
        <li><a href="?session=cours_annabac_NSI&theme=Langages, programmation et algorithmique&chapitre=3">Chapitre 3 : Paradigmes de programmation</a></li>
    </ul>

    <h2>Structures de données</h2>
    <ul>
        <li><a href="?session=cours_annabac_NSI&theme=Structures de données&chapitre=1">Chapitre 1 : Interface et implémentation des structures de données</a></li>
        <li><a href="?session=cours_annabac_NSI&theme=Structures de données&chapitre=2">Chapitre 2 : Structures arborescentes</a></li>
        <li><a href="?session=cours_annabac_NSI&theme=Structures de données&chapitre=3">Chapitre 3 : Graphes</a></li>
    </ul>

    <h2>Bases de données</h2>
    <ul>
        <li><a href="?session=cours_annabac_NSI&theme=Bases de données&chapitre=1">Chapitre 1 : Conception de bases de données</a></li>
        <li><a href="?session=cours_annabac_NSI&theme=Bases de données&chapitre=2">Chapitre 2 : Systèmes de gestion de bases de données – SQL</a></li>
    </ul>

    <h2>Architectures matérielles, systèmes d'exploitation et réseaux</h2>
    <ul>
        <li><a href="?session=cours_annabac_NSI&theme=Architectures&chapitre=1">Chapitre 1 : Composants et processus</a></li>
        <li><a href="?session=cours_annabac_NSI&theme=Architectures&chapitre=2">Chapitre 2 : Protocoles de routage et sécurisation des communications</a></li>
    </ul>

    <h2>Programmation avancée et algorithmique</h2>
    <ul>
        <li><a href="?session=cours_annabac_NSI&theme=Programmation avancée&chapitre=1">Chapitre 1 : Programmes et données – Calculabilité</a></li>
        <li><a href="?session=cours_annabac_NSI&theme=Programmation avancée&chapitre=2">Chapitre 2 : Programmation avancée</a></li>
    </ul>
HTML;
}

// Ensuite, afficher le contenu du chapitre demandé, si applicable
if ($theme == "Langages, programmation et algorithmique" && $chapitre == 1) {
    echo file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Langages_programmation_et_algorithmique_Chapitre_1.html");
}
if ($theme == "Langages, programmation et algorithmique" && $chapitre == 2) {
    echo file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Langages_programmation_et_algorithmique_Chapitre_2.html");
}
if ($theme == "Langages, programmation et algorithmique" && $chapitre == 3) {
    echo file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/cours_annabac_NSI/Langages_programmation_et_algorithmique_Chapitre_3.html");
}
?>

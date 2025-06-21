<?php
$session = $_GET['session'] ?? null;
$theme = $_GET['theme'] ?? null;
$chapitre = $_GET['chapitre'] ?? null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Présentation du cours NSI</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f8f8; }
        h1, h2 { color: #2c3e50; }
        ul { line-height: 1.6; }
        a { text-decoration: none; color: #2980b9; }
    </style>
</head>
<body>
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
</body>
</html>

<?php
if ($_GET["file"]) {
    session_start();
    function nom_de_fichier($titre) {
        return preg_replace('/[^a-zA-Z0-9_-]/', '-', $titre) . ".pdf";
    }
    $base_url = "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/pratique/html/consignes/sujets/2025-NSI/";
    $file = $_GET['file'];

    // Vérification simple (à renforcer si besoin)
    if (!preg_match('#^[0-9]{2}/25-NSI-[0-9]+\.pdf$#', $file)) {
        header("HTTP/1.1 400 Bad Request");
        echo "Nom de fichier non valide.";
        exit;
    }

    // Construit l'URL complète
    $url_pdf = $base_url . $file;

    // Récupère le contenu du PDF
    $pdf_data = @file_get_contents($url_pdf);

    if ($pdf_data === false) {
        header("HTTP/1.1 404 Not Found");
        echo "Fichier non trouvé.";
        exit;
    }

    $parts = explode('/', $file);
    $sujet_num = $parts[0];
    // Envoie les bons headers pour afficher le PDF dans le navigateur
    header("Content-Type: application/pdf");
    header("Content-Length: " . strlen($pdf_data));
    header("Content-Disposition: inline; filename=\"Sujet{$sujet_num}.pdf\"");
    echo $pdf_data;
    exit;
}
?>

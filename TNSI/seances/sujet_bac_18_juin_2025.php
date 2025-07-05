<?php
$pdfContent = @file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/Programme_NSI_Tle_fichiers/25_NSIJ2ME1.pdf");
$pdfContent1 = @file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/Programme_NSI_Tle_fichiers/878444090-Correction-SpeNSI-Jour2-Bac2025-Maj.pdf");

if ($pdfContent === false || $pdfContent1 === false) {
    die("Erreur : impossible de récupérer l'un des fichiers PDF.");
}

$dataURI = "data:application/pdf;base64," . base64_encode($pdfContent);
$dataURI1 = "data:application/pdf;base64," . base64_encode($pdfContent1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sujet et correction NSI Bac 2025</title>
    <style>
        iframe {
            width: 100%;
            height: 95vh;
            border: none;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <h2>Le sujet bac de NSI du 18 juin 2025 en France Métropolitaine :</h2>
    <iframe src="<?php echo $dataURI; ?>" title="Sujet NSI Bac 2025"></iframe>

    <h2>La correction du sujet :</h2>
    <iframe src="<?php echo $dataURI1; ?>" title="Correction NSI Bac 2025"></iframe>
</body>
</html>

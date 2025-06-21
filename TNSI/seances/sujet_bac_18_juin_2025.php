<?php
$pdfContent = @file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/Programme_NSI_Tle_fichiers/25_NSIJ2ME1.pdf");
if ($pdfContent === false) {
    die("Erreur : impossible de récupérer le fichier PDF.");
}

$base64PDF = base64_encode($pdfContent);

$dataURI = "data:application/pdf;base64," . $base64PDF;
?>
<iframe src="<?php echo $dataURI; ?>"></iframe>
<style>
    iframe {
        width: 100%;
        height: 95vh;
        border: none;
    }
</style>

<?php
$pdfContent = @file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/Programme_NSI_Tle_fichiers/25_NSIJ2ME1.pdf");
$pdfContent1 = @file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/Programme_NSI_Tle_fichiers/878444090-Correction-SpeNSI-Jour2-Bac2025-Maj.pdf");

if ($pdfContent === false || $pdfContent1 === false) {
    die("Erreur : impossible de récupérer l'un des fichiers PDF.");
}

$dataURI = "data:application/pdf;base64," . base64_encode($pdfContent);
$dataURI1 = "data:application/pdf;base64," . base64_encode($pdfContent1);
?>

<style>
    iframe {
        width: 100%;
        height: 95vh;
        border: none;
        margin-bottom: 2rem;
    }
</style>

<iframe src="<?php echo $dataURI; ?>" title="Sujet NSI Bac 2025"></iframe>

<a href="?session=<?= htmlspecialchars($_GET['session'] ?? '') ?>&corrigé">Voir le corrigé</a>

<?php if (isset($_GET['corrigé'])): ?>
    <h2>Correction du sujet</h2>
    <iframe src="<?php echo $dataURI1; ?>" title="Correction NSI Bac 2025"></iframe>
<?php endif; ?>

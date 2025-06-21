<?php
$encodedUrl = base64_decode("aHR0cHM6Ly9yYXBoYWVsZGVsaG9tZW5lZGUuZ2l0aHViLmlvL3RpZnNlYy1uc2ktcmYtZ2QvVE5TSS9Qcm9ncmFtbWVfTlNIX1RsZV9maWNoaWVycy8yNV9OU0lKMk1FMS5wZGY=");
$pdfContent = @file_get_contents($encodedUrl);

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

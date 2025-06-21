<?php
// URL encodée en base64 (plus discret)
$encodedUrl = "aHR0cHM6Ly9yYXBoYWVsZGVsaG9tZW5lZGUuZ2l0aHViLmlvL3RpZnNlYy1uc2ktcmYtZ2QvVE5TSS9Qcm9ncmFtbWVfTlNIX1RsZV9maWNoaWVycy8yNV9OU0lKMk1FMS5wZGY=";
$url = base64_decode($encodedUrl);

// Utilisation de cURL pour télécharger le fichier PDF
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Désactivé pour GitHub, à activer en prod

$pdfContent = curl_exec($ch);
$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if (!$pdfContent || $httpStatus !== 200) {
    die("Erreur : impossible de récupérer le fichier PDF. Code HTTP : $httpStatus");
}

// Encodage en base64
$base64PDF = base64_encode($pdfContent);
$dataURI = "data:application/pdf;base64," . $base64PDF;
?>
<style>
    iframe {
        width: 100%;
        height: 95vh;
        border: none;
    }
</style>
<iframe src="<?php echo htmlspecialchars($dataURI); ?>"></iframe>

<?php
$url = "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/Programme_NSI_Tle_fichiers/25_NSIJ2ME1.pdf";

// Tester la connexion sans rien faire d’autre
$headers = @get_headers($url);

if ($headers === false) {
    echo "❌ Le serveur ne peut pas accéder à l'URL.";
} else {
    echo "✅ Accès possible. Entête retournée :<br>";
    echo implode("<br>", $headers);
}
?>

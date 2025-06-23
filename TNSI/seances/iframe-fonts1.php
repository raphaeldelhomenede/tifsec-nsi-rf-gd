<?php
$path = $seances_data3[6][2][$session_actuelle][$font1];
$content = @file_get_contents($path);

if ($content === false) {
    echo "Erreur : fichier introuvable ou non lisible.";
    exit;
}

$base64 = base64_encode($content);

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_buffer($finfo, $content);
finfo_close($finfo);

if (!$mime_type) {
    $mime_type = 'text/html';
}
?>

<iframe src="data:<?= $mime_type ?>;base64,<?= $base64 ?>" width="100%" height="600" style="border:1px solid #ccc;"></iframe>

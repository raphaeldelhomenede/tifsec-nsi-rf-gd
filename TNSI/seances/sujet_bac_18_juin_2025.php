<?php
function lien_absolu1271($params = '') {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];

    if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') {
        $dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
        if ($dir === '.' || $dir === '/') {
            $dir = '';
        }
        return $protocol . $host . $dir . '/index.php' . $params;
    } else {
        return $protocol . $host . $_SERVER["PHP_SELF"] . $params;
    }
}
$dataURI = lien_absolu1271("?session=gtn.php.com.br&sujet_bac_18_juin_2025");
$dataURI1 = lien_absolu1271("?session=gtn.php.com.br&corrige_sujet_bac_18_juin_2025");
?>

<style>
    iframe {
        width: 100%;
        height: 95vh;
        border: none;
        margin-bottom: 2rem;
    }
</style>

<?php if (isset($_GET['corrigé'])): ?>
    <h2>Correction du sujet</h2>
    <iframe src="<?php echo $dataURI1; ?>" title="Correction NSI Bac 18 juin 2025"></iframe>
    <a href="<?= lien_absolu1271(htmlspecialchars($_GET['session'] ?? 'sujet_bac_18_juin_2025')) ?>">Voir l'exercice</a>
<?php else: ?>
    <iframe src="<?php echo $dataURI; ?>" title="Sujet NSI Bac 18 juin 2025"></iframe>
    <a href="<?= lien_absolu1271(htmlspecialchars($_GET['session'] ?? 'sujet_bac_18_juin_2025')) ?>&corrigé">Voir le corrigé</a>
<?php endif; ?>

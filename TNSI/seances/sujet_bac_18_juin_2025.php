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

// Construction dynamique des URLs avec paramètres propres
$baseParams = '?session=gtn.php.com.br';
$sujetParam = '&sujet_bac_18_juin_2025';
$corrigeParam = '&corrige_sujet_bac_18_juin_2025';
$dataURI  = lien_absolu1271($baseParams . $sujetParam);
$dataURI1 = lien_absolu1271($baseParams . $corrigeParam);
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
    <iframe src="<?= $dataURI1 ?>" title="Correction NSI Bac 18 juin 2025"></iframe>
    <a href="<?= lien_absolu1271($baseParams . $sujetParam) ?>">Voir l'exercice</a>
<?php else: ?>
    <iframe src="<?= $dataURI ?>" title="Sujet NSI Bac 18 juin 2025"></iframe>
    <a href="<?= lien_absolu1271($baseParams . $corrigeParam . '&corrigé') ?>">Voir le corrigé</a>
<?php endif; ?>

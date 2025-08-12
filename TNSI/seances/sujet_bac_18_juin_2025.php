<?php
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
    <a href="<?= lien_absolu1271('?session=sujet_bac_18_juin_2025') ?>">Voir l'exercice</a>
<?php else: ?>
    <iframe src="<?= $dataURI ?>" title="Sujet NSI Bac 18 juin 2025"></iframe>
    <a href="<?= lien_absolu1271('?session=sujet_bac_18_juin_2025&corrigé') ?>">Voir le corrigé</a>
<?php endif; ?>

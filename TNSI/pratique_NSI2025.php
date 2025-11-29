<?php
$num = (int)$matches[1];
if ($num >= 1 && $num <= 48) :
    $sujet = str_pad($num, 2, "0", STR_PAD_LEFT); 
    if (isset($_GET['correction']) && in_array($_GET['correction'], ['exercice1', 'exercice2'])):
        $correctionNum = htmlspecialchars($_GET['correction'][8] ?? '?');
        ?>
        <div style="margin: 0; padding: 0; height: 100vh;">
            <style>
                pre {
                    background-color: #eee;
                    color: black;
                    padding: 15px;
                    border-radius: 8px;
                    border: 1px solid #ccc;
                    overflow-x: auto;
                }
                .qJM_S3P-7Rs {
                    color: #333;
                }
            </style>
            <h1 class="qJM_S3P-7Rs">Correction Sujet <?= htmlspecialchars($sujet) ?> - Exercice <?= $correctionNum ?></h1>
            <?php
            $sujetPhp = htmlspecialchars($sujet);
            $correctionPhp = htmlspecialchars($_GET['correction'][8] ?? '?');
            $pyUrl = "https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/pratique/html/consignes/sujets/2025-NSI/{$sujetPhp}/corrige/exercice{$correctionPhp}.py";
            
            $code = @file_get_contents($pyUrl);
            
            if ($code === false) {
                $code = "Erreur de chargement du fichier Python.";
            }
            ?>
            <pre><code id="code-python"><?= htmlspecialchars($code) ?></code></pre>
            <a id="lien-py" href="<?= "?session=f.php&fichier={$sujetPhp}/corrige/exercice{$correctionPhp}.py" ?>">
                <span id="numberDuTruc"><?= htmlspecialchars($_GET['correction']) ?></span>.py
            </a>
        </div>
    <?php else: ?>
        <div>
        <h3>🔍 Consignes & Exercices</h3>
        🔗 <a href="?session=f.php&fichier=<?php echo $sujet; ?>/sujet-<?php echo $num; ?>.py">Télécharger le fichier Python</a><br>
        </div>

        <div style="margin: 1em 0; height: 100vh;">
        <?php
            function lien_absolu1270($params = '') {
                // Protocole : utilise HTTPS si la variable est définie ou le port est 443
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
                
                // Chemin : remplace 'index.php' à la fin par '/' ; sinon utilise le chemin complet
                $path = (basename($_SERVER['PHP_SELF']) === 'index.php') 
                    ? rtrim(dirname($_SERVER['PHP_SELF']), '/') . '/' 
                    : $_SERVER['PHP_SELF'];
                
                // Retourne l'URL complète
                return $protocol . $_SERVER['HTTP_HOST'] . $path . $params;
            }
        ?>
            <iframe 
                src="<?php echo lien_absolu1270("?session=pratique/sujet&file={$sujet}/25-NSI-{$num}.pdf"); ?>" 
                style="border:1px solid #ccc; border-radius:8px; width:100%; height:100%;">
            </iframe>
        </div>

        <div>
        <h3>✅ Corrections</h3>
        🔗 <a href="?session=<?php echo htmlspecialchars($_GET['session']); ?>&correction=exercice1">Voir le corrigé de l'exercice 1</a><br>
        🔗 <a href="?session=<?php echo htmlspecialchars($_GET['session']); ?>&correction=exercice2">Voir le corrigé de l'exercice 2</a>
        </div>
    <?php endif;
endif;
?>

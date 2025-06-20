<?php
  $num = (int)$matches[1];
  if ($num >= 1 && $num <= 48) :
      $sujet = str_pad($num, 2, "0", STR_PAD_LEFT); 
      if (isset($_GET['correction']) && in_array($_GET['correction'], ['exercice1', 'exercice2'])):
          $correctionNum = htmlspecialchars($_GET['correction'][8] ?? '?');
          $sujetPhp = htmlspecialchars($sujet);
          $pyUrl = "https://tifsec-nsi.rf.gd/TNSI/watch/f.php?fichier={$sujetPhp}/corrige/exercice{$correctionNum}.py";
      
          $code = @file_get_contents($pyUrl);
          if ($code === false) {
              $code = "Erreur de chargement du fichier Python.";
          }
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
      
          <h1 class="qJM_S3P-7Rs">
              Correction Sujet <?= $sujetPhp ?> - Exercice <?= $correctionNum ?>
          </h1>
      
          <pre><code><?= htmlspecialchars($code) ?></code></pre>
      </div>
      
      <?php else: ?>
          <div>
          <h3>🔍 Consignes & Exercices</h3>
          🔗 <a href="https://tifsec-nsi.rf.gd/TNSI/watch/f.php?fichier=<?php echo $sujet; ?>/sujet-<?php echo $num; ?>.py">Télécharger le fichier Python</a><br>
          </div>
  
          <div style="margin: 1em 0; height: 100vh;">
          <?php
  $pdfContent = @file_get_contents("https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/pratique/html/consignes/sujets/2025-NSI/{$sujet}/25-NSI-{$num}.pdf");
              if ($pdfContent === false) {echo "Impossible de récupérer le PDF.";exit;}
              $pdfBase64 = base64_encode($pdfContent);
          ?>
              <iframe 
                  src="data:application/pdf;base64,<?php echo $pdfBase64; ?>" 
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

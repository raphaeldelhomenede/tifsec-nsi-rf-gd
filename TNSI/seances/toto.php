<section id="sessionToto" class="content-section">
    <h2 style="margin-top: 30px; margin-bottom: 20px;">Séance Toto : Introduction aux Technologies Web</h2>

    <h3 style="margin-top: 30px; margin-bottom: 20px;">Objectifs :</h3>
    <ul>
        <li>Comprendre et implémenter une page web avec HTML, CSS et JavaScript (le côté client).</li>
        <li>Apprendre à gérer les requêtes côté serveur avec PHP et une base de données SQL.</li>
        <li>Tester ses connaissances via un QCM interactif.</li>
    </ul>

    <h3 style="margin-top: 30px; margin-bottom: 20px;">Partie 1 : Le Côté Client - HTML, CSS, JavaScript</h3>
    <p>Le côté client correspond à tout ce que l'utilisateur voit et avec lequel il interagit sur une page web. Voici comment structurer une page avec HTML, la styliser avec CSS, et ajouter de l'interactivité avec JavaScript.</p>

    <h4 style="margin-top: 20px; margin-bottom: 20px;">1. HTML (Structure de la page)</h4>
    <p>HTML est utilisé pour structurer la page web. Voici un exemple simple où nous créons une page avec un titre, un paragraphe et un bouton :</p>
    <pre><code>
	&lt;!DOCTYPE html&gt;
	&lt;html lang="fr"&gt;
	&lt;head&gt;
		&lt;meta charset="UTF-8"&gt;
		&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
		&lt;title&gt;Page Web Exemple&lt;/title&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;h1&gt;Bienvenue sur ma page Web&lt;/h1&gt;
		&lt;p&gt;C'est un exemple de page HTML simple.&lt;/p&gt;
		&lt;button&gt;Cliquer ici&lt;/button&gt;
	&lt;/body&gt;
	&lt;/html&gt;
    </code></pre>
    <p>Ce code crée une page avec un titre, un texte, et un bouton. Le bouton ne fait rien pour l'instant, mais on va le rendre interactif avec JavaScript.</p>

    <h4 style="margin-top: 20px; margin-bottom: 20px;">2. CSS (Styliser la page)</h4>
    <p>CSS est utilisé pour styliser la page. Voici comment ajouter du style à notre page :</p>
    <pre><code>
	&lt;style&gt;
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
			text-align: center;
		}
		h1 {
			color: #3498db;
		}
		button {
			padding: 10px 20px;
			font-size: 16px;
			background-color: #2ecc71;
			border: none;
			color: white;
			cursor: pointer;
		}
		button:hover {
			background-color: #27ae60;
		}
	&lt;/style&gt;
    </code></pre>
    <p>Dans cet exemple, le corps de la page a une couleur de fond gris clair, les titres sont bleus et le bouton est stylisé avec une couleur verte. On ajoute également un effet de survol au bouton.</p>

    <h4 style="margin-top: 20px; margin-bottom: 20px;">3. JavaScript (Interactivité)</h4>
    <p>JavaScript permet d'ajouter de l'interactivité à la page. Par exemple, nous allons faire en sorte que lorsque l'utilisateur clique sur le bouton, un message s'affiche.</p>
    <pre><code>
	&lt;script&gt;
		document.querySelector('button').addEventListener('click', function() {
			alert("Vous avez cliqué sur le bouton !");
		});
	&lt;/script&gt;
    </code></pre>
    <p>Dans ce code, nous utilisons JavaScript pour détecter un clic sur le bouton. Lorsqu'un utilisateur clique dessus, une fenêtre contextuelle (alert) apparaît.</p>

    <h3 style="margin-top: 30px; margin-bottom: 20px;">Partie 2 : Le Côté Serveur - PHP, SQL</h3>
    <p>Le côté serveur traite les informations, effectue des calculs, et interagit avec la base de données. Nous allons implémenter un exemple simple de formulaire qui envoie des données à un serveur PHP pour être enregistrées dans une base de données SQL.</p>

    <h4 style="margin-top: 20px; margin-bottom: 20px;">1. PHP (Traitement côté serveur)</h4>
    <p>Voici un exemple de formulaire HTML qui envoie des données au serveur PHP pour être traitées :</p>
    <pre><code>
	&lt;form action="traitement.php" method="POST"&gt;
		&lt;label for="nom"&gt;Nom :&lt;/label&gt;
		&lt;input type="text" id="nom" name="nom" required&gt;
		&lt;br&gt;
		&lt;label for="email"&gt;Email :&lt;/label&gt;
		&lt;input type="email" id="email" name="email" required&gt;
		&lt;br&gt;
		&lt;input type="submit" value="Envoyer"&gt;
	&lt;/form&gt;
    </code></pre>
    <p>Lorsque l'utilisateur soumet ce formulaire, les données sont envoyées à un script PHP (traitement.php) pour traitement. Le PHP va ensuite enregistrer ces données dans la base de données.</p>

    <h4 style="margin-top: 20px; margin-bottom: 20px;">2. Traitement PHP</h4>
    <p>Voici le code PHP pour récupérer et insérer les données dans une base de données SQL :</p>
    <pre><code>
	&lt;?php
	// Connexion à la base de données
	$conn = new mysqli("localhost", "utilisateur", "motdepasse", "ma_base_de_donnees");

	if ($conn->connect_error) {
		die("Connexion échouée: " . $conn->connect_error);
	}

	// Récupérer les données du formulaire
	$nom = $_POST['nom'];
	$email = $_POST['email'];

	// Insérer les données dans la base
	$sql = "INSERT INTO utilisateurs (nom, email) VALUES ('$nom', '$email')";

	if ($conn->query($sql) === TRUE) {
		echo "Les données ont été enregistrées avec succès.";
	} else {
		echo "Erreur: " . $sql . "&lt;br&gt;" . $conn->error;
	}

	$conn->close();
	?&gt;
    </code></pre>
    <p>Ce script récupère les informations soumises par le formulaire (nom et email), puis les insère dans une table `utilisateurs` dans la base de données. Il affiche un message de succès ou d'erreur selon le résultat de l'insertion.</p>

    <h4 style="margin-top: 20px; margin-bottom: 20px;">3. SQL (Gestion de la base de données)</h4>
    <p>Voici un exemple de requête SQL pour créer la table `utilisateurs` dans la base de données :</p>
    <pre><code>
	CREATE TABLE utilisateurs (
		id INT AUTO_INCREMENT PRIMARY KEY,
		nom VARCHAR(100) NOT NULL,
		email VARCHAR(100) NOT NULL
	);
    </code></pre>
    <p>Cette requête crée une table avec trois colonnes : `id`, `nom` et `email`. L'ID est une clé primaire auto-incrémentée, ce qui signifie qu'elle sera unique pour chaque utilisateur.</p>
<br>
    <h2>Test de Connaissances - Note sur 20</h2>
    <form action="" method="POST">
        <!-- Question 1 -->
        <h3>Question 1 : Quel est l'élément principal d'une page web HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm1" value="1"> &lt;html&gt;</label><br>
            <label><input type="radio" name="qcm1" value="2"> &lt;body&gt;</label><br>
            <label><input type="radio" name="qcm1" value="3"> &lt;head&gt;</label><br>
            <label><input type="radio" name="qcm1" value="4"> &lt;footer&gt;</label><br>
        </div>

        <!-- Question 2 -->
        <h3>Question 2 : Quelle balise est utilisée pour ajouter un lien hypertexte ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm2" value="1"> &lt;href&gt;</label><br>
            <label><input type="radio" name="qcm2" value="2"> &lt;link&gt;</label><br>
            <label><input type="radio" name="qcm2" value="3"> &lt;a&gt;</label><br>
            <label><input type="radio" name="qcm2" value="4"> &lt;button&gt;</label><br>
        </div>

        <!-- Question 3 -->
        <h3>Question 3 : Quelle est la fonction de la balise &lt;div&gt; ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm3" value="1"> Définir un style</label><br>
            <label><input type="radio" name="qcm3" value="2"> Créer une section de contenu</label><br>
            <label><input type="radio" name="qcm3" value="3"> Ajouter une image</label><br>
            <label><input type="radio" name="qcm3" value="4"> Ajouter un lien</label><br>
        </div>

        <!-- Question 4 -->
        <h3>Question 4 : Quelle propriété CSS permet de changer la couleur d'un texte ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm4" value="1"> color</label><br>
            <label><input type="radio" name="qcm4" value="2"> background-color</label><br>
            <label><input type="radio" name="qcm4" value="3"> text-color</label><br>
            <label><input type="radio" name="qcm4" value="4"> font-color</label><br>
        </div>

        <!-- Question 5 -->
        <h3>Question 5 : Quel est l'élément de base pour créer un bouton en HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm5" value="1"> &lt;input type="button"&gt;</label><br>
            <label><input type="radio" name="qcm5" value="2"> &lt;button&gt;</label><br>
            <label><input type="radio" name="qcm5" value="3"> &lt;link&gt;</label><br>
            <label><input type="radio" name="qcm5" value="4"> &lt;a&gt;</label><br>
        </div>

        <!-- Question 6 -->
        <h3>Question 6 : Quel attribut est utilisé pour spécifier une image en HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm6" value="1"> &lt;src img="image.jpg"&gt;</label><br>
            <label><input type="radio" name="qcm6" value="2"> &lt;image src="image.jpg"&gt;</label><br>
            <label><input type="radio" name="qcm6" value="3"> &lt;picture src="image.jpg"&gt;</label><br>
            <label><input type="radio" name="qcm6" value="4"> &lt;img src="image.jpg"&gt;</label><br>
        </div>

        <!-- Question 7 -->
        <h3>Question 7 : Quelle balise HTML est utilisée pour insérer un lien vers une feuille de style CSS ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm7" value="1"> &lt;style&gt;</label><br>
            <label><input type="radio" name="qcm7" value="2"> &lt;link&gt;</label><br>
            <label><input type="radio" name="qcm7" value="3"> &lt;script&gt;</label><br>
            <label><input type="radio" name="qcm7" value="4"> &lt;css&gt;</label><br>
        </div>

        <!-- Question 8 -->
        <h3>Question 8 : Quel est le bon attribut pour insérer un titre dans une page HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm8" value="1"> &lt;heading&gt;</label><br>
            <label><input type="radio" name="qcm8" value="2"> &lt;header&gt;</label><br>
            <label><input type="radio" name="qcm8" value="3"> &lt;h1&gt;</label><br>
            <label><input type="radio" name="qcm8" value="4"> &lt;title&gt;</label><br>
        </div>

        <!-- Question 9 -->
        <h3>Question 9 : Comment commence un commentaire en CSS ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm9" value="1"> // Commentaire</label><br>
            <label><input type="radio" name="qcm9" value="2"> /* Commentaire */</label><br>
            <label><input type="radio" name="qcm9" value="3"> &lt;!-- Commentaire --&gt; </label><br>
            <label><input type="radio" name="qcm9" value="4"> # Commentaire </label><br>
        </div>

        <!-- Question 10 -->
        <h3>Question 10 : Quel type de données renvoie une requête SQL ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm10" value="1"> Texte brut</label><br>
            <label><input type="radio" name="qcm10" value="2"> JSON</label><br>
            <label><input type="radio" name="qcm10" value="3"> Résultats sous forme de tableau</label><br>
            <label><input type="radio" name="qcm10" value="4"> Objet JavaScript</label><br>
        </div>

        <!-- Question 11 -->
        <h3>Question 11 : Quelle balise est utilisée pour ajouter un lien vers un fichier JavaScript ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm11" value="1"> &lt;js&gt;</label><br>
            <label><input type="radio" name="qcm11" value="2"> &lt;script&gt;</label><br>
            <label><input type="radio" name="qcm11" value="3"> &lt;link&gt;</label><br>
            <label><input type="radio" name="qcm11" value="4"> &lt;source&gt;</label><br>
        </div>

        <!-- Question 12 -->
        <h3>Question 12 : En JavaScript, comment déclare-t-on une variable ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm12" value="1"> all of the above</label><br>
            <label><input type="radio" name="qcm12" value="2"> let</label><br>
            <label><input type="radio" name="qcm12" value="3"> const</label><br>
            <label><input type="radio" name="qcm12" value="4"> var</label><br>
        </div>

        <!-- Question 13 -->
        <h3>Question 13 : Comment insérer un commentaire multi-lignes en JavaScript ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm13" value="1"> /* Commentaire */</label><br>
            <label><input type="radio" name="qcm13" value="2"> // Commentaire</label><br>
            <label><input type="radio" name="qcm13" value="3"> &lt;!-- Commentaire --&gt; </label><br>
            <label><input type="radio" name="qcm13" value="4"> # Commentaire </label><br>
        </div>

        <!-- Question 14 -->
        <h3>Question 14 : Quelle est la bonne syntaxe pour une condition if en JavaScript ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm14" value="1"> if {} </label><br>
            <label><input type="radio" name="qcm14" value="2"> if condition {} </label><br>
            <label><input type="radio" name="qcm14" value="3"> if [condition] {} </label><br>
            <label><input type="radio" name="qcm14" value="4"> if (condition) {} </label><br>
        </div>

        <!-- Question 15 -->
        <h3>Question 15 : Quelle est la fonction de la balise &lt;head&gt; en HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm15" value="1"> Contient les éléments de structure</label><br>
            <label><input type="radio" name="qcm15" value="2"> Contient le contenu visible de la page</label><br>
            <label><input type="radio" name="qcm15" value="3"> Contient les informations de métadonnées</label><br>
            <label><input type="radio" name="qcm15" value="4"> Contient les liens externes</label><br>
        </div>

        <!-- Question 16 -->
        <h3>Question 16 : Comment ajouter une image en HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm16" value="1"> &lt;img src="image.jpg"&gt;</label><br>
            <label><input type="radio" name="qcm16" value="2"> &lt;picture src="image.jpg"&gt;</label><br>
            <label><input type="radio" name="qcm16" value="3"> &lt;image src="image.jpg"&gt;</label><br>
            <label><input type="radio" name="qcm16" value="4"> &lt;src img="image.jpg"&gt;</label><br>
        </div>

        <!-- Question 17 -->
        <h3>Question 17 : Quelle balise est utilisée pour créer un paragraphe en HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm17" value="1"> &lt;section&gt;</label><br>
            <label><input type="radio" name="qcm17" value="2"> &lt;p&gt;</label><br>
            <label><input type="radio" name="qcm17" value="3"> &lt;div&gt;</label><br>
            <label><input type="radio" name="qcm17" value="4"> &lt;article&gt;</label><br>
        </div>

        <!-- Question 18 -->
        <h3>Question 18 : En CSS, quel sélecteur est utilisé pour cibler un élément avec une classe spécifique ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm18" value="1"> .class</label><br>
            <label><input type="radio" name="qcm18" value="2"> #id</label><br>
            <label><input type="radio" name="qcm18" value="3"> class</label><br>
            <label><input type="radio" name="qcm18" value="4"> &lt;class&gt;</label><br>
        </div>

        <!-- Question 19 -->
        <h3>Question 19 : Comment déclare-t-on une variable en PHP ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm19" value="1"> let variable</label><br>
            <label><input type="radio" name="qcm19" value="2"> &lt;variable&gt;</label><br>
            <label><input type="radio" name="qcm19" value="3"> var variable</label><br>
            <label><input type="radio" name="qcm19" value="4"> $variable</label><br>
        </div>

        <!-- Question 20 -->
        <h3>Question 20 : Quelle balise permet de structurer le contenu principal d'une page HTML ?</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
            <label><input type="radio" name="qcm20" value="1"> &lt;section&gt;</label><br>
            <label><input type="radio" name="qcm20" value="2"> &lt;main&gt;</label><br>
            <label><input type="radio" name="qcm20" value="3"> &lt;content&gt;</label><br>
            <label><input type="radio" name="qcm20" value="4"> &lt;body&gt;</label><br>
        </div>

        <div style="display: flex; align-items: center; justify-content: center;">
            <input type="submit" value="Soumettre le Test">
        </div>
    </form>
    <?php
    $bonnes_reponses = [
        'qcm1' => '1',
        'qcm2' => '3',
        'qcm3' => '2',
        'qcm4' => '1',
        'qcm5' => '2',
        'qcm6' => '4',
        'qcm7' => '2',
        'qcm8' => '4',
        'qcm9' => '2',
        'qcm10' => '3',
        'qcm11' => '2',
        'qcm12' => '4',
        'qcm13' => '1',
        'qcm14' => '4',
        'qcm15' => '3',
        'qcm16' => '1',
        'qcm17' => '2',
        'qcm18' => '1',
        'qcm19' => '4',
        'qcm20' => '2',
    ];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Vérifie si le formulaire a été soumis
        $note = 0;
        foreach ($bonnes_reponses as $key => $valeur) {
            if (isset($_POST[$key]) && $_POST[$key] == $valeur) {
                $note++;
            }
        }
    
        if ($note === 20) {
            echo "<h2>Félicitations, vous avez " . $note . "/20!</h2>";
        } elseif ($note >= 10 && $note < 20) {
            echo "<h2>Bravo, vous avez " . $note . "/20. Vous pouvez mieux faire.</h2>";
        } elseif ($note >= 0 && $note < 10) {
            echo "<h2>Oh mince, vous avez " . $note . "/20. Ce qui n'est pas la moyenne.</h2>";
        } else {
            echo "";
        }
    }
    ?>
</section>
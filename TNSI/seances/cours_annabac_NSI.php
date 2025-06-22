<?php
$content = @file_get_contents("https://www.google.com");

if ($content === false) {
    echo "Problème avec file_get_contents !";
} else {
    echo "Ça fonctionne !";
}

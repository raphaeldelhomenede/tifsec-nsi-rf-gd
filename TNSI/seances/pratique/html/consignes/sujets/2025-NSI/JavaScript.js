window.addEventListener('DOMContentLoaded', () => {
    const path = window.location.pathname;
    const parts = path.split('/');

    const numberDuSujet = document.getElementById('number-du-sujet');
    const numberDuExercice = document.getElementById('number-du-exercice');
    const numberDuTruc = document.getElementById('numberDuTruc');
    const lienPy = document.getElementById('lien-py');
    const codePython = document.getElementById('code-python');

    const sujet = parts[parts.indexOf('2025-NSI') + 1];
    const fichierHtml = parts[parts.length - 1];
    const baseFilename = fichierHtml.replace('.html', '');
    const match = baseFilename.match(/exercice(\d+)/);
    const exercice = match ? match[1] : '?';

    if (numberDuSujet) numberDuSujet.innerText = sujet;
    if (numberDuExercice) numberDuExercice.innerText = exercice;
    if (numberDuTruc) numberDuTruc.innerText = baseFilename;
    if (lienPy) lienPy.href = baseFilename + '.py';

    document.title = "Correction Sujet " + sujet + " - Exercice " + exercice;

    const favicon = document.createElement('link');
    favicon.rel = 'icon';
    favicon.type = 'image/x-icon';
    favicon.href = 'https://www.umbro.fr/img/favicon.ico?1740388190';
    document.head.appendChild(favicon);

    const stylesheet = document.createElement('link');
    stylesheet.rel = 'stylesheet';
    stylesheet.href = 'https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/pratique/html/consignes/sujets/2025-NSI/JavaScript.css';
    document.head.appendChild(stylesheet);

    fetch(baseFilename + '.py')
        .then(response => response.text())
        .then(code => {
            codePython.innerText = code;
        })
        .catch(error => {
            codePython.innerText = "Erreur de chargement du code.";
            console.error("Erreur lors du chargement du fichier Python :", error);
        });
});

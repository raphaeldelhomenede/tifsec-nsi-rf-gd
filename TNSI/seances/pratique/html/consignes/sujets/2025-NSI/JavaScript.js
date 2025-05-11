const path = window.location.pathname;
const numberDuSujet = document.getElementById('number-du-sujet');
const numberDuExercice = document.getElementById('number-du-exercice');
const numberDuTruc = document.getElementById('numberDuTruc');
const lienPy = document.getElementById('lien-py');

const parts = path.split('/');
const sujet = parts[parts.indexOf('2025-NSI') + 1];
numberDuSujet.innerText = sujet;

const fichierHtml = parts[parts.length - 1];
const baseFilename = fichierHtml.replace('.html', '');
numberDuTruc.innerText = baseFilename;

const match = baseFilename.match(/exercice(\d+)/);
const exercice = match ? match[1] : '?';
numberDuExercice.innerText = exercice;

lienPy.href = baseFilename + ".py";
document.title = "Correction Sujet " + sujet + " - Exercice " + exercice;

const link = document.createElement('link');
link.rel = 'icon';
link.type = 'image/x-icon';
link.href = 'https://www.umbro.fr/img/favicon.ico?1740388190';
document.head.appendChild(link);

const link = document.createElement('link');
link.rel = 'stylesheet';
link.href = 'https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/pratique/html/consignes/sujets/2025-NSI/JavaScript.css';
document.head.appendChild(link);

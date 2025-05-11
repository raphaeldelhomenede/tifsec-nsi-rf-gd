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

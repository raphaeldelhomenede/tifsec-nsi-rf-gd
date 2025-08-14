<style>
@import url('https://thesevendeadlysinsds.github.io/tototititututytytataTravisScott/fonts/s/arima/v6/css2.css');

#time, #time1 {
    box-sizing: border-box;
    margin-top: -100px;
    font-weight: 1000;
    font-size: 15vw; /* 👈 taille adaptative */
    color: #333;
    font-family: "Roboto", sans-serif;
}

noscript {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    margin-top: 30px;
    color: red;
    font-size: 1rem;
    font-family: "Roboto", sans-serif;
}

noscript a {
    color: #0066cc;
}
</style>
<div id="time"></div>
<noscript>
<p>
    Activez JavaScript pour connaître l'heure (bon, bien sûr, ça ne protègera pas la France puisque c'est Python).
    <br>
    <a href="https://www.enable-javascript.com/fr/" target="_blank" rel="noopener noreferrer">
        Cliquez ici pour savoir comment activer JavaScript
    </a>
</p>
</noscript>

<script>
function updateTime() {
fetch('?time_is1&dmY')
    .then(response => response.text())
    .then(time => {
        document.getElementById('time').textContent = time;
    })
    .catch(err => {
        document.getElementById('time').textContent = 'Erreur de chargement';
        console.error(err);
    });
}
updateTime();
setInterval(updateTime, 1000);
</script>

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

fetch('https://raphaeldelhomenede.github.io/tifsec-nsi-rf-gd/TNSI/seances/data-fonts.json')
    .then(response => response.json())
    .then(fontStyles => {
        let font = getQueryParam('font');
        let link = document.createElement('link');
        link.rel = 'stylesheet';

        if (fontStyles[font]) {
            link.href = fontStyles[font].link;
        } else {
            link.href = fontStyles["default"].link;
        }

        document.head.appendChild(link);
    })
    .catch(error => console.error("Erreur de chargement du JSON:", error));

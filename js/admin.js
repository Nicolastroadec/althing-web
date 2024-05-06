document.addEventListener("DOMContentLoaded", function () {
    // Variable pour stocker l'ID de l'intervalle de recherche
    let getFieldNamesInterval;

    // Fonction pour créer et afficher la liste des champs
    function createFieldList(fieldNames) {
        // Créer une liste non ordonnée
        let ul = document.createElement('ul');

        // Parcourir les noms de champs
        fieldNames.forEach(fieldName => {
            // Créer un élément de liste pour chaque nom de champ
            let li = document.createElement('li');
            li.innerText = fieldName;
            ul.appendChild(li);
        });

        // Ajouter la liste à l'élément .acf-field-setting-sub_fields
        document.querySelector('.acf-field-setting-sub_fields').appendChild(ul);

        let copyButton = document.createElement('div');
        copyButton.innerText = 'Copier la liste';

        copyButton.style.padding = '1rem';
        copyButton.style.border = '1px solid black';
        copyButton.style.background = 'white';
        copyButton.style.width = '100px';
        copyButton.style.textAlign = 'center';
        copyButton.style.borderRadius = '15px';
        copyButton.style.cursor = 'pointer';


        copyButton.addEventListener('click', function () {
            // Créer un textarea pour stocker la liste copiée
            let textarea = document.createElement('textarea');
            textarea.value = fieldNames.join('\n');
            document.body.appendChild(textarea);

            // Sélectionner le texte dans le textarea et le copier
            textarea.select();
            document.execCommand('copy');

            // Supprimer le textarea après la copie
            document.body.removeChild(textarea);

            e.preventDefault();
        });



        // Ajouter le bouton à la liste
        ul.appendChild(copyButton);
        // Arrêter l'intervalle de recherche
        clearInterval(getFieldNamesInterval);
    }

    // Fonction pour rechercher les noms de champs ACF
    let i = 0;
    function findFieldNames() {
        i++;
        // Récpérer tous les éléments avec la classe .acf-field-name
        let acfFieldNames = document.querySelectorAll('.li-field-name');
        console.log(acfFieldNames);
        // Vérifier s'il y a des champs trouvés
        if (acfFieldNames.length > 0) {
            // Si des champs sont trouvés, créer et afficher la liste
            createFieldList(Array.from(acfFieldNames).map(field => field.innerText));
        }
        if (i === 50) {
            clearInterval(getFieldNamesInterval);
        }
    }

    // Lancer la recherche des noms de champs toutes les 100 millisecondes
    getFieldNamesInterval = setInterval(findFieldNames, 100);


});

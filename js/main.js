
closeBrevoPopup();

function closeBrevoPopup() {
    let closeBrevoPopup = document.getElementById('close-brevo-popup');
    let brevoPopup = document.getElementById('sib_signup_form_1');

    if (closeBrevoPopup && brevoPopup) {
        closeBrevoPopup.addEventListener('click', function () {
            brevoPopup.style.display = 'none';
        })
    }
}


function formIsSent(message) {
    let contactForm = document.querySelector('#screen-3');
    contactForm.style.display = 'none';
    let div = document.createElement('div');
    div.innerText = message;
    let cfsc = document.querySelector('#chatbot');
    cfsc.appendChild(div);
}


function handleForm() {
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("screen-3").addEventListener("submit", function (event) {

            event.preventDefault(); // Empêche la soumission du formulaire par défaut
            var formData = new FormData(this);

            grecaptcha.ready(function () {
                grecaptcha.execute('6Lcm0cspAAAAAGM74sS6RXqjDjWtttOfrz7Wuz-Q', { action: 'submit' }).then(function (token) {

                    // Envoie les données pour l'enregistrement en base de données
                    fetch('https://mobin.nicolastroadec.fr/wp-json/myplugin/v1/submit-form', {
                        method: 'POST',
                        body: formData
                    }).then(response => response.text()).then(message => formIsSent(message));
                });

            });
        });
    })
}
handleForm();

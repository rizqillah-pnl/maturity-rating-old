/**
* PHP Email Form Validation - v3.6
* URL: https://bootstrapmade.com/php-email-form/
* Author: BootstrapMade.com
*/
(function () {
    "use strict";

    //   let forms = document.querySelectorAll('.php-email-form');

    //   forms.forEach( function(e) {
    //     e.addEventListener('submit', function(event) {
    //       event.preventDefault();

    //       let thisForm = this;

    //       let action = thisForm.getAttribute('action');
    //       let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');

    //       if( ! action ) {
    //         displayError(thisForm, 'The form action property is not set!');
    //         return;
    //       }
    //       thisForm.querySelector('.loading').classList.add('d-block');
    //       thisForm.querySelector('.error-message').classList.remove('d-block');
    //       thisForm.querySelector('.sent-message').classList.remove('d-block');

    //       let formData = new FormData( thisForm );

    //       if ( recaptcha ) {
    //         if(typeof grecaptcha !== "undefined" ) {
    //           grecaptcha.ready(function() {
    //             try {
    //               grecaptcha.execute(recaptcha, {action: 'php_email_form_submit'})
    //               .then(token => {
    //                 formData.set('recaptcha-response', token);
    //                 php_email_form_submit(thisForm, action, formData);
    //               })
    //             } catch(error) {
    //               displayError(thisForm, error);
    //             }
    //           });
    //         } else {
    //           displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
    //         }
    //       } else {
    //         php_email_form_submit(thisForm, action, formData);
    //       }
    //     });
    //   });

    //   function php_email_form_submit(thisForm, action, formData) {
    //     fetch(action, {
    //       method: 'POST',
    //       body: formData,
    //       headers: {'X-Requested-With': 'XMLHttpRequest'}
    //     })
    //     .then(response => {
    //       if( response.ok ) {
    //         return response.text();
    //       } else {
    //         throw new Error(`${response.status} ${response.statusText} ${response.url}`);
    //       }
    //     })
    //     .then(data => {
    //       thisForm.querySelector('.loading').classList.remove('d-block');
    //       if (data.trim() == 'OK') {
    //         thisForm.querySelector('.sent-message').classList.add('d-block');
    //         thisForm.reset();
    //       } else {
    //         throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action);
    //       }
    //     })
    //     .catch((error) => {
    //       displayError(thisForm, error);
    //     });
    //   }

    //   function displayError(thisForm, error) {
    //     thisForm.querySelector('.loading').classList.remove('d-block');
    //     thisForm.querySelector('.error-message').innerHTML = error;
    //     thisForm.querySelector('.error-message').classList.add('d-block');
    //   }


    const form = document.forms['contact-form-sireka'];

    form.addEventListener('submit', e => {
        let loading = document.querySelector('.loading');
        loading.classList.add('d-block');
        let error = document.querySelector('.error-message');
        let success = document.querySelector('.sent-message');
        e.preventDefault()
        fetch('https://script.google.com/macros/s/AKfycbxY5a5mz1iL68DuSKDi6iQ1NvIS0xhGiDNRdt_l_xnXxXUjt1SVziBDLap_0aBOmwtU/exec', {
            method: 'POST',
            body: new FormData(form)
        })
            .then((res) => {
                loading.classList.remove('d-block')
                success.classList.add('d-block')
            })
            .catch((err) => {
                loading.classList.remove('d-block')
                error.classList.add('d-block');
                error.innerHTML = err.message;
            });

    })

})();

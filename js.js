(() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {

        form.addEventListener('submit', event => {

            event.preventDefault();
            event.stopPropagation();

            if (!form.checkValidity()) {

                form.classList.add('was-validated');

            } else {

                form.classList.add('was-validated');
                form.submit();

            }

        }, false);

    });

})();



window.addEventListener("scroll", function(){

    const navbar = document.querySelector(".custom-nav");

    navbar.classList.toggle("shadow-lg", window.scrollY > 50);

});



const cards = document.querySelectorAll(".custom-card");

window.addEventListener("scroll", () => {

    cards.forEach(card => {

        const cardTop = card.getBoundingClientRect().top;

        if(cardTop < window.innerHeight - 100){

            card.style.opacity = "1";
            card.style.transform = "translateY(0px)";
        }

    });

});

cards.forEach(card => {

    card.style.opacity = "0";
    card.style.transform = "translateY(50px)";
    card.style.transition = "all 0.8s";

});
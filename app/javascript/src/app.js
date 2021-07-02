let accordions = document.querySelectorAll('.js-accordion-toggle');
if (accordions) {
    accordions.forEach((button, index) => {
        button.addEventListener('click', () => {
            button.parentElement.classList.toggle('is-active');
            if (button.parentElement.classList.contains('is-active')) {
                // Add an icon here
                button.lastElementChild.outerHTML = '<img src="app/images/icons/arrow__down-red.svg" aria-hidden="true">';
            }
        });

        // If focused ...
        button.addEventListener('focus', () => {
            // Add focus events here
        });

        button.addEventListener('blur', () => {
            // Add blur events here
        });
    })
}
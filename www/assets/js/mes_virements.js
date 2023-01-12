
console.log("salut")
// DEBUT DES ONCLICK / NONECLICK
let virement = document.querySelector('#virement');
let virementOnClick = document.querySelector('#virementOnClick');

let deposer = document.querySelector('#deposer');
let deposerOnClick = document.querySelector('#deposerOnClick');

let retirer = document.querySelector('#retirer');
let retirerOnClick = document.querySelector('#retirerOnClick');
// FIN DES ONCLICK / NONECLICK

// DEBUT DES PAGES
let virementForm = document.querySelector('#virement_form');
let deposerForm = document.querySelector('#deposer_form');
let retirerForm = document.querySelector('#retirer_form');

// FIN DES PAGES


document.onload = block();

function block() {
    virementOnClick.style.display = 'none';
    deposerOnClick.style.display = 'none';
    retirerOnClick.style.display = 'none';

    deposerForm.style.display = 'none'
    retirerForm.style.display = 'none'
    virementForm.style.display = 'none'
} 

document.getElementById("deposer").addEventListener('click', () => {
    const form = document.getElementById('#deposer_form');

if (deposerOnClick.style.display === 'none') {
    // Montre le form mail et cache le form mdp

    virementOnClick.style.display = 'none'
    deposerOnClick.style.display = 'block'
    retirerOnClick.style.display = 'none'

    virement.style.display = 'block'
    deposer.style.display = 'none'
    retirer.style.display = 'block'

    deposerForm.style.display = 'block'
    retirerForm.style.display = 'none'
    virementForm.style.display = 'none'



} else {
    // Cache le form mail

}
});
document.getElementById("retirer").addEventListener('click', () => {
    const form = document.getElementById('#retirer_form');

if (retirerOnClick.style.display === 'none') {
    // Montre le form mail et cache le form mdp

    virementOnClick.style.display = 'none'
    deposerOnClick.style.display = 'none'
    retirerOnClick.style.display = 'block'

    virement.style.display = 'block'
    deposer.style.display = 'block'
    retirer.style.display = 'none'

    deposerForm.style.display = 'none'
    retirerForm.style.display = 'block'
    virementForm.style.display = 'none'


} else {
    // Cache le form mail

}
});
document.getElementById("virement").addEventListener('click', () => {
    const form = document.getElementById('#virement_form');

if (virementOnClick.style.display === 'none') {
    // Montre le form mail et cache le form mdp

    virementOnClick.style.display = 'block'
    deposerOnClick.style.display = 'none'
    retirerOnClick.style.display = 'none'

    virement.style.display = 'none'
    deposer.style.display = 'block'
    retirer.style.display = 'block'

    deposerForm.style.display = 'none'
    retirerForm.style.display = 'none'
    virementForm.style.display = 'block'

} else {
    // Cache le form mail

}
});



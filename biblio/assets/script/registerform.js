document.addEventListener("DOMContentLoaded", () => {
    const p1 = document.querySelector('#p1');
    const p2 = document.querySelector('#p2');
    const btn = document.querySelector('#btn');
    function validate() {
        if (p1.value != p2.value) {
            p2.setCustomValidity("Passwords Don't Match");
            btn.setAttribute('disabled',true);
        }
        else {
            p2.setCustomValidity('');
            btn.removeAttribute('disabled');
            console.log('Пароли совпали')
        }
            
    }
    p1.addEventListener('keyup',validate);
    p2.addEventListener('keyup',validate);
});
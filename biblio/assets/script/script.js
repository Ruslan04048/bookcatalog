document.addEventListener("DOMContentLoaded", () => {
    const bar = document.querySelector('#bar');
    const menu = document.querySelector('#menu')
    bar.addEventListener('click', () => {
        if (menu.style.display == '') {
            menu.style.display = 'block';
        }
        else {
            menu.style.display = '';
        }
    })
})
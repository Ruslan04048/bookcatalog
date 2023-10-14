document.addEventListener("DOMContentLoaded", () => {
    const booksbtn = document.querySelector('#booksbtn');
    const books = document.querySelector('#books');
    const addbtn = document.querySelector('#addbtn');
    const add = document.querySelector('#add');
    const userbtn = document.querySelector('#userbtn');
    const user = document.querySelector('#user');

    function show(e) {
        books.style.display = 'none';
        add.style.display = 'none';
        user.style.display = 'none';
        booksbtn.removeAttribute('selected');
        addbtn.removeAttribute('selected');
        userbtn.removeAttribute('selected');

        if (e.target == booksbtn) {
            e.target.setAttribute('selected',true);
            books.style.display = 'block';
        }
        else if (e.target == addbtn){
            e.target.setAttribute('selected',true);
            add.style.display = 'block';
        }
        
        else {
            e.target.setAttribute('selected',true);
            user.style.display = 'block';
        }
    }
    booksbtn.addEventListener('click', (e) => show(e));
    userbtn.addEventListener('click', (e) => show(e));
    addbtn.addEventListener('click', (e) => show(e));
})
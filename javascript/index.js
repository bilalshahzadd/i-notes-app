// selecting html elements
let form = document.getElementById('formContainer');
let toggleShow = document.getElementById('toggleShow');
let toggleHide = document.getElementById('toggleHide');

// disappearing form and hide button at the first visit
if (form.style.display !== 'none' && toggleHide.style.display !== 'none') {
    form.style.display = 'none';
    toggleHide.style.display = 'none';
}

// event listener to show the form
toggleShow.addEventListener('click', () => {
    form.style.display = 'block';
    toggleHide.style.display = 'block';
    toggleShow.style.display = 'none';
})

// event listener to hide the form
toggleHide.addEventListener('click', () => {
    form.style.display = 'none';
    toggleHide.style.display = 'none';
    toggleShow.style.display = 'block';
})
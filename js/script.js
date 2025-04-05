const searchBar = document.createElement('input');
searchBar.classList.add('search-bar');
searchBar.type = 'date';
searchBar.name = 'barraPesquisa';
searchBar.required = true;
const divLogo = document.querySelector('.div-logo');
const navBar = document.querySelector('.nav-bar');
const header = document.querySelector('header');
const search = document.createElement('div');
search.classList.add('search');
const searchButton = document.createElement('button');
searchButton.classList.add('search-btn');
searchButton.textContent = 'Look to for';
searchButton.name = 'pesquisar';
const form = document.createElement('form');
form.method = 'post';
form.classList.add('search-form');
const btnClose = document.createElement('p');
btnClose.classList.add('close-search');
btnClose.textContent = "X";
search.appendChild(searchBar);
search.appendChild(searchButton);
form.appendChild(search);

btnClose.addEventListener("click", () => {
    divLogo.style.display = 'flex';
    navBar.style.display = 'flex';
    header.style.justifyContent = 'space-between';
    header.removeChild(form)
    header.removeChild(btnClose);

});

function openSearchBar(){
    divLogo.style.display = 'none';
    navBar.style.display = 'none';
    header.style.justifyContent = 'center';
    header.appendChild(form);
    header.appendChild(btnClose);
}
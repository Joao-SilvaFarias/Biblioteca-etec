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
searchButton.textContent = 'Pesquisar';
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
const formSair = document.createElement('form');
formSair.method = 'post';
formSair.classList.add('form-sair');
const btnClosePopUp = document.createElement('div');
btnClosePopUp.classList.add('btn-close-pop-up');
btnClosePopUp.textContent = "X";
const titlePopUp = document.createElement('h1');
titlePopUp.classList.add('title-pop-up');
titlePopUp.textContent = "Tem certeza?";
const pPopUp = document.createElement('p');
pPopUp.classList.add('p-pop-up');
pPopUp.textContent = "Aviso de segurança. Você está prestes a encerrar sua sessão. Sair encerrará todas as atividades em andamento";
const btnContinuar = document.createElement('div');
btnContinuar.classList.add('btn-continuar');
btnContinuar.textContent = "Continuar"
const btnSair = document.createElement('button');
btnSair.classList.add('btn-sair');
btnSair.name = 'btnSair';
btnSair.textContent = "Sair";
const divFormSair1 = document.createElement('div');
const divFormSair2 = document.createElement('div');
divFormSair1.classList.add('div-form-sair');
divFormSair2.classList.add('div-form-sair');
divFormSair2.style.justifyContent = 'space-around';
divFormSair1.appendChild(titlePopUp);
divFormSair1.appendChild(btnClosePopUp);
divFormSair2.appendChild(btnContinuar);
divFormSair2.appendChild(btnSair);
formSair.appendChild(divFormSair1);
formSair.appendChild(pPopUp);
formSair.appendChild(divFormSair2);
const overlay = document.createElement('div');
overlay.style.position = 'fixed';
overlay.style.top = '0';
overlay.style.left = '0';
overlay.style.width = '100%';
overlay.style.height = '100%';
overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
overlay.style.zIndex = '2';
overlay.style.backdropFilter = 'blur(3px)';
formSair.style.zIndex = '3';


document.querySelector('#inicial').addEventListener("click", () => {
    openFormSair();
});

btnClosePopUp.addEventListener("click", () => {
    closeFormSair();
});

btnContinuar.addEventListener("click", () => {
    closeFormSair();
});

function openFormSair() {
    document.body.appendChild(formSair);
    document.body.appendChild(overlay);
}

function closeFormSair() {
    document.body.removeChild(formSair);
    document.body.removeChild(overlay);
}


btnClose.addEventListener("click", () => {
    divLogo.style.display = 'flex';
    navBar.style.display = 'flex';
    header.style.justifyContent = 'space-between'
    header.removeChild(form)
    header.removeChild(btnClose);

});

function openSearchBar() {
    divLogo.style.display = 'none';
    navBar.style.display = 'none';
    header.style.justifyContent = 'center';
    header.appendChild(form);
    header.appendChild(btnClose);
}
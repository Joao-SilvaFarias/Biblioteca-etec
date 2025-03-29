function abrirForm(id, data, qtdEmprestimos, qtdDevolvidos, qtdRenovacoes){
    document.querySelector('.id').value = id;
    document.querySelector('#emprestimos').value = qtdEmprestimos;
    document.querySelector('#devolvidos').value = qtdDevolvidos;
    document.querySelector('#renovacoes').value = qtdRenovacoes;
    document.querySelector('.form-registros-atualizar').style.display = 'flex';
}
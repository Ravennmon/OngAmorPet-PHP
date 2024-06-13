document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('phone')?.addEventListener('input', maskPhone);
    document.getElementById('cnpj')?.addEventListener('input', cnpjMask);
    document.getElementById('cpf')?.addEventListener('input', cpfMask);
    document.getElementById('zipcode')?.addEventListener('input', cepMask);
    document.getElementById('zipcode')?.addEventListener('blur', seachCep);
})

const maskPhone = (e) => {
    let input = e.target.value;
    input = input.replace(/\D/g, ''); 

    if (input.length > 0) {
        input = '(' + input;
    }
    if (input.length > 3) {
        input = input.slice(0, 3) + ') ' + input.slice(3);
    }
    if (input.length > 9) {
        input = input.slice(0, 10) + '-' + input.slice(10, 14);
    }

    e.target.value = input;
}

const cnpjMask = (e) => {
    let input = e.target.value;
    input = input.replace(/\D/g, '');

    if (input.length > 2) {
        input = input.slice(0, 2) + '.' + input.slice(2);
    }
    if (input.length > 6) {
        input = input.slice(0, 6) + '.' + input.slice(6);
    }
    if (input.length > 10) {
        input = input.slice(0, 10) + '/' + input.slice(10);
    }
    if (input.length > 15) {
        input = input.slice(0, 15) + '-' + input.slice(15, 17);
    }

    e.target.value = input;
}

const cpfMask = (e) => {
    let input = e.target.value;
    input = input.replace(/\D/g, '');

    if (input.length > 3) {
        input = input.slice(0, 3) + '.' + input.slice(3);
    }
    if (input.length > 7) {
        input = input.slice(0, 7) + '.' + input.slice(7);
    }
    if (input.length > 11) {
        input = input.slice(0, 11) + '-' + input.slice(11);
    }

    if (input.length > 14) {
        input = input.slice(0, 14);
    }

    e.target.value = input;
}

const cepMask = (e) => {
    let input = e.target.value;
    input = input.replace(/\D/g, '');

    if (input.length > 5) {
        input = input.slice(0, 5) + '-' + input.slice(5);
    }

    if (input.length > 9) {
        input = input.slice(0, 9);
    }

    e.target.value = input;
}

const seachCep = async (e) => {
    let cep = e.target.value;
    cep = cep.replace(/\D/g, '');

    if (cep.length !== 8) {
        return;
    }

    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
    const data = await response.json();

    if (data.erro) {
        alert('CEP não encontrado');
        return;
    }

    document.getElementById('address').value = data.logradouro;
    document.getElementById('neighborhood').value = data.bairro;
    document.getElementById('city').value = data.localidade;
    document.getElementById('state').value = data.uf;
}
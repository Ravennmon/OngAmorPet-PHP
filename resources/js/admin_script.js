document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('phone')?.addEventListener('input', maskPhone);
    document.getElementById('cnpj')?.addEventListener('input', cnpjMask);
    document.getElementById('cpf')?.addEventListener('input', cpfMask);
    document.getElementById('zipcode')?.addEventListener('input', cepMask);
    document.getElementById('zipcode')?.addEventListener('blur', seachCep);
})

const store = (endpoint) => {
    const formElements = document.querySelectorAll('.form');
    let formData = {};

    formElements.forEach(element => {
        if(element.name.includes('_id')){
            formData[element.name] = element.value ? parseInt(element.value) : null;
        } else {
            formData[element.name] = element.value;
        }
        
    });

    fetch(`/admin/${endpoint}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        if(data.id){
            window.location.href = `/admin/${endpoint}`;
        } else {
            setErrors(data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

const update = (endpoint) => {
    const formElements = document.querySelectorAll('.form');
    let formData = {};


    formElements.forEach(element => {
        formData[element.name] = element.value;
        });
    console.log(formData);

    fetch(`/admin/${endpoint}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        if(data === true){
            window.location.reload();
        } else {
            setErrors(data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

const destroy = (endpoint) => {
    fetch(`/admin/${endpoint}`, {
        method: 'DELETE'
    })
    .then(() => {
        window.location.reload();
    })
    .catch(err => console.error(err));

}

const setErrors = (errors) => {
    document.querySelector('#sucess-message')?.remove();

    const formElements = document.querySelectorAll('.form');
    formElements.forEach(element => {
        element.classList.remove('is-invalid');
    });

    const errorDivs = document.querySelectorAll('.invalid-feedback');
    errorDivs.forEach(errorDiv => errorDiv.remove());

    if (errors) {
        Object.keys(errors).forEach(error => {
            const element = document.querySelector(`[name="${error}"]`);
            element.classList.add('is-invalid');
            
            const errorDiv = document.createElement('div');
            errorDiv.classList.add('invalid-feedback');
            errorDiv.innerHTML = errors[error];
            element.insertAdjacentElement('afterend', errorDiv);
        });
    }
}

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
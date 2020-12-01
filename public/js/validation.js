const form = document.getElementById('form');
var input_client_name = form.client_name;
var input_seller = form.seller;
var input_value = form.value;
var input_date = form.date;
var text_description = form.description;

function changeFieldValue(e) {
    var value = input_value.value;

    if (isNaN(parseFloat(value))) {
        value = value.replace(/[a-z]/gi, '');
    }

    if(value.indexOf(',') > 0) {
        value = value.replace(/,/gi, '.');
    }

    value = parseFloat(value);
    e.value = value;
}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    if (input_client_name.value == '') {
        alert('Cliente não informado');
        return;
    }

    if (input_seller.value == '') {
        alert('Vendedor não informado');
        return;
    }

    if (input_value.value == '') {
        alert('Valor não informado');
        return;
    }

    if (input_date.value == '') {
        alert('Data não informada');
        return;
    }

    if (text_description.value == '') {
        alert('Descrição não informada');
        return;
    }

    form.submit();
});
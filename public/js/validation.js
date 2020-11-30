const form_create = document.getElementById('form-create');
var input_client_name = form_create.client_name;
var input_seller = form_create.seller;
var input_value = form_create.value;
var input_date = form_create.date;
var text_description = form_create.description;

function changeFieldValue(e) {
    var value = input_value.value;

    if (isNaN(parseFloat(value))) {
        value = value.replace(/[a-z]/gi, '');
        value = value.replace(/,/gi, '.');
    }

    value = parseFloat(value);
    e.value = value;
}

form_create.addEventListener('submit', (e) => {
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

    form_create.submit();
});
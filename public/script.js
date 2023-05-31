//Init datatable
$('#myTable').DataTable({
    ordering: false,
});

//Cancel button
$("#cancel").on("click", function (e) {
    $('#form-companies')[0].reset();
    $('#cities').val('');
});

//Save request ajax
$("#save").on("click", function (e) {
    e.preventDefault();

    var formData = {
        registration_number: $('#registration_number').val(),
        name: $('#name').val(),
        postal_code: $('#postal_code').val(),
        address: $('#address').val(),
        number: $('#number').val(),
        district: $('#district').val(),
        states: $("#states option:selected").text(),
        cities: $("#cities option:selected").text(),
    };

    $.ajax({
        type: "POST",
        url: "http://localhost/teste-vaga-dev/companies",
        data: formData,
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: response.message,
                showConfirmButton: false,
                timer: 1500,
                didClose: function () {
                    location.reload();
                }
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});

//Edit request ajax
$("#edit").on("click", function (e) {
    e.preventDefault();
    var formData = {
        registration_number: $('#registration_number').val(),
        name: $('#name').val(),
        postal_code: $('#postal_code').val(),
        address: $('#address').val(),
        number: $('#number').val(),
        district: $('#district').val(),
        states: $("#states option:selected").text(),
        cities: $("#cities option:selected").text(),
        id: $("#updateId").val()
    };

    $.ajax({
        type: "POST",
        url: "http://localhost/teste-vaga-dev/edit-companies",
        data: formData,
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: response.message,
                showConfirmButton: false,
                timer: 1500,
                didClose: function () {
                    location.reload();
                }
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});

//Load data to edit
var editData = function (id) {
    $('#save').attr("hidden", true);
    $('#edit').attr("hidden", false);
    $.ajax({
        type: "GET",
        url: "http://localhost/teste-vaga-dev/companies/" + id,
        data: {editId: id},
        dataType: "html",
        success: function (data) {
            var companyData = JSON.parse(data);
            $("input[name='address']").val(companyData.address);
            $("input[name='id']").val(companyData.id);
            $("input[name='district']").val(companyData.district);
            $("input[name='name']").val(companyData.name);
            $("input[name='number']").val(companyData.number);
            $("input[name='postal_code']").val(companyData.postal_code);
            $("input[name='registration_number']").val(companyData.registration_number);

            $("#states > option").filter(function () {
                return $(this).text() == companyData.state;
            }).prop("selected", true);

            $("#cities > option").filter(function (e) {
                const cidadesSEL = document.getElementById("cities");
                const estadosSEL = document.getElementById("states");
                const viaCepUrl = 'https://viacep.com.br/ws/json/'
                const ibgeAPI = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
                let option;
                cidadesSEL.innerHTML = '';
                cidadesSEL.style.display = "inline";
                fetch(ibgeAPI + '/' + estadosSEL.value + '/municipios').then(function (response) {
                    return response.json();
                }).then(function (data) {
                    for (let i in data) {
                        let option = document.createElement("option");
                        option.value = data[i].id;
                        option.text = data[i].nome;
                        cidadesSEL.insertAdjacentElement('beforeend', option);
                    }
                    $("#cities > option:contains('" + companyData.city + "')").prop("selected", true);
                });
            });
        }
    });
};


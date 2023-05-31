<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste Magis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
</head>
<body>
<section class="form-company">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Formulário de Cadastro</h5>
            </div>
            <div class="card-body">
                <form id="form-companies">
                    <input type="hidden" name="id" id="updateId">
                    <div class="row">
                        <div class="col-3">
                            <label for="registration_number" class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number">
                        </div>
                        <div class="col-9">
                            <label for="name" class="form-label">Nome da Empresa</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <label for="postal_code" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code">
                        </div>
                        <div class="col-9">
                            <label for="address" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="col-1">
                            <label for="number" class="form-label">Número</label>
                            <input type="text" class="form-control" id="number" name="number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label for="district" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="district" name="district">
                        </div>
                        <div class="col-2">
                            <label for="states" class="form-label">UF</label>
                            <select  class="form-select" id="states" name="state">
                                <option value="" selected>Escolha o estado</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="cities" class="form-label">Cidade</label>
                            <select class="form-select" id="cities" name="city">
                                <option value="" selected>Escolha a cidade</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" id="cancel">Cancelar</button>
                            <button type="button" class="btn btn-primary ms-4" id="save">Salvar</button>
                            <button type="button" class="btn btn-primary ms-4" id="edit" hidden>Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="list-companies mt-5">
    <div class="container">
        <h4>Empresas Cadastradas</h4>
        <table class="table table-bordered" id="myTable">
            <thead>
            <tr>
                <th scope="col">CNPJ</th>
                <th scope="col">Nome da empresa</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($companies as $company) { ?>
                    <tr>
                        <td><?php echo $company['registration_number']?></td>
                        <td><?php echo $company['name']?></td>
                        <td><a href='javascript:void(0)' onclick="editData(<?php echo $company['id']?>)">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


<script>
    const cidadesSEL = document.getElementById("cities");
    const estadosSEL = document.getElementById("states");
    const viaCepUrl = 'https://viacep.com.br/ws/json/'
    const ibgeAPI = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
    let option;

    fetch(ibgeAPI).then(function(response) {
        return response.json();
    }).then(function(data) {
        for (let i in data) {
            option = document.createElement("option");
            option.value = data[i].id;
            option.text = data[i].nome;
            option.setAttribute('data-sigla' , data[i].sigla);
            estadosSEL.insertAdjacentElement('beforeend',option);
        }
        option = document.createElement("option");
        estadosSEL.insertAdjacentElement('beforeend',option);
    });

    estadosSEL.addEventListener("change", () => {
        cidadesSEL.innerHTML = '';
        cidadesSEL.style.display = "inline";

        fetch(ibgeAPI + '/' + estadosSEL.value + '/municipios').then(function(response) {
            return response.json();
        }).then(function(data) {
            for (let i in data) {
                let option = document.createElement("option");
                option.value = data[i].id;
                option.text = data[i].nome;
                cidadesSEL.insertAdjacentElement('beforeend',option);
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            ordering: false,
        });
    } );

    $( "#save" ).on( "click", function(e) {
        e.preventDefault();

        var formData = {
            registration_number: $('#registration_number').val(),
            name: $('#name').val(),
            postal_code: $('#postal_code').val(),
            address: $('#address').val(),
            number: $('#number').val(),
            district: $('#district').val(),
            states: $( "#states option:selected" ).text(),
            cities:$( "#cities option:selected" ).text(),
        };

        $.ajax({
            type: "POST",
            url: "http://localhost/teste-vaga-dev/companies",
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                    didClose: function() {
                        location.reload();
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });



    $("#edit").on( "click", function(e) {
        e.preventDefault();
        var formData = {
            registration_number: $('#registration_number').val(),
            name: $('#name').val(),
            postal_code: $('#postal_code').val(),
            address: $('#address').val(),
            number: $('#number').val(),
            district: $('#district').val(),
            states: $( "#states option:selected" ).text(),
            cities:$( "#cities option:selected" ).text(),
            id: $("#updateId").val()
        };

        $.ajax({
            type: "POST",
            url: "http://localhost/teste-vaga-dev/edit-companies",
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                    didClose: function() {
                        location.reload();
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    var editData = function(id){
        $('#save').attr("hidden",true);
        $('#edit').attr("hidden",false);
        $.ajax({
            type: "GET",
            url: "http://localhost/teste-vaga-dev/companies/"+id,
            data:{editId:id},
            dataType: "html",
            success: function(data){
                var companyData = JSON.parse(data);
                $("input[name='address']").val(companyData.address);
                $("input[name='id']").val(companyData.id);
                $("input[name='district']").val(companyData.district);
                $("input[name='name']").val(companyData.name);
                $("input[name='number']").val(companyData.number);
                $("input[name='postal_code']").val(companyData.postal_code);
                $("input[name='registration_number']").val(companyData.registration_number);

                $("#states > option").filter(function() {
                    return $(this).text() == companyData.state;
                }).prop("selected", true);

                $("#cities > option").filter(function(e) {

                    const cidadesSEL = document.getElementById("cities");
                    const estadosSEL = document.getElementById("states");
                    const viaCepUrl = 'https://viacep.com.br/ws/json/'
                    const ibgeAPI = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
                    let option;

                    cidadesSEL.innerHTML = '';
                    cidadesSEL.style.display = "inline";

                    fetch(ibgeAPI + '/' + estadosSEL.value + '/municipios').then(function(response) {
                        return response.json();
                    }).then(function(data) {
                        for (let i in data) {
                            let option = document.createElement("option");
                            option.value = data[i].id;
                            option.text = data[i].nome;
                            cidadesSEL.insertAdjacentElement('beforeend', option);
                        }
                        $("#cities > option:contains('"+companyData.city+"')" ).prop("selected", true);
                    });
                });
            }
        });
    };
</script>

<script>
    $("#cancel").on( "click", function(e) {
        $('#form-companies')[0].reset();
        $('#cities').val('');
    });
</script>
</body>
</html>
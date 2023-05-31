<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste Magis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>
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
                            <select class="form-select" id="states" name="state">
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
                    <td><?php echo $company['registration_number'] ?></td>
                    <td><?php echo $company['name'] ?></td>
                    <td><a href='javascript:void(0)' onclick="editData(<?php echo $company['id'] ?>)">Edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://localhost/teste-vaga-dev/public/script.js"></script>
</body>
</html>
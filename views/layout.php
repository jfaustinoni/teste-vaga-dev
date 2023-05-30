<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste Magis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<section class="form-company">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Formulário de Cadastro</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-3">
                            <label for="cnpj" class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj">
                        </div>
                        <div class="col-9">
                            <label for="name" class="form-label">Nome da Empresa</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep">
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
                            <label for="address" class="form-label">UF</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="number" class="form-label">Cidade</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary ms-4">Salvar</button>
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
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">CNPJ</th>
                <th scope="col">Nome da empresa</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>123456789</td>
                <td>Empresa 1</td>
                <td><a href="">Edit</a> </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php



Flight::route('/', function(){
    //List companies
    $listCompaniesController = new ListCompaniesController();
    $companies = $listCompaniesController->index();

    Flight::render('layout.php', array('companies' => $companies));

});

Flight::route('POST /companies', function(){
    $insertCompaniesController = new InsertCompanyController();
    $insertCompaniesController->index();
});

Flight::route('GET /companies/@id', function($id){
    $insertCompaniesController = new ShowCompanyController();
    $insertCompaniesController->index($id);
});

Flight::route('POST /edit-companies', function(){
    $editCompanyController = new EditCompanyController();
    $editCompanyController->index();
});
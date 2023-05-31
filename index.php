<?php
require 'flight-master/flight/Flight.php';
require 'routes/web.php';
require 'database/connection.php';
require 'app/http/Controllers/ListCompaniesController.php';
require 'app/http/Controllers/InsertCompanyController.php';
require 'app/http/Controllers/ShowCompanyController.php';
require 'app/http/Controllers/EditCompanyController.php';
Flight::start();
<?php

class ListCompaniesController
{
    public function index() {
        var_dump('12345');exit;
        return Flight::db()->query("SELECT * FROM companies LIMIT 1")->fetchAll();
    }
}
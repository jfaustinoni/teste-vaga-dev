<?php

class ListCompaniesController
{
    public function index()
    {
        return Flight::db()->query("SELECT * FROM companies")->fetchAll();
    }
}
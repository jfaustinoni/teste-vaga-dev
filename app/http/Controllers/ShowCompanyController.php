<?php

class ShowCompanyController
{

    public function index($id) {
        $show = Flight::db()->prepare('SELECT * FROM companies WHERE id = ?');
        $show->execute([$id]);
        $company = $show->fetch(PDO::FETCH_ASSOC);

        echo json_encode($company);
    }
}
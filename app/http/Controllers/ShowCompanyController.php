<?php

class ShowCompanyController
{

    public function index($id) {
        $db = Flight::db();
        $stmt = $db->prepare('SELECT * FROM companies WHERE id = ?');
        $stmt->execute([$id]);
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($company);
    }
}
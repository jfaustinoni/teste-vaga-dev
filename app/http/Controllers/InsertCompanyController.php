<?php

class InsertCompanyController
{
    public function index() {
        $request = Flight::request();
        $registrationNumber = $request->data['registration_number'];
        $name = $request->data['name'];
        $postalCode = $request->data['postal_code'];
        $address = $request->data['address'];
        $number = $request->data['number'];
        $district = $request->data['district'];
        $states = $request->data['states'];
        $cities = $request->data['cities'];

        $insert = Flight::db()->prepare('INSERT INTO companies (registration_number, name, postal_code, address, number, district, state, city) VALUES (?, ?,?,?,?,?,?,?)');
        $insert->execute([$registrationNumber, $name,$postalCode, $address, $number, $district, $states, $cities]);

    }
}
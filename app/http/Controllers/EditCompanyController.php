<?php

class EditCompanyController
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
      $id = $request->data['id'];

      $edit = Flight::db()->prepare('UPDATE companies SET registration_number = :registration_number, name = :name, postal_code = :postal_code,address = :address,number = :number,district = :district,state = :state,city = :city WHERE id = :id');
      $edit->execute(array(
          ':registration_number' => $registrationNumber,
          ':name' => $name,
          ':postal_code' => $postalCode,
          ':address' => $address,
          ':number' => $number,
          ':district' => $district,
          ':state' => $states,
          ':city' => $cities,
          ':id' => $id
      ));

      if($edit){
          Flight::json([
              'message' => 'Empresa editada com sucesso!',
              'data' => json_encode(array($request->data))
          ]);
      }
  }
}
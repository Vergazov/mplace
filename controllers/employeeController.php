<?php

class employeeController {
        
    public function getList(){
        $ch = curl_init($this->getUrl());
        $this->getAuth($ch);
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
        for($i=0; $i < count($result['rows']); $i++) {
            print_r($result['rows'][$i]['fullName']);
            print_r(' id= ' . $result['rows'][$i]['id']);
            echo '<br>';
        }
        
    }
    
    public function createEmployee() {
        $data = [
            "firstName" => $_POST['firstName'],
            "middleName" => $_POST['middleName'],
            "lastName" => $_POST['lastName']
        ];
        $ch = curl_init($this->getUrl());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
        $this->getAuth($ch);
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
    }
    
    public function changeEmployee() {
        $data = [
        "firstName" => $_POST['firstName']
        ];

        $id  = $_POST['id'];

        $ch = curl_init($this->getUrl() . $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
        $this->getAuth($ch);
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
    }
    
    public function deleteEmployee() {
        
        $id  = $_POST['id'];

        $ch = curl_init($this->getUrl() . $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $this->getAuth($ch);
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
    }
    
    private function getUrl(){
        return 'https://online.moysklad.ru/api/remap/1.2/entity/employee/';
    }
    
    private function getData(){
        return "admin@vergazka:39c8f67393ee";
    }
    
    private function getAuth($ch){
        return [
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true),
            curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC),
            curl_setopt($ch, CURLOPT_USERPWD, $this->getData())
        ];
    }
    
}


<?php

class employeeController {
    
    public function getList(){             
        $ch = curl_init('https://online.moysklad.ru/api/remap/1.2/entity/employee');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "admin@vergazka:39c8f67393ee");
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
        for($i=0; $i < count($result['rows']); $i++) {
            var_dump($result['rows'][$i]['fullName']);
            echo '<br>';
        }
        
    }
    
    public function createEmployee() {
        $data = [
            "firstName" => $_POST['firstName'],
            "middleName" => $_POST['middleName'],
            "lastName" => $_POST['lastName']
        ];
        $ch = curl_init('https://online.moysklad.ru/api/remap/1.2/entity/employee');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "admin@vergazka:39c8f67393ee");
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
        return $result;
    }
    
    public function changeEmployee() {
        $data = [
        "firstName" => $_POST['firstName']
        ];

        $id  = $_POST['id'];

        $ch = curl_init("https://online.moysklad.ru/api/remap/1.2/entity/employee/" . $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "admin@vergazka:39c8f67393ee");
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
        print_r("Успех");
    }
    
    public function deleteEmployee() {
        
        $id  = $_POST['id'];

        $ch = curl_init("https://online.moysklad.ru/api/remap/1.2/entity/employee/" . $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "admin@vergazka:39c8f67393ee");
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
    }
}


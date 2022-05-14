<?php

class curl {
        
    // Обычный GET запрос без параметров для получения списка сотрудников
    
    public function getEmployees(){              
        $ch = curl_init('https://online.moysklad.ru/api/remap/1.2/entity/employee');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "admin@vergazka:39c8f67393ee");
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        curl_close($ch);
        return $result;
    }
    
    // POST запрос для создания сотрудника
    
    public function newEmployee($firstname,$middlename,$lastname,$inn, $position, $phone){
        $data = [
            "firstName" => $firstname,
            "middleName" => $middlename,
            "lastName" => $lastname,
            "inn" => $inn,
            "position" => $position,
            "phone" => $phone,
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
    
    public function changeEmployee($firstname,$lastname){
        $data = [
            "firstname" => $firstname,
            "lastname" => $lastname,
        ];
        $ch = curl_init('https://online.moysklad.ru/api/remap/1.2/entity/employee/03f82b59-c213-11ec-0a80-012a0006bbc5');
        curl_setopt($ch, CURLOPT_PUT, true);
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
    
}

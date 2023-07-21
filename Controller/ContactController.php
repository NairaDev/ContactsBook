<?php
    include("../Model/ContactModel.php");

    if(isset($_POST["action"]) && $_POST["action"] == 'addContact'){

        $contactName = $_POST["ContactName"];
        $contactPhone = $_POST["ContactPhone"];
        $patternName = '/^[А-ЯЁа-яёA-Za-z\s]+$/u';
        $patternPhone = '/^(?:(?:\+?7|8)\s?)?(\d{3})\D?(\d{3})\D?(\d{2})\D?(\d{2})$/';

        if($contactName !== "" && $contactPhone !== "" ){
            if(preg_match($patternName, $contactName) && preg_match($patternPhone, $contactPhone) ){
            $checkContact = $contacModel -> checkContact($contactPhone);
            if($checkContact > 0){
                $returnArr['Action'] = '0';
                $returnArr['message'] = 'Этот телефонный номер уже есть  в кантактным книжке';
            }else{
                $addContact = $contacModel -> addContact($contactName,$contactPhone);

                if($addContact){
                    $returnArr['Action'] = 1;
                    $returnArr['message'] = 'Кантакт успешно дабавлен!';
                }else{
                    $returnArr['Action'] = '0';
                    $returnArr['message'] = 'Не удалось добавить кантак';
                }
                
            }
            }else{
                $returnArr['Action'] = '0';
                $returnArr['message'] = 'Неверный формат имени или номера телефона';
            }
                
        

        }else{
            $returnArr['Action'] = '0';
            $returnArr['message'] = 'Пожалуйста заполните все поля';
        }

                 echo json_encode($returnArr);exit;

    }

    if(isset($_POST["action"]) && $_POST["action"] == 'deleteContact'){
        $contactId = $_POST["contactId"];
        
        $deleteContact = $contacModel -> deleteContact($contactId);

        if($deleteContact){
            $returnArr['Action'] = 1;
            $returnArr['message'] = 'Кантакт успешно удален!';
        }else{
            $returnArr['Action'] = '0';
            $returnArr['message'] = 'Не удалось удалить кантак';
        }
            echo json_encode($returnArr);exit;


    }

        
      
    


    
?>
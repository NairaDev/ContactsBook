<?php
    include("./Model/ContactModel.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Book</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/style.css">
</head>
<body>
    <div class = "container-contact">
        <div class = "container-contact_block">
             <p class = "container-contact_block_title">
                 Добавить Контакт
            </p>
        </div>
       
        <form class="container-contact_form">
            <input type="text" class = "contactName" name = "name" placeholder="Имя" >
            <input type="text" class = "contactPhone" name = "phone" placeholder="Телефон">
        </form>
        <div class="container-contact_form_btn">
             <button class="addContact">Дабавить</button>

        </div>

        <div class="alert alert-success alert_success" role="alert" style="display: none;"></div>
        <div class="alert alert-danger alert_error" role="alert" style="display: none;"></div>
    </div>
    <?php
        $showAllContact = $contacModel -> showAllContacts();
        if(count($showAllContact) > 0){?>

            <div class = "container-contact">
                    <div class = "container-contact_block">
                        <p class = "container-contact_block_title">
                            Список контактов
                        </p>
                    </div>
                    <?php
                        foreach($showAllContact as $contact){?>
                            <div class = "container-contact_block">
                                <p  class = "container-contact_block_title"><?=$contact['contactName']?>
                                <i class="fa fa-times deletContact"  aria-hidden="true" data-id = "<?=$contact['contactId']?>"></i>
                                </p>
                                <p  class = "container-contact_block_number"><?=$contact['contactNumber']?></p>
                                

                            </div>
                       <?php }
                    ?>
                    <div class="alert alert-success delete_success" role="alert" style="display: none;"></div>
                    <div class="alert alert-danger delete_error" role="alert" style="display: none;"></div>
            </div>
        <?php
        }else{?>    <div class = "container-contact" >
                         <div class = "container-contact_block">
                                <p  class = "container-contact_block_title">
                                    контактная книжка пуста  
                                </p>
                            </div>
                         </div>
            
       <?php }

    ?>
    
    

    <script src="./Assets/js/script.js" > </script>
</body>
</html>
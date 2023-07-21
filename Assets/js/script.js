// $(function () {
//     $('.addContact').on('click', function () {
//         let ContactName = $('.contactName').val();
//         let ContactPhone = $('.contactPhone').val();
//         console.log(ContactName,ContactPhone);

//         $.ajax({
//             url:'../Controller/ContactController.php',
// 			method:'post',
// 			dataType:'json',
// 			data:{
// 				ContactName,
//                 ContactPhone,			
// 				action:'addContact'
//             },

//             success:function(ContactData){
//                 if(ContactData["Action"] == "1"){
//                         $('.alert_success').html(ContactData['message']);
//                         $('.alert_success').fadeIn();
//                         $('.alert_success').fadeOut(2000);
//                         setTimeout(function(){
//                             location.reload();
//                         },2000);
//                     }else{
//                         $('.alert_error').html(ContactData['message']);
//                         $('.alert_error').fadeIn();
//                         $('.alert_error').fadeOut(2000);
//                         setTimeout(function(){
//                             location.reload();
//                         },2000);
                    
//                 }
//             }
//         })
//     })
// })

$(function () {
    $('.addContact').on('click', function () {
        let ContactName = $('.contactName').val();
        let ContactPhone = $('.contactPhone').val();
        console.log(ContactName,ContactPhone);

        $.ajax({
            url:'./Controller/ContactController.php',
            method:'post',
            dataType:'json',
            data:{
                ContactName,
                ContactPhone,			
                action:'addContact'
            },

            success:function(ContactData){
                console.log(ContactData);
                if(ContactData.Action === 1){
                    console.log(2);
                        $('.alert_success').html(ContactData.message);
                        $('.alert_success').fadeIn();
                        $('.alert_success').fadeOut(2000);
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    }else{
                        $('.alert_error').html(ContactData.message);
                        $('.alert_error').fadeIn();
                        $('.alert_error').fadeOut(2000);
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    
                }
            }
        })
    })
    $('.deletContact').on('click', function (){
        let contactId = $(this).data('id');
        console.log(contactId);
        $.ajax({
            url:'./Controller/ContactController.php',
            method:'post',
            dataType:'json',
            data:{
                contactId,			
                action:'deleteContact'
            },

            success:function(DeleteData){
                console.log(DeleteData);
                if(DeleteData.Action === 1){
                    console.log(2);
                        $('.delete_success').html(DeleteData.message);
                        $('.delete_success').fadeIn();
                        $('.delete_success').fadeOut(2000);
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    }else{
                        $('.delete_error').html(DeleteData.message);
                        $('.delete_error').fadeIn();
                        $('.delete_error').fadeOut(2000);
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    
                }
            }
        })
    })
})

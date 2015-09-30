/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('button').on('click', function(e){
    e.preventDefault();
    var url = "/login/" 
            + $('#inputEmail').val() + "/" 
            + $('#inputPassword').val();
    $.ajax({
        url: '/ajax/?user=login',
        type: 'post',
        async: false,
        data: {
            "email": $('#inputEmail').val(),
            "senha": $('#inputPassword').val()
        },
        sucess: function(data){
            alert(data);
        }
    });
});


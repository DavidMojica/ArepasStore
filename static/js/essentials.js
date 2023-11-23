function mandar_al_servidor(user, pass, node, msg){
    $.ajax({
        url: '../scriptsPHP/login.php',
        type: 'POST',
        data:{
            user: user,
            pass: pass,
            node: node
        },
        success: function(response){
            let jsonString = JSON.stringify(response);
            let data       = JSON.parse(jsonString);
            if(data.success){
                window.location.href = data.reboot;
            }
            else{
                console.log(data)
                msg.textContent = data.mensaje;
                setTimeout(clearSubtx, 3000);
            }
        },error: function(jqXHR, textStatus, errorThrown){
            // Error en la solicitud AJAX
            console.log('Error en la solicitud');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
};


function clearSubtx(msg){
    msg.textContent = "";
}
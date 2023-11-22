const b_change = document.getElementById('b_change');
const a_change = document.getElementById('a_change');
const l_card = document.getElementById('l_card');
const first_content = document.getElementById('first-content');
const second_content = document.getElementById('second-content');
const login_form = document.getElementById('login_form');
const register_form = document.getElementById('register_form');
const i_username = document.getElementById('i_username');
const i_password = document.getElementById('i_password');
const msg  = document.getElementById('msg');
const msg_r  = document.getElementById('msg_r');
const r_username = document.getElementById('r_username');
const r_password1 = document.getElementById('r_password1');
const r_password2 = document.getElementById('r_password2');


register_form.addEventListener('submit', function(e){
    e.preventDefault();

    const user_text = r_username.value.trim();
    const pass_text = r_password1.value.trim();
    const pass2_text = r_password2.value.trim();
    let error = "";
    let ban = true;

    if (user_text === "" || pass_text === "" || pass2_text === "") {
        error += "Algún dato está vacío";
        ban = false;
    }

    if(pass_text !== pass2_text){
        error += "Las contraseñas no coinciden";
        ban = false;
    }
    if (ban) {
        mandar_al_servidor(user_text, pass_text, 2);
    }
    else {
        msg.textContent = error;
    }
});


login_form.addEventListener('submit', function(e){
    e.preventDefault();

    const user_text = i_username.value.trim();
    const pass_text = i_password.value.trim();
    let error = "";
    let ban = true;

    if (user_text === "" || pass_text === "") {
        error += "Algún dato está vacío";
        ban = false;
    }

    if (ban) {
        mandar_al_servidor(user_text, pass_text, 1);
    }
    else {
        msg.textContent = error;
    }
});

function mandar_al_servidor(user, pass, node){
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
                window.location.href = "../templates/admin.php";
            }
            else{
                msg.textContent = data.mensaje;
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

b_change.addEventListener('click', function(){
    l_card.style.borderRadius = "15px";
    l_card.style.cursor = "pointer";
    l_card.style.transform = "scale(1.2)";
    l_card.style.boxShadow = "0px 0px 10px 5px  rgba(0, 0, 0, 0.705)";


    first_content.style.height = "0px";
    first_content.style.opacity = "0";

    second_content.style.opacity = "1";
    second_content.style.height = "100%";
    second_content.style.transform = "rotate(0deg)";
    second_content.style.fontSize = "1.8rem";
});


a_change.addEventListener('click', function(){
    l_card.style.borderRadius = ""; // Revertir a valor predeterminado
    l_card.style.cursor = "";
    l_card.style.transform = "";
    l_card.style.boxShadow = "";

    first_content.style.height = "";
    first_content.style.opacity = "";

    second_content.style.opacity = "";
    second_content.style.height = "";
    second_content.style.transform = "";
    second_content.style.fontSize = "";
});
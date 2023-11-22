const b_change = document.getElementById('b_change');
const a_change = document.getElementById('a_change');
const l_card = document.getElementById('l_card');
const first_content = document.getElementById('first-content');
const second_content = document.getElementById('second-content');


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
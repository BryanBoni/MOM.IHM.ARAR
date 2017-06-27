plusDeFiltre();

function plusDeFiltre(){
    var elementFiltre;
    var content;
    var input = document.createElement("input");
    
    input.setAttribute("class", "form-control");
    input.setAttribute("type", "text");
    input.setAttribute("placeholder", "zzzd");
    
    elementFiltre = document.getElementById("filtreChip");
    content = document.getElementById("filtreChi");
    
    elementFiltre.addEventListener("click", function(){
        //elementFiltre.removeChild(document.get)
        content.appendChild(document.createTextNode("¿Què ?"));
        content.appendChild(input);
    });
}
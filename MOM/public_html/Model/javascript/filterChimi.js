plusDeFiltre();

/**
 * Used to deploy the filter menu on the rechGroupeChi.
 * @returns {undefined}
 */
function plusDeFiltre() {
    var elementFiltre;
    var content;
    var typeAnalyseOptions = new Array("Chimie", "Bino", "Petro", "SEM", "Diffraction", "Dilato", "Autre");
    var typeStatusOptions = new Array("Groupe de travail", "Groupe final", "Groupe publié", "Groupe enregistré dans l'ancienne BDD", "Marginal au groupe","Marginal au groupe (pollution)");

    var row1;
    row1 = document.createElement("div");
    row1.setAttribute("class", "row");
    
    var row2;
    row2 = document.createElement("div");
    row2.setAttribute("class", "row");
    //row1.setAttribute("style", "padding: 0px 14px 0px 14px;");

    //each row is made of 3 elements
    row1.appendChild(addInputText("Article, thèse, livre, etc...", "Bibliographie", "selectBiblio"));// fais une recherche sur tout les groupes si non null
    row1.appendChild(addSelect(typeAnalyseOptions, "Type d'analyse effectuée sur le groupe", "Type d'analyse", "selectAnalyse"));
    row1.appendChild(addSelect(typeStatusOptions, "Statut du groupe recherché", "Statut du groupe", "selectStatGrp"));
    
    row2.appendChild(addCategorie());

    elementFiltre = document.getElementById("filtreChip");
    content = document.getElementById("filtreChi");

    elementFiltre.addEventListener("click", function () {
        //elementFiltre.removeChild(document.get)
        content.appendChild(row1);
        content.appendChild(document.createElement("br"));
        content.appendChild(row2);
        document.getElementById("searchChi").removeChild(elementFiltre);
    });

}

/**
 * 
 * @param {type : String} title //(optionnal) use to describe the input, void ("") if not used
 * @param {type : String} name //the label of the input
 * @param {type : String} id // the id for the css file and label tag of the input
 * @returns {Element|addInputText.groupStatusDiv}
 */
function addInputText(title, name, id){
        /* Select Status group */
    //main var 
    var groupStatusDiv = document.createElement("div");
    var groupStatusLabel = document.createElement("label");
    var groupStatus = document.createElement("input");

    //attribute
    groupStatusDiv.setAttribute("class", "col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0");
    groupStatusDiv.setAttribute("id", "selectChi");

    groupStatusLabel.setAttribute("for", id);
    groupStatusLabel.appendChild(document.createTextNode(name));

    groupStatus.setAttribute("class", "form-control");
    groupStatus.setAttribute("id", id);
    groupStatus.setAttribute("type", "text");
    groupStatus.setAttribute("name", id);
    groupStatus.setAttribute("title", title);
    groupStatus.setAttribute("placeholder", title);


    //add in the div
    groupStatusDiv.appendChild(groupStatusLabel);
    groupStatusDiv.appendChild(document.createElement("br"));
    groupStatusDiv.appendChild(groupStatus);
    /* END : Select Status group */

    return groupStatusDiv;
}

/*
 * Used to create a select input into the filter menu on "rechGroupeChi.php"
 * 
 * @param {type : String[]} optionTab //contain all the selectable options for the select input
 * @param {type : String} title //(optionnal) use to describe the select input, void ("") if not used
 * @param {type : String} name //the label of the select input
 * @param {type : String} id // the id for the css file and label tag of the select input
 * 
 * @returns {Element|addSelect.groupStatusDiv}
 */
function addSelect(optionTab, title, name, id) {
    /* Select Status group */
    //main var 
    var groupStatusDiv = document.createElement("div");
    var groupStatusLabel = document.createElement("label");
    var groupStatus = document.createElement("select");

    //attribute
    groupStatusDiv.setAttribute("class", "col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0");
    groupStatusDiv.setAttribute("id", "selectChi");

    groupStatusLabel.setAttribute("for", id);
    groupStatusLabel.appendChild(document.createTextNode(name));

    groupStatus.setAttribute("class", "c-select form-control");
    groupStatus.setAttribute("id", id);
    groupStatus.setAttribute("title", title);

    //OPTIONS
    var optionDefault = document.createElement("option");
    optionDefault.appendChild(document.createTextNode("Selectionnez une option"));
    groupStatus.appendChild(optionDefault);

    var temp;

    optionTab.forEach(function (option) {
        temp = document.createElement("option");
        temp.appendChild(document.createTextNode(option));

        groupStatus.appendChild(temp);
    });

    //add in the div
    groupStatusDiv.appendChild(groupStatusLabel);
    groupStatusDiv.appendChild(document.createElement("br"));
    groupStatusDiv.appendChild(groupStatus);
    /* END : Select Status group */

    return groupStatusDiv;
}

/*
 * 
 * @returns {addCategorie.groupCategorieDiv|Element}
 */
function addCategorie() {
    /* Select categorie group */
    //main var 
    var groupCategorieDiv = document.createElement("div");
    var groupCategorieLabel = document.createElement("label");
    var groupCategorie = document.createElement("select");

    //attribute
    groupCategorieDiv.setAttribute("class", "col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0");
    groupCategorieDiv.setAttribute("id", "selectChi");

    groupCategorieLabel.setAttribute("for", "catGroupe");
    groupCategorieLabel.appendChild(document.createTextNode("Catégorie de groupe :"));

    groupCategorie.setAttribute("class", "c-select form-control");
    groupCategorie.setAttribute("id", "catGroupe");

    //options
    var option1 = document.createElement("option");
    var option2 = document.createElement("option");
    var option3 = document.createElement("option");
    //var option4 = document.createElement("option");
    var optionDefault = document.createElement("option");

    option1.appendChild(document.createTextNode("Super groupe"));
    option2.appendChild(document.createTextNode("Groupe - tous"));
    option3.appendChild(document.createTextNode("Groupe - par défault"));
    optionDefault.appendChild(document.createTextNode("Selectionnez une option"));

    groupCategorie.appendChild(optionDefault);
    groupCategorie.appendChild(option1);
    groupCategorie.appendChild(option2);
    groupCategorie.appendChild(option3);
    // groupCategorie.appendChild(option4);


    //add in the div
    groupCategorieDiv.appendChild(groupCategorieLabel);
    groupCategorieDiv.appendChild(document.createElement("br"));
    groupCategorieDiv.appendChild(groupCategorie);
    /* END : Select Categorie group */

    return groupCategorieDiv;
}


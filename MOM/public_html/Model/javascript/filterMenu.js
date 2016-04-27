tag();
resPerPage();
displayRes();

function tag() {
    var filterList = document.getElementById("tag");
    var txt = document.createElement("ul");
    txt.textContent = "ffff";
    filterList.appendChild(txt);

    var list = document.getElementById("check");
}

function resPerPage() {
    /*
     * this class is used to change the number of result per page displayable
     */
    var elementList = [];
    elementList = document.getElementsByClassName("imgNb");

    var i;
    for (i = 0; i < 3; i++) {
        console.log(elementList[i]);
        elementList[i].addEventListener("click", function (i) {
            console.log("ma jjj");
            for (j = 0; j < 3; j++) {
                elementList[j].setAttribute("class", "imgNb");
            }
            this.setAttribute("class", "imgNb imgNb-active");
           

            var j;

        });
    }
}

function displayRes() {
    /*
     * Change how the list of elements is dislpay
     */
    var elementList = [];
    elementList = document.getElementsByClassName("imgNb");

    var i;

    for (i = 3; i < 6; i++) {
        console.log(elementList[i]);
        elementList[i].addEventListener("click", function () {
            console.log(this.getAttribute("class"));
            
            for (j = 3; j < 6; j++) {   
                switch(j){
                    case 3: elementList[j].setAttribute("class", "imgNb glyphicon glyphicon-picture");
                        break;
                    case 4: elementList[j].setAttribute("class", "imgNb glyphicon glyphicon-th");
                        break;
                    case 5: elementList[j].setAttribute("class", "imgNb glyphicon glyphicon-list");
                        break;
                }
            }
            this.setAttribute("class", this.getAttribute("class") + " imgNb-active");
            var j;

        });
    }
}
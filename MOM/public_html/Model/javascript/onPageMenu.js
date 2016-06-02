/* 
 * class used for the page menu on rechAvc.php 
 */

initMP();
function initMP() {
    document.getElementById("MABITE").addEventListener("click", function (i) {
        var nbPage = prompt("Veulliez entrer un numéro de page valide", "");
        if (nbPage != null) {
            /*document.getElementById("demo").innerHTML =
             "Hello " + person + "! How are you today?";*/
        }
    });
}
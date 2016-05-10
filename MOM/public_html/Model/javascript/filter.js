
men2();

function men2() {
    var li2 = document.getElementsByTagName("li");
    var subMenu = document.getElementsByClassName("list");
    for (var i = 0; i < li2.length; i++) {
        add(li2[i], subMenu[i]);
    }
}

function add(li2, subMenu) {
    var isClicked = false;
    li2.addEventListener("click", function () {
        if (!isClicked) {
            //this.innerHTML = "- MENU";
            subMenu.innerHTML += "<ul><li>lol</li> <li>mdr</li> <li>bid</li> </ul>";

        } else {
            //this.innerHTML = "+ MENU";
            subMenu.innerHTML = "";
        }
        isClicked = !isClicked;
    });
}
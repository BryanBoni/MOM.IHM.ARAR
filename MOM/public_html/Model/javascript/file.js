/*
 This class is use for the management of input files, like pictures or 3D objects.
 */
//Local variables
var fileInput = document.querySelector('#file');
var preview = document.getElementById("fileList");
var folder = document.getElementById("createFolder");
//var progress = document.querySelector("#progress");

fileSelect();


function fileSelect() {
    /*
     select the input with id file and add a listener for his change.
     also send the file(s) selected to a temporary repository
     
     */
    var allowedTypes = ["png", "jpg", "jpeg", "gif", "ico"];

    fileInput.addEventListener('change', function () {
        var files = this.files;
        var xhr = new XMLHttpRequest();
        var imgType;
        var form = new FormData();

        xhr.open("POST", "http://localhost:8080/public_html/Controlleur/Insertion.php");

        xhr.addEventListener('load', function () {

            console.log('Uplo11111ad terminé !');

        });
        

        //for a loading bar
        /*xhr.upload.addEventListener('progress', function (e) {
         progress.value = e.loaded;
         progress.max = e.total;
         
         });*/



        for (var object of files){ 
            imgType = object.name.split('.');
            imgType = imgType[imgType.length - 1].toLowerCase();

            if (allowedTypes.indexOf(imgType) != -1) {
                createThumbnail(object);
            } else {
                console.log("FAIL ! type none authorisé");
            }
            form.append("file", object);
            xhr.send(form);
        }
    });


}

function createThumbnail(file) {
    var reader = new FileReader();

    reader.addEventListener('load', function () {
        //display picture
        var imgElement = document.createElement('img');
        imgElement.style.maxWidth = '150px';
        imgElement.style.maxHeight = '150px';
        imgElement.src = this.result;
        preview.appendChild(imgElement);

    });

    reader.readAsDataURL(file);
}



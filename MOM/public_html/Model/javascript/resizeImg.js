$(document).ready(function() {
    x();
});
/*
$(document).resize(function() {
    $('.img_default').each(function() {
        var width = $(this).width();    // Current image width
        var height = $(this).height();  // Current image height
        var widthPage = $(document).width();//26%
        var heightPage = $(document).height();//22%
        
        $(this).css("height", 22 * heightPage / 100 + "%" );
        $(this).css("width", 26 * widthPage / 100 + "%");
    });
});
*/
function x() {
    /*$('.img_default').each(function() {
        var maxWidth = 400; // Max width for the image
        var maxHeight = 400;    // Max height for the image
        var ratio = 0;  // Used for aspect ratio
        var width = $(this).width();    // Current image width
        var height = $(this).height();  // Current image height
        
        // Check if the current width is larger than the max
        if(width > maxWidth){
            ratio = maxWidth / width;   // get ratio for scaling image
            $(this).css("width", maxWidth + "%"); // Set new width
            $(this).css("height", height * ratio + "%");  // Scale height based on ratio
            height = height * ratio;    // Reset height to match scaled image
            width = width * ratio;    // Reset width to match scaled image
        }

        // Check if current height is larger than max
        if(height > maxHeight){
            ratio = maxHeight / height; // get ratio for scaling image
            $(this).css("height", maxHeight + "%");   // Set new height
            $(this).css("width", width * ratio + "%");    // Scale width based on ratio
            width = width * ratio;    // Reset width to match scaled image
        }
        
        var tabCSS = calculateAspectRatioFit(width, height, maxWidth, maxHeight);
        $('obj3d').css("width", tabCSS[0] + "%");
        $('obj3d').css("height", tabCSS[1] + "%");
    });*/
    
    $('.img_file_gallerie').each(function() {
        var maxWidth = 200; // Max width for the image
        var maxHeight = 200;    // Max height for the image
        var ratio = 0;  // Used for aspect ratio
        var width = $(this).width();    // Current image width
        var height = $(this).height();  // Current image height

        // Check if the current width is larger than the max
        if(width > maxWidth){
            ratio = maxWidth / width;   // get ratio for scaling image
            $(this).css("width", maxWidth); // Set new width
            $(this).css("height", height * ratio);  // Scale height based on ratio
            height = height * ratio;    // Reset height to match scaled image
            width = width * ratio;    // Reset width to match scaled image
        }

        // Check if current height is larger than max
        if(height > maxHeight){
            ratio = maxHeight / height; // get ratio for scaling image
            $(this).css("height", maxHeight);   // Set new height
            $(this).css("width", width * ratio);    // Scale width based on ratio
            width = width * ratio;    // Reset width to match scaled image
        }
    });
}

function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {

    var ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);

    return { width: srcWidth*ratio, height: srcHeight*ratio };
}
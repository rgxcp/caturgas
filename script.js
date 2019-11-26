// jQuery
jQuery(document).ready(function() {
    jQuery('#kataKunci').on('keyup', function() {
        jQuery('#containerTabel').load('search.php?kataKunci=' + jQuery('#kataKunci').val());
    });
});

/*
// Ajax
var kataKunci = document.getElementById('kataKunci');

var containerTabel = document.getElementById('containerTabel3');

kataKunci.addEventListener('keyup', function() {
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            containerTabel.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'search.php?kataKunci=' + kataKunci.value, true);

    xhr.send();

})
*/
// jQuery
jQuery(document).ready(function() {
    jQuery('#keyword').on('keyup', function() {
        jQuery('#table').load('search.php?keyword=' + jQuery('#keyword').val());
    });
});

/*
// Ajax
var keyword = document.getElementById('keyword');
var table = document.getElementById('table');

keyword.addEventListener('keyup', function() {    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            table.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', 'search.php?keyword=' + keyword.value, true);
    xhr.send();
})
*/
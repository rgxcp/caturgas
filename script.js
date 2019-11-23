var keyword = document.getElementById('kataKunci');

var containerTabel = document.getElementById('containerTabel3');

keyword.addEventListener('keyup', function() {
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            containerTabel.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'search.php?keyword=' + keyword.value, true);

    xhr.send();

})
function showSugg(str){
    if(str == ""){
        document.getElementById("suggestions").innerHTML = "";
        return;
    }
    else {
        var XMLHTTP = new XMLHttpRequest();
        XMLHTTP.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("suggestions").innerHTML = this.responseText;
            }
        };
        XMLHTTP.open("GET","getSuggestions.php?q="+str,true);
        XMLHTTP.send();
    }
}



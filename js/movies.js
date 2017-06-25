/*

Fügen Sie hier Ihre Javascript Codes
ein!

 */

function updateInformation()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myFunction(this);
        }
    };
    xhttp.open("GET", "xml/movies.xml", true);
    xhttp.send();
}

function myFunction(xml)
{
    var xmlDoc = xml.responseXML;
    document.getElementById("remarks_number").innerHTML = xmlDoc.getElementsByTagName("remark").length;
    document.getElementById("movies_number").innerHTML = xmlDoc.getElementsByTagName("movie").length;
}
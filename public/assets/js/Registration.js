function checkMail()
{
    var xhttp;
    var str1=document.getElementById('mail').value;
    if(str1.length===0)
    {
        return;
    }
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("error").innerHTML = this.responseText;
    }
    };
    xhttp.open("GET", "checkmail?q="+str1, true);
    xhttp.send();
}
class con{
  getXML(x){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
//        alert((this.responseText).trim());
        var get = new con();
        get.setPage((this.responseText).trim());
      }
    }
    xml.open("POST","he.php",true);
    xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xml.send("data="+x);
  }

  setPage(x){ //alert(x);
// alert((typeof x) === (typeof "on|vazio"));
// alert(" > x:"+x+" on|vazio " + (x == "on|vazio"));
    if(x == "on|vazio"){
      window.location.href = window.location.href;
    }
  }
}

document.getElementById("loginLandPri").addEventListener("click", function(){
  document.body.style.overflow = "hidden";
  document.getElementById("modal").classList.remove("one");
  document.getElementById("form").classList.remove("one");
});

document.getElementById("closeModal").addEventListener("click",function(){
  document.body.style.overflow = "auto";
  document.getElementById("form").classList.add("one");
  document.getElementById("modal").classList.add("one");
});
document.getElementById("enterLogin").addEventListener("click",function(){
 var c = new con();
  c.getXML("logi|"+ document.getElementById("nameLogin").value +"|"+ document.getElementById("passwdLogin").value);
});

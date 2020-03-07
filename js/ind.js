class screen{
  getXMLScreen(x){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
       // alert(this.responseText);
      //  return this.responseText;
        var c = new screen();
        c.setScreen(this.responseText);
      }
    }
    xml.open("POST","../css/csp.php",true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("setPage="+x);
  }
  setScreen(x){
    var s = x.split("|");
    document.getElementById("screenPage").innerHTML = s[0];
    document.getElementById("headScreen").setAttribute("href",("css/screen/"+s[0]+".css"));
    document.getElementById("screenWidthHeight").setAttribute("href","css/"+s[1]);
    var size = s[0].split("x");
    if(size[0] == 0){size[0] = "100%"; }
    if(size[0] == 1920 && size[1] == 0){
      document.getElementById("body").style.width = "100%";
      document.getElementById("body").style.height =  "100%";
    } else {
      // document.getElementById("body").style.width = size[0];
      // document.getElementById("body").style.height =  size[1];
      //
    //   document.getElementById("body").style.width = window.innerWidth;
    //   document.getElementById("body").style.height =  window.innerHeight;
     }
  }

  getScreen(){
      return "|Width:"+ window.innerWidth + "|Height:"+ window.innerHeight;
  }
}

var c = new screen();
window.onresize = function(){ c.getXMLScreen(c.getScreen()); }
window.onload   = function(){ c.getXMLScreen(c.getScreen()); }

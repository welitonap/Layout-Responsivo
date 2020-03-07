    // var e;
    const ti = {
      a: "OOOOKKK",
      b: "dd",
      d: function(x){ setInterval(x,1000); },
      c: function(e){ window.clearInterval(e); },
      e: function(){ alert(this.a + " " + this.b); },
      f: function(g,h){ alert(this.j + this.i + g + h); }
    };

    const t2 = {
      i: "weliton",
      j: "alves",
      l: "pereira",
    };

// class t{
//   contructor(){
//   }
// }
//
// (function () {  alert("Help"); }) ();
// var ed = function setff(){
//   var i=0;
//   var b=0;
//   do{
//
//     if(i == 3999){
//       if(i == 3999 && b == 4){ i = 4001; } else { i = 0; }
//     }
//
//     if(i==0){
//       b++;
//       alert("OOKK");
//     }
//     i++;
//   }while (i<4000);
// }
//
// var o = ti.d(ed);
// ti.c(o);
// var fs = ti;
//
// ti.f.apply(t2,[t2.i,t2.j]);

var fff = setInterval(function(){ alert("OKK"); }, 1000);
clearInterval(fff);
// ti.c(fff);

class cla{
  setXML(x){ // alert(x);
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var set = new cla();
        set.setPage((this.responseText).trim());
      }
    }
    xml.open("POST","he.php",true);
    xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xml.send("data="+x);
  }

  tim(){
    setInterval(function(){
      i++;
      document.getElementById("Did").style.border = i+"px solid hsla(2,0%,0%,0.3)";
      if(i > 10){
        this.clearInterval();
      }
    } ,1000);
  }

  setPage(x){
    switch ((x.split("|"))[0]) {
      case "off":
           window.location.href = window.location.href;
           break;
     case "UpDATEU":
     case "UpDATEP":
          var a = [];
          if(x == "UpDATEP"){ a = ["Did","Dcod","Dtipo","Dnome","Dquan","Dimg","Dscu"]; }
          if(x == "UpDATEU"){ a = ["Did","Dnome","Dpwd","Demail","Dtipo","Dpri","Dimg","Donoff","Dstatu"]; }
           for(var i=0;i<a.length;i++){
             document.getElementById(a[i]).style.border = "1px solid hsla(126,50%,50%,1)";
           }
           document.getElementById("retur-statu").classList.add("tru");
           document.getElementById("retur-statu").classList.remove("statu");
           var t = window.setTimeout(function(){
             document.getElementById(a[1]).style.border = i+"px solid hsla(2,0%,0%,0.3)";
               for(var i=1;i<a.length;i++){
                 document.getElementById(a[i]).style.border = "1px solid hsla(2,0%,0%,0.3)";
               }
               document.getElementById("retur-statu").classList.remove("tru");
               document.getElementById("retur-statu").classList.add("statu");
             }, 2500);
           break;

     case "Up":
      // case "ulUsUp":
      // case "ulUsCr":
      // case "ulUsDe":
            document.getElementById("statuBu").value = (x.split("|"))[0];
            document.getElementById("work").innerHTML = "";
            document.getElementById("work").innerHTML = (x.split("|"))[1];
            break;
      case "fProd":
      case "fProdSe":
      // case "ulPrUp":
      // case "ulPrCr":
      // case "ulPrDe":
            document.getElementById("statuBu").value = (x.split("|"))[0];
            document.getElementById("work").innerHTML = "";
            document.getElementById("work").innerHTML = (x.split("|"))[1];
            break;

      case "fDatas":
      case "fTable":
      case "fUser":
      case "fUserSe":
      // case "fUserFi":
      // case "fUserUp":
      // case "fUserCr":
      // case "fUserDe":
      // case "fUserSeFil":
            document.getElementById("statuBu").value = (x.split("|"))[0];
            document.getElementById("work").innerHTML = "";
            document.getElementById("work").innerHTML = (x.split("|"))[1];
            break;
      case "erro":

            document.getElementById("statuBu").value = (x.split("|"))[0];
            document.getElementById("work").innerHTML = "";
            document.getElementById("work").innerHTML = (x.split("|"))[1];
            break;
      default: alert("Falha 47");
            document.getElementById("work").innerHTML = "";
    }
  }

  setEfbt(x){
    switch (x) {
      // USERS
      case "ulUsUp":
            this.setXML("fu|"+this.getUsFoD());   break;

      case "ulUsSe":
            this.setXML("fs|fUserSe|"+this.getUsFo());   break;

      case "ulUsCr":
            this.setXML("fc|"+this.getUsFoD());   break;

      case "ulUsDe":
            this.setXML("fd|"+this.getUsFoD());   break;

      // PRODUT
      case "ulPrUp":
      // alert("pr|fProdSe|"+this.getPrFoD());
            this.setXML("pu|"+this.getPrFoD());
            break;

      case "ulPrSe":
      // alert("ps|fProdSe|"+this.getPrFo());
            this.setXML("ps|fProdSe|"+this.getPrFo());
            break;

      case "ulPrCr":
            this.setXML("pc|"+this.getPrFoD());
            break;

      case "ulPrDe":
            this.setXML("pd|"+this.getPrFoD());
            break;

      case "DpIn":
            document.getElementById("DpFl").style.width = "0%";
            setTimeout(function() {
              document.getElementById("DpFl").classList.add("one");
              document.getElementById("hi_1").classList.add("one");
              document.getElementById("hi_2").classList.add("one");
            }, 2);
            break;

      case "btView":
            document.getElementById("DpFl").style.width = "100%";
            document.getElementById("DpFl").classList.remove("one");
            document.getElementById("hi_1").classList.remove("one");
            break;

      case "hi_1":
            document.getElementById("DpFl").style.width = "30%";
            document.getElementById("hi_1").classList.add("one");
            document.getElementById("hi_2").classList.remove("one");
            break;
      case "hi_2":
           document.getElementById("DpFl").style.width = "100%";
           document.getElementById("hi_1").classList.remove("one");
           document.getElementById("hi_2").classList.add("one");
           break;

     case "Did":
     case "Dnome":
     case "Dpwd":
     case "Demail":
     case "Dtipo":
     case "Dpri":
     case "Dimg":
     case "Donoff":
     case "Dstatu":
           document.getElementById("DpFl").classList.add("one");
           document.getElementById("hi_1").classList.add("one");
           document.getElementById("hi_2").classList.add("one");
           break;

      default: alert("Falha...");

      }
    }
    // BUTTON FREE
  setList(x){
       this.setEfbt("DpIn");
       var c = document.getElementById(x);
       var l = c.getElementsByTagName("li");

       if(document.getElementById("statuBu").value == "fProdSe"){
         var a = ["Did","Dcod","Dtipo","Dnome","Dquan","Dimg","Dscu"];
       } else {
         var a = ["Did","Dnome","Dpwd","Demail","Dtipo","Dpri","Dimg","Dstatu","Donoff"];
       }

       for(var i=0;i<a.length;i++){
          if(l[i].childNodes[0].nodeValue  != ""){
            document.getElementById(a[i]).value = l[i].childNodes[0].nodeValue;
          }
       }
     }

   getUsFoD(){
         var a = ["Did","Dnome","Dpwd","Demail","Dtipo","Dpri","Dimg","Dstatu","Donoff"];
         var b = ["id", "nome", "pwd", "email", "tipo","priv", "img","statu","onoff"];
         var data = "";
         for(var i=0;i<a.length;i++){
           if(document.getElementById(a[i]).value != ""){
              data +=  ','+b[i] +":"+  document.getElementById(a[i]).value;
            } else {
              data +=  ','+b[i] +":"+ "";
            }
         }
         return "{" + data + "}";
       }

    getUsFo(){
      var a = ["","f_id","f_nome","f_pwd","f_email","f_type","f_priv","f_img","f_statu"];
      var b = ["",  "id",  "nome",  "pwd",  "email",  "tipo"  ,"priv",  "img",  "statu"];
      var data = "";
      for(var i=1;i<a.length;i++){
        if(("f_"+document.getElementById(a[i]).value) == a[i]){
          document.getElementById(a[i]).value = "";
        }
        if(document.getElementById(a[i]).value != ""){
           data +=  ','+b[i] +":"+  document.getElementById(a[i]).value;
         } else {
           data +=  ','+b[i] +":"+ "";
         }
      }
      txtInputU();
      return "{" + data + "}";
    }

    getPrFoD(){
          var a = ["Did","Dcod","Dtipo","Dnome","Dquan","Dimg","Dscu"];
          var b = ["id", "cod", "tipo", "nome", "quan","img", "scu"];
          var data = "";
          for(var i=0;i<a.length;i++){
            if(document.getElementById(a[i]).value != ""){
               data +=  ','+b[i] +":"+  document.getElementById(a[i]).value;
             } else {
               data +=  ','+b[i] +":"+ "";
             }
          }
          return "{" + data + "}";
        }
    getPrFo(){
        var a = ["D_id","D_cod","D_tipo","D_nome","D_quan","D_img","D_scu"];
        var b = ["id","cod","tipo","nome","quan","img","scu"];
        var data = "";
        for(var i=0;i<a.length;i++){
          if(("D_"+document.getElementById(a[i]).value) == a[i]){
            document.getElementById(a[i]).value = "";
          }
          if(document.getElementById(a[i]).value != ""){
             data +=  ','+b[i] +":"+  document.getElementById(a[i]).value;
           } else {
             data +=  ','+b[i] +":"+ "";
           }
        }
        txtInputP();
        return "{" + data + "}";
      }
}

function txtInputP(){
  var a =  ["id","cod","tipo","nome"];
  for(var i=0; i<a.length; i++){
    if(document.getElementById("D_" + a[i]).value.trim() == ""){
      document.getElementById("D_" + a[i]).value = a[i];
      document.getElementById("D_" + a[i]).style.color = "#848484";
    } else {
      document.getElementById("D_" + a[i]).style.color = "#000";
    }
  }
}
function txtInputU(){
  var a =  ["id","nome","email","type"];
  for(var i=0; i<a.length; i++){
    if(document.getElementById("f_" + a[i]).value.trim() == ""){
      document.getElementById("f_" + a[i]).value = a[i];
      document.getElementById("f_" + a[i]).style.color = "#848484";
    } else {
      document.getElementById("f_" + a[i]).style.color = "#000";
    }
  }
}
function texInp(x){
  var d = x.split("_");
  var a =  ["f_id","f_nome","f_email","f_type","D_id","D_cod","D_tipo","D_nome"];
  var v = d[0] + "_" + document.getElementById(x).value;
  for(var i=0; i<a.length; i++){
      if(x == a[i] && x == v){ document.getElementById(x).value = ""; }
    }
}
function checktedInpuS(x){
  var cl = new cla();
  cl.setXML("fs|fUserSe|" + cl.getUsFo());
}
function checktedInpuP(x){
  var cl = new cla();
  cl.setXML("ps|fProdSe|" + cl.getPrFo());
}
// LIST WORK
function setList(x){
  var cl = new cla();
  cl.setList(x);
}
// LIST WORK
function getE(x){
  var cl = new cla();
  cl.setEfbt(x);
}

/** /
document.getElementById("dat").addEventListener("click",function(){
  var c = new cla();
  c.setXML("fr|fDatas");
});
document.getElementById("tab").addEventListener("click",function(){
  var c = new cla();
  c.setXML("fr|fTable");
});
/**/
document.getElementById("pro").addEventListener("click",function(){
  document.getElementById("us").style.display = "none";
  document.getElementById("pr").style.display = "flex";
  var c = new cla();
  c.setXML("pr|fProd");
});
document.getElementById("use").addEventListener("click",function(){
  document.getElementById("us").style.display = "flex";
  document.getElementById("pr").style.display = "none";
  var c = new cla();
  c.setXML("fr|fUser");
});

document.getElementById("work").addEventListener("click",function(){
  document.getElementById("menuSele").classList.add("one");
});


document.getElementById("closeLogi").addEventListener("click",function(){
  var id = document.getElementById("idUser").value;
  var na = document.getElementById("nameUser").value;
  var im = document.getElementById("imgUser").value;
  var c = new cla();
  //alert("loginOff|"+id+"|"+na+"|"+im);
  c.setXML("loginOff|"+id+"|"+na+"|"+im);
});

document.getElementById("userlogin").addEventListener("click",function(){
  document.getElementById("menuSele").classList.remove("one");
});
document.getElementById("menuBa").addEventListener("click",function(){
  document.getElementById("menuSele").classList.add("one");
});
//

function openNav() {
  document.getElementById("mySidenav").style.display = "block";
}
function Close(id){
  document.getElementById(id).style.display = "None";
}
/*
x= setInterval(function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("dis").innerHTML = this.responseText;
      //alert(this.response);
    }
  };
  xhttp.open("GET", "countdown.html", true);
  xhttp.send();
},1000)
loadDoc();*/
//---------------------------------------------------------------//

 function dateCalc(dat, dest,title){
 
      
        // Set the date we're counting down to
      var countDownDate = new Date(dat).getTime();
      
      // Update the count down every 1 second
      var x = setInterval(function() {
      
        // Get today's date and time
        var now = new Date().getTime();
          
        // Find the distance between the count down date and now(in real time)
        var distance = countDownDate - now;
          
        // Time calculations/conversion for days, hours, minutes and seconds (to milisecs)
        var weeks = Math.floor(distance / (1000 * 60 * 60 * 24*7));
        var days = Math.floor(distance % (1000 * 60 * 60 * 24*7)/(1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
 
          
        x = document.getElementById(dest).childNodes;
       //func to display date results on card/sticker
        function fill(pos, val){
            i = x[pos].childNodes;
            i[0].innerHTML = val;
        }
        //displaying date one by one
        fill(0,weeks);
        fill(1,days);
        fill(2,hours);
        fill(3,minutes);
        fill(4,seconds);

        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById(dest).innerHTML = "EXPIRED";
          document.getElementById(dest).style.fontSize = "2em";
          document.getElementById(dest).style.color = "darkred";
        }
      }, 1000/*refresh every 1000ms*/);
    }


   //displaying count down 
    function format(date,title){

      var i=0;
      
      var x = document.getElementById("container");

      var fdiv = document.createElement("div");
      fdiv.className ="demo_div";
      //fdiv.innerHTML = "ghjghkgkh";
      x.appendChild(fdiv);
      
      var titl = document.createElement("p");

    
      var exp_title = document.createElement("p");
      exp_title.innerHTML =title;
      exp_title.style.color="darkgreen";
      exp_title.style.fontSize="3 rem";
   
      titl.innerHTML ="Countdown for "+exp_title.innerHTML+"<br>" +date +":";
    

      
      fdiv.appendChild(titl);

      var fdiv2 = document.createElement("div");
      fdiv2.className ="list_div";
      fdiv.appendChild(fdiv2);

      var node1 = document.createElement("ul");
      node1.id = title.toLowerCase();
      //alert(node1.id);
      fdiv2.appendChild(node1);

      function Cret(seg){
      var d = document.createElement("li");
      var span1 = document.createElement("span")
      var span2 = document.createElement("span")
      span1.id = String(seg);
      span2.innerHTML= String(seg);
      d.appendChild(span1);
      d.appendChild(span2);
      node1.appendChild(d);

      }
      Cret("week");
      Cret("day");
      Cret("hour");
      Cret("min");
      Cret("sec");
    

    dateCalc(date,node1.id,title);
    //dateCalc("Oct 27, 2021 15:37:25", "div2");

    }
    
    format("Oct 27, 2026 15:37:16","AIT");
    format("Oct 28, 2027 11:31:15","Going Home!");
    format("Sep 17, 2026 15:37:25", "BURKHARDT");
    format("Dec 30, 2025 15:33:59", "End Of BRANT");
    format("Jan 22, 2026 15:47:24", "25U Program");
    format("Oct 28, 2025 11:31:15","End of class!");

    
 
    
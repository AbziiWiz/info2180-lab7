//JavaScript for lab 7
$(document).ready(function(){
    
    document.getElementById("lookup").addEventListener("click", function(e){
          
          
          e.preventDefault();
          
                  var x = new XMLHttpRequest();
                   x.onreadystatechange = function(){
                       //alert("So far so good");
                       //alert(x.readyState + " " + x.status);
                       if(x.readyState == XMLHttpRequest.DONE) {
                            if(x.status == 200){
                                
                                document.getElementById("result").innerHTML = x.responseText;
                                
                            }
                            else {
                                   alert("Issues with request");
                            }
                       }
                   };
                   
                   var text =document.getElementById('country').value;
                   var key = text;
                   if(key == ""){
                       
                       alert("Text field must not be empty");
                   }
                   else{
                    
                      x.open("GET", "world.php?country=" + key, true);
                      x.send();
                   }
    });
});
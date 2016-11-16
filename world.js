//JavaScript for lab 7
$(document).ready(function(){
    var text;
    var key;
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
                   
                   
                     if(document.getElementById("All").checked){
                           
                              //alert("Checked");  
                            //text =document.getElementById('All').name;
                            //key = text + "=" + document.getElementById('All').value;;
                            key = "all=true";
                            x.open("GET", "world.php?" + key, true);
                            x.send();
                     }
                     else{
                         
                          text =document.getElementById('country').value;
                          key = text;
                          if(key == ""){
                       
                              key = "empty";
                              x.open("GET", "world.php?country=" + key, true);
                              x.send();
                           }
                           else{
                               
                               x.open("GET", "world.php?country=" + key, true);
                                x.send();
                           }
                   
                    }
                    
                      
    });
});
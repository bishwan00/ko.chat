// $(document).ready(function(){

//     $("#Engineering").click(function() {
//         alert("Ddfv");
// $("#departments").html(' <option>'+'57875'+'</option>');
        
//     })
// })


function reg(){
var x=document.forms["frm"];

 if(x.elements[0].value.length==0){
   
document.getElementById("first-name").style.borderBottomColor="red";


 }
    else{
        document.getElementById("first-name").style.borderBottomColor="#04ca1e";

        
    }
    if(x.elements[1].value.length==0){
   
        document.getElementById("last-name").style.borderBottomColor="red";
         
         }
            else{
              
        document.getElementById("last-name").style.borderBottomColor="#04ca1e";
    
                
            }

            if(x.elements[2].value.length==0){

                document.getElementById("email").style.borderBottomColor="red";
          
                 }
                    else{
         
                document.getElementById("email").style.borderBottomColor="#04ca1e";
                        
                    }
                    var q=true;
                for(var i=0;i<x.elements[2].value.length;i++){
                    if(q){
                  if(x.elements[2].value[i]=="@"){
                      q=false;
                    document.getElementById("email").style.borderBottomColor="#04ca1e";
                  }
                
                  else{
                      
                document.getElementById("email").style.borderBottomColor="red";
                  }
                }
                }



    if(x.elements[3].value.length<8){
        document.getElementById("password").style.borderBottomColor="red";
        
    }
    else{
        document.getElementById("password").style.borderBottomColor="#04ca1e";
    }
    if(x.elements[4].value!=x.elements[3].value||x.elements[4].value.length<8){
        document.getElementById("confirm-password").style.borderBottomColor="red";
    }
    else{
        document.getElementById("confirm-password").style.borderBottomColor="#04ca1e";
    }

}
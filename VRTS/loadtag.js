function loadcomu(str)
 {
 // if (str=="")
   // { 
   // document.getElementById("cnamespan").innerHTML="<span style='color:red'>* card name is required!</span>";
   // return;
   // }
xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
	   
     {
		 var result = xmlhttp.responseText;
		 //console.log(result);

		document.getElementById("cnamespan").innerHTML=result；
	 

     }
   }
 xmlhttp.open("GET","loadcomu.php?VIN="+str,true);
 xmlhttp.send();
 }
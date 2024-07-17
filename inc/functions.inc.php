<?php


?>

<script type="text/javascript">

/****************************************************
Function name :- isNumericKey
Developer :- Shaikh Aamer
Parameters :- 	1. e (key event)
Purpose :- to allow only numeric keys to enter
Returns :- true for numeric key and false for other keys
*****************************************************/


function isNumericKey(e)
	{
		if (window.event) { var charCode = window.event.keyCode; }
		else if (e) { var charCode = e.which; }
		else { return true; }
		
		if (charCode > 31 && (charCode < 48 || charCode > 57)) { return false; }
		
		return true;
	}
	
/****************************************************
Function name :- isNumericKey and plus
Developer :- Shaikh Aamer
Parameters :- 	1. e (key event)
Purpose :- to allow only numeric keys to enter
Returns :- true for numeric key and false for other keys
*****************************************************/


function isNumericKey1(e)
	{
		  if (window.event) { var charCode = window.event.keyCode; }
		else if (e) 
		{ 
			var charCode = e.which; 
		}
		else 
		{ 
			return true; 
		}
		
		if(charCode==43)
		{
			
			return true;
		}
		else if (charCode > 31 && (charCode < 48 || charCode > 57)) 
		{ 
			return false; 
		}
		
		
		return true;
	}


/****************************************************
Function name :- lettersOnly
Developer :- Shaikh Aamer
Parameters :- 	1. e (key event)
Purpose :- to allow only Letters to enter
Returns :- true for letters key and false for other keys
*****************************************************/
function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (evt.keyCode == 8 || evt.keyCode == 46 || evt.keyCode == 37 || evt.keyCode == 39 || evt.keyCode == 32) {
        return true;
    } else if (charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        // alert("Enter letters only.");
        return false;
    }
    return true;
}
</script>
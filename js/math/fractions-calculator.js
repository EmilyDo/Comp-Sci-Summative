alert("testing"); 

function getNum1(){
  return document.getElementById("num1").innerText; 
}

function getNum2(){
  return document.getElementById("num2").innerText; 
}

function getDen1(){
  return document.getElementById("den1").innerText; 
}

function getDen2(){
  return document.getElementById("den2").innerText; 
}

function getOperator(){
  return document.getElementById("operator").innerText; 
}

function calculateDen(){
  return getDen1()*getDen2(); 
}

function simplify(n, d){

  var minimum = Math.min(n, d); 
  for(i = minimum; i > 1; i--){ /*start with the biggest possible factor, don't include 1 */ 
    if(minimum % 1 == 0){ /*if the minimum number (numerator or denominator is divisible by i */
      
      if(Math.max(n, d) % i == 0){ /*if the other number is divisible by i too */
        d = d/i; /*does this change the variables ouside of this function or only in this function? */ 
        n = n/i; 
      }

    }
  }

}

function subtract(){
  var numerator = getNum1()*getDen2() - getNum2()*getDen1(); 
  var denominator = calculateDen(); 
  return simplify(numerator, denominator); 
}

function add(){
  var numerator = getNum1()*getDen2() + getNum2()*getDen1(); 
  var denominator = calculateDen(); 
  return simplify(numerator, denominator); 
}

function multiply(){
  var numerator = getNum1()*getNum2(); 
  var denominator = calculateDen(); 
  return simplify(numerator, denominator); 
}

function divide(){
  var numerator = getNum1()*getDen2(); 
  var denominator = getDen1()*getNum2(); 
  return simplify(numerator, denominator); 
}



function calculateAnswer(){
	alert("testing"); /*doesnt work*/
  if(document.getElementById("calculate").addEventListener('click',function(){
	  window.alert("the calculate button was clicked"); 
    if(getOperator() == "add"){
    	document.getElementById("answer") = add(); 
    }else if(getOperator() == "subtract"){
		document.getElementById("answer") = subtract(); 
    }else if(getOperator() == "multiply"){
      return multiply(); 
    }else if(getOperator() == "divide"){
      return divide(); 
    }
  }))
}
  

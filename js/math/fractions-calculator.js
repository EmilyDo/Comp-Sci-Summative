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
  




/*function setfocus() {
	document.calcform.x.focus();
}
function calc() {
	x = document.calcform.x.value;
 	y = calcfunc(x);
 	y = roundresult(y);
 	document.calcform.y.value = y
}
function calc_a() {
	x = document.calcform2.x.value;
 	y = calcfunc_a(x);
 	y = roundresult(y);
 	document.calcform2.y.value = y
}
function calc3() {
	x1 = document.calcform.x.value;
	x2 = document.calcform.x2.value;
 	y = calcfunc(x1,x2);
 	y = roundresult(y);
 	document.calcform.y.value = y;
}
function calc4() {
	a = document.calcform.x.value;
	b = document.calcform.x2.value;
	c = document.calcform.x3.value;
	d = b*b-4*a*c;
 	document.calcform.y0.value = roundresult(d);
 	if( d>=0 )
 	{
	 	document.calcform.y1.value = roundresult((-b+Math.sqrt(d))/(2*a));
	 	document.calcform.y2.value = roundresult((-b-Math.sqrt(d))/(2*a));
 	}
 	else
 	{
 		re = roundresult(-b/(2*a));
 		im = roundresult(Math.sqrt(-d)/(2*a));
	 	document.calcform.y1.value = re+' + i'+im;
	 	document.calcform.y2.value = re+' - i'+im;
 	}
 	b=-b;
 	document.calcform.y3.value = '('+b.toString()+' \xb1 \u221A('+d.toString()+')) / (2\xd7'+a.toString()+')';
}
function calc5() {
	x = document.calcform.x.value;
 	y = calcfunc(x);
 	y = roundresult(y);
 	if( x>0 ) y='\u00B1'+y;
 	document.calcform.y.value = y
}
function calc6() {
	x1 = document.calcform.x.value;
	x2 = document.calcform.x2.value;
	val=x2;
	if( x2<0 ) val=-val;
 	y = calcfunc(x1,val);
 	y = roundresult(y);
 	if( x2>0 && (x1/2)==Math.round(x1/2) ) y='\u00B1'+y;
 	if( x2<0 ) {
 		if( (x1/2)==Math.round(x1/2) )
 			y='NaN';
 		else
 			y=-y;
 	}
 	document.calcform.y.value = y;
}
function roundresult(x) {
 	y = parseFloat(x);
 	y = roundnum(y,10);
 	return y;
}
function roundnum(x,p) {
	var i;
 	var n=parseFloat(x);
	var m=n.toPrecision(p+1);
	var y=String(m);
	i=y.indexOf('e');
	if( i==-1 )	i=y.length;
	j=y.indexOf('.');
	if( i>j && j!=-1 ) 
	{
		while(i>0)
		{
			if(y.charAt(--i)=='0')
				y = removeAt(y,i);
			else
				break;
		}
		if(y.charAt(i)=='.')
			y = removeAt(y,i);
	}
	return y;
}
function roundnum2(x,p) {
	var i;
 	var n=parseFloat(x);
	var m=n.toFixed(p);
	var y=String(m);
	i=y.length;
	j=y.indexOf('.');
	if( i>j && j!=-1 ) 
	{
		while(i>0)
		{
			if(y.charAt(--i)=='0')
				y = removeAt(y,i);
			else
				break;
		}
		if(y.charAt(i)=='.')
			y = removeAt(y,i);
	}
	return y;
}
function removeAt(s,i) {
	s = s.substring(0,i)+s.substring(i+1,s.length);
	return s;
}
var gcd = function(a, b) {
    if ( ! b) {
        return a;
    }
    return gcd(b, a % b);
};
*/
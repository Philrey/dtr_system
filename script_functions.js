function changeDisplay(idName,disp){
	var toShow = document.getElementById(idName);
	
	toShow.style.display = disp;
}
function changeColor(elementId,color){
	var toChange = document.getElementById(elementId);
	
	toChange.style = "background-color:"+color+";";
}
function backToTop(idName,newValue) {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
	
	var inp = document.getElementById(idName);
	inp.value = newValue;
}
function addUnit(idName,newValue){
	var inp = document.getElementById(idName);
	inp.value = newValue;
}
function redirectPage(idName,newPage){
	var inp = document.getElementById(idName);
	location.href = newPage;
}
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;     
	var originalContents = document.body.innerHTML;  
	document.body.innerHTML = printContents;      
	window.print();      
	document.body.innerHTML = originalContents;
   }


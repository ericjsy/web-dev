function hideGluten() {
	var listGluten = document.getElementsByClassName('gluten');
	
	if ( document.getElementById('chkGlutenFree').checked == true ){
		for ( var i=0; i<listGluten.length; i++ ){
			listGluten[i].style.visibility = "hidden"; /*DISPLAY = "NONE"*/
		}
	} else {
		for ( var j=0; j<listGluten.length; j++ ){
			listGluten[j].style.display = "block";
		}
	}
}

function hideEgg() {
	var listEgg = document.getElementsByClassName('egg');
	
	if ( document.getElementById('chkEggFree').checked == true ){
		for ( var i=0; i<listEgg.length; i++ ){
			listEgg[i].style.visibility = "hidden";
		}
	} else {
		for ( var j=0; j<listEgg.length; j++ ){
			listEgg[j].style.display = "block";
		}
	}
}

function hideMilk() {
	var listMilk = document.getElementsByClassName('milk');
	
	if ( document.getElementById('chkLactoseFree').checked == true ){
		for ( var i=0; i<listMilk.length; i++ ){
			listMilk[i].style.visibility = "hidden";
		}
	} else {
		for ( var j=0; j<listMilk.length; j++ ){
			listMilk[j].style.display = "block";
		}
	}
}

function hidePeanut() {
	var listNut = document.getElementsByClassName('nut');
	
	if ( document.getElementById('chkPeanutFree').checked == true ){
		for ( var i=0; i<listNut.length; i++ ){
			listNut[i].style.visibility = "hidden";
		}
	} else {
		for ( var j=0; j<listNut.length; j++ ){
			listNut[j].style.display = "block";
		}
	}
}

function resetAll() {
	var listGluten = document.getElementsByClassName('gluten');
	for ( var i=0; i<listGluten.length; i++ ){
			listGluten[i].style.visibility = "visible"; /*DISPLAY="BLOCK"*/
		}
	document.getElementById('chkGlutenFree').checked = false;

	var listEgg = document.getElementsByClassName('egg');
	for ( var i=0; i<listEgg.length; i++ ){
			listEgg[i].style.visibility = "visible";
		}
	document.getElementById('chkEggFree').checked = false;
	
	var listMilk = document.getElementsByClassName('milk');
	for ( var i=0; i<listMilk.length; i++ ){
			listMilk[i].style.visibility = "visible";
		}
	document.getElementById('chkLactoseFree').checked = false;	
			
	var listNut = document.getElementsByClassName('nut');
	for ( var i=0; i<listNut.length; i++ ){
			listNut[i].style.visibility = "visible";
		}
	document.getElementById('chkPeanutFree').checked = false;
}

/* Helper functions */

function $(id){
	var element = document.getElementById(id);

	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

function validtopic() {

	var topicinfo = ['topic', 'detail'];

	for ( var j = 0; j < topicinfo.length; j++ ) {
		$(topicinfo[j]).style.border = "";	
	}
	
	for ( var i = 0; i < topicinfo.length; i++ ) {

		if ( $(topicinfo[i]).value.length < 1 ) {
			$('errLogin').innerHTML = " Please fill in all required fields.";
			$(topicinfo[i]).style.border = "1px solid red";
			$(topicinfo[i]).focus();
			return false;
		}
	
	}

}

function validresponse() {

	$('answer').style.border = "";	
	
	if ( $('answer').value.length < 1 ) {
		$('errLogin').innerHTML = " Please fill in all required fields.";
		$('answer').style.border = "1px solid red";
		$('answer').focus();
		return false;
	}

}
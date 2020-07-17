function leftMenu(){
	if(parent.document.getElementsByTagName( 'frameset' )[ 1 ].cols=="0,*"){
	parent.document.getElementsByTagName( 'frameset' )[ 1 ].cols="250,*";
	} else {
	parent.document.getElementsByTagName( 'frameset' )[ 1 ].cols="0,*";
	}
}
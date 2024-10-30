detectIncognito().then((result) => {
	console.log(result.browserName, result.isPrivate);
 	  jQuery(document).ready(function(){
		if( result.isPrivate && incognitowindow_settings['incognitowindow_on'] === 'on' ){
			var timedelay = ( incognitowindow_settings['incognitowindow_timedelay'] != '' ? incognitowindow_settings['incognitowindow_timedelay'] : 0 );
			var overlay = ( incognitowindow_settings['incognitowindow_overlay'] == 'on' ) ? 'incognito_mode_isPrivateMode__overlay' : '';
			console.log('incognito_mode');
			setTimeout(function(){
				jQuery('body').append('<div style="background-color:' + incognitowindow_settings['incognitowindow_backgroundcolor'] + '" class="incognito_mode_isPrivateMode ' + overlay + '"><p style="font-size:' + incognitowindow_settings['incognitowindow_fontsize'] + '; color:' + incognitowindow_settings['incognitowindow_color'] + ';">' + incognitowindow_settings['incognitowindow_message'] + '</p></div>');
			}, timedelay );
		}
	});
});


function add_notice($html){
	jQuery.notify({
	  hr_content: $html,
	}, { 
		style: 'hr_notice',
		autoHideDelay: 5000,
		clickToHide: false,
		globalPosition: 'bottom right',
		});	
}
jQuery.notify.addStyle('hr_notice', {
  html: 
	'<div class="alert_pop" data-notify-html="hr_content"></div>'
});

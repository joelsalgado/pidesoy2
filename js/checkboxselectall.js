$('#selectall').change(function () 
{
	if ($(this).is(':checked')) 
	{
		$('#user-update input[type=checkbox]').prop('checked', true);
	} 
	else 
	{
		$('#user-update input[type=checkbox]').prop('checked', false);
	}
});
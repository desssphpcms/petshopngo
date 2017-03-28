
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery MultiSelect Widget Demo</title>
<link rel="stylesheet" type="text/css" href="jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.multiselect.js"></script>
<script type="text/javascript">
$(function(){

	$("select").multiselect({
		selectedList: 2
	});
	
});
</script>

</head>
<body onload="prettyPrint();">

<h2>Displaying options in a list</h2>

<h3>Using the <code>selectedList</code> Parameter</h3>
<p>The selectedList parameter is a boolean/numeric value denoting whether or not to display the checked opens in a list, and how many. A number greater than 0 denotes the maximum number of list items to display before switching over to the selectedText parameter.</p>

<form>
	<p>
		<select name="example-list" multiple="multiple" style="width:400px">
		<option value="option1">Option 1</option>
		<option value="option2">Option 2</option>
		<option value="option3">Option 3</option>
		<option value="option4">Option 4</option>
		<option value="option5">Option 5</option>
		<option value="option6">Option 6</option>
		<option value="option7">Option 7</option>
		</select>
	</p>
</form>

<h3>Passing a Function to <code>selectedText</code></h3>
<p>Passing a function to the <code>selectedText</code> option gives you low-level control of what the widget displays.  The function receives three arguments:
the number of checkboxes checked, the total number of checkboxes, and an array of the checkboxes (DOM elements) that were checked.  Example usage:</p>

<p>The <code>selectedList</code> option is simply a convenience method for the <code>selectedText</code> option.</p>



</body>
</html>

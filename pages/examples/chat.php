<html>

<?php

include 'config.php';

$admin = "syafiq";
$user = "anda";

?>

<head>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<h2>Chatting By Group</h2>

<div id="news" onload="GetNews()"></div>
<script>
function GetNews() {
	$.ajax({
		url: "loaddata.php?id=1", 
		success: (function (result) {
			$("#news").html(result);
		})
	})
};

GetNews(); // To output when the page loads
setInterval(GetNews, (2 * 1000)); // x * 1000 to get it in seconds
</script>

<form class="form-align">
	<div class="input-group">
		<input type="hidden" name="user" value="<?php echo $admin; ?>">
		<input type="text" name="message" class="form-control" >
		<input type="hidden" name="chat_id" class="form-control" value="1">
		<span class="input-group-btn">
		<button type="submit" name="submit" class="btn btn-default">lalala</button>
		</span>
	</div>
</form>
<script>
  $(function () {
	$('form').on('submit', function (e) {
	  e.preventDefault();
	  $.ajax({
		type: 'post',
		url: 'post.php',
		data: $('form').serialize(),
	  });
	});
  });
</script>


<html>
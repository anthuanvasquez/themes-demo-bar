<?php 

global $redirect, $current_theme;

$redirect = true;

require_once( "index.php" );

?>
<!Doctype HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Premium Themes</title> 
	<script type="text/javascript">
		top.location.href = 'http://themes.anthuanvasquez.net/?theme=<?php echo $current_theme; ?>';
	</script>     
</head>
<body>
</body>
</html>
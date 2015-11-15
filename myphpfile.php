<?php include 'rbtreeclass.php';
if ($tree->root==null){
	echo "the page was reset";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>To site tou Alekou</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">
		<div id="main" class="wrapper style1">
		<div class="container">

	<header class="major">
		<h2>A red black tree implementation</h2>
	</header>


<?php 

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST['submit'])){
		$name = test_input($_POST["name"]);
		$x=new RbNode();
		$x->key=$name;
		$tree->insert($tree,$x);
	}
	if(!empty($_POST['submit2'])){
		$skiniko=$tree->printing();
		echo $skiniko;
	}

//}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<header class="major">

<form name="inputform" method="post" action=""> 
   Key: <input  type="text" name="name" size="5">
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
						</header>

<br><br>
<form method="post" action=""> 
   <input type="submit" name="submit2" value="Print the tree"> 
</form>
<br><br>
<header class="major">
	<h2>The Tree</h2>
	</header>

<?php
echo "";
echo $tree->printing();
echo "<br>";
?>
</div>
</div>
</div>
</body>
</html>
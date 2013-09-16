<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Timthumb Example</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="jquery.js"></script>
</head>

<body>
<div class="box">
	<img src="exm.jpg" title="Images example" width="300"/>
    <p>Normal</p>
</div>

<div class="box">
	<img src="timthumb.php?src=http://localhost/izwebz/timthumb/exm.jpg" title="Images example"/>
    <p>Using timthumb<br />Default 100x100x90</p>
</div>

<div class="box">
	<img src="timthumb.php?src=http://localhost/izwebz/timthumb/exm.jpg&w=300" title="Images example"/>
    <p>Using timthumb<br />Only width = 300px</p>
</div>

<div class="box">
	<img src="timthumb.php?src=http://localhost/izwebz/timthumb/exm.jpg&h=300" title="Images example"/>
    <p>Using timthumb<br />Only height:300px</p>
</div>

<div class="box">
	<img src="timthumb.php?src=http://localhost/izwebz/timthumb/exm.jpg&w=300&h=150" title="Images example"/>
    <p>Using timthumb<br />width:300px & height:150px</p>
</div>

<div class="box">
	<img src="timthumb.php?src=http://localhost/izwebz/timthumb/exm.jpg&w=600&h=150&q=75" />
    <p>Using timthumb<br />width:600px & height:150px & qualty:75</p>
</div>













































</body>
</html>
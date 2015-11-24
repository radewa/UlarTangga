<!DOCTYPE html>

<html>

<head>
	<title>Ular Tangga</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
	
<body>
	<div id="leftOption">
		<h2>Ular Tangga</h2>
		<img src="Logo Ular Tangga.png" alt="Logo Ular Tangga" style="width:125px; height:125px">
		<br/><br/>
		<form method="post" name="Pilih Permainan" action="UlarTangga.php">
			<h3>Pilih Jenis Permainan</h3>
			<select name="jenis" id="pilihan">
				<option value="1">Player 1 vs Player 2</option>
				<option value="2">Player 1 vs Komputer</option>
			</select><br/><br/>
			<input type="Submit" value = "Permainan Baru"><br/><br/>
		</form>
	</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Excel Uploading PHP</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
	<h1>Excel Upload</h1>


	<form method="POST" action="excelUpload.php" enctype="multipart/form-data">
		<div class="form-group">
			<label>Upload Excel File</label>
			<input type="file" name="file" class="form-control" required>
		</div>
        <div class="form-group">
			<label for="sem">SEM</label>
			<select name="sem" class="form-control" required>
				<option value="">select</option>
				<option value="11">1-1</option>
				<option value="12">1-2</option>
				<option value="21">2-1</option>
				<option value="22">2-2</option>
				<option value="31">3-1</option>
				<option value="32">3-2</option>
				<option value="41">4-1</option>
				<option value="42">4-2</option>
			</select>
		</div>
		<div class="form-group">
			<label for="year">Year of exam</label>
			<select name="year" class="form-control" required>
				<option value="">select</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
			</select>
		</div>
		<div class="form-group">
			<label for="month">Month of exam</label>
			<select name="month" class="form-control" required>
				<option value="">select</option>
				<option value="01">JAN</option>
				<option value="02">FEB</option>
				<option value="03">MAR</option>
				<option value="04">APR</option>
				<option value="05">MAY</option>
				<option value="06">JUN</option>
				<option value="07">JUL</option>
				<option value="08">AUG</option>
				<option value="09">SEP</option>
				<option value="10">OCT</option>
				<option value="11">NOV</option>
				<option value="12">DEC</option>
			</select>
		</div>
		<div class="form-group">
			<label for="type">Type of exam</label>
			<select name="type" class="form-control" required>
				<option value="">select</option>
				<option value="rs">Regular /Supply</option>
				<option value="rv">Revaluation / Recounting</option>

			</select>
		</div>
		<div class="form-group">
			<label>USER NAME</label>
			<input type="text" name="username" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<div class="form-group">
			<button type="submit" name="Submit" class="btn btn-success">Upload</button>
		</div>
		
	</form>
</div>


</body>
</html>
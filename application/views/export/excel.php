<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title><?php echo $title ?></title>
 <style type="text/css">
 body {
 background-color: green;
 font-family: Arial;
 }
 main {
 width: 80%;
 padding: 20px;
 background-color: white;
 min-height: 300px;
 border-radius: 5px;
 margin: 30px auto;
 }
 table {
 border-top: solid thin #000;
 border-collapse: collapse;
 }
 th, td {
 border-top: border-top: solid thin #000;
 padding: 6px 12px;
 }
 </style>
</head>

<body>
 <main>
 <h1>Laporan Excel</h1>
 <p>
 <form action="<?php echo base_url('datanilai/export_excel') ?>" method="post"> 
 	<input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
 	<input type="submit" name="submit" value="download">	
 </form>

 <table border="1" width="100%">
 <thead>
 <tr>
	<th>Nama</th>
	<th>Kelas</th>
	<th>NPM</th>
	<th>KEHADIRAN 1</th>
	<th>AL 1</th>
	<th>TA 1</th>
	<th>KEHADIRAN 2</th>
	<th>AL 2</th>
	<th>TA 2</th>
	<th>KEHADIRAN 3</th>
	<th>AL 3</th>
	<th>TA 3</th>
	<th>KEHADIRAN 4</th>
	<th>AL 4</th>
	<th>TA 4</th>
	<th>KEHADIRAN 5</th>
	<th>AL 5</th>
	<th>TA 5</th>
	<th>KEHADIRAN 6</th>
	<th>AL 6</th>
	<th>TA 6</th>
	<th>KEHADIRAN 7</th>
	<th>AL 7</th>
	<th>TA 7</th>
	<th>QUIZ 1</th>
	<th>QUIZ 2</th>
	<th>UJIAN</th>
 </tr>
 </thead>
 <tbody>
 <?php $i=1; foreach($user as $user) { ?>
 <tr>
		<td><?php echo $user->nama ?></td>
		<td><?php echo $user->kelas ?></td>
		<td><?php echo $user->npm ?></td>

		<td><?php echo $user->kehadiran1 ?></td>
		<td><?php echo $user->al1 ?></td>
		<td><?php echo $user->ta1 ?></td>

		<td><?php echo $user->kehadiran2 ?></td>
		<td><?php echo $user->al2 ?></td>
		<td><?php echo $user->ta2 ?></td>

		<td><?php echo $user->kehadiran3 ?></td>
		<td><?php echo $user->al3 ?></td>
		<td><?php echo $user->ta3 ?></td>

		<td><?php echo $user->kehadiran4 ?></td>
		<td><?php echo $user->al4 ?></td>
		<td><?php echo $user->ta4 ?></td>

		<td><?php echo $user->kehadiran5 ?></td>
		<td><?php echo $user->al5 ?></td>
		<td><?php echo $user->ta5 ?></td>

		<td><?php echo $user->kehadiran6 ?></td>
		<td><?php echo $user->al6 ?></td>
		<td><?php echo $user->ta6 ?></td>

		<td><?php echo $user->kehadiran7 ?></td>
		<td><?php echo $user->al7 ?></td>
		<td><?php echo $user->ta7 ?></td>

		<td><?php echo $user->quiz1 ?></td>
		<td><?php echo $user->quiz2 ?></td>
		<td><?php echo $user->ujian ?></td>

 </tr>
 <?php $i++; } ?>
 </tbody>
 </table>
 </main>
</body>
</html>
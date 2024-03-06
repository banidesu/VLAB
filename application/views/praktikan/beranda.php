<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<i class="ace-icon fa fa-check green"></i>
	Selamat Datang Di Virtual Laboratorium Manajemen Menengah
</div>
	<div class="col-xs-6" >
			<div class="col-sm-12 widget-container-col">
										<div class="widget-box widget-color-blue">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">
													<i class="ace-icon fa fa-table"></i>
													Data Nilai
												</h5>
												<div class="widget-toolbar widget-toolbar-light no-border">
												</div>
											</div>
											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr style="text-align: center;">
																<th style="text-align: center;">BAB</th>
																<th style="text-align: center;">Kehadiran</th>
																<th style="text-align: center;">Activity Lab</th>
										 						<th style="text-align: center;">Tugas Akhir </th>
															</tr>
														</thead>
								<?php
									foreach ($datanilai->result() as $value) {
											$kehadiran1 = $value->kehadiran1;
											$al1 = $value->al1;
											$ta1 = $value->ta1;
											$kehadiran2 = $value->kehadiran2;
											$al2 = $value->al2;
											$ta2 = $value->ta2;
											$kehadiran3 = $value->kehadiran3;
											$al3 = $value->al3;
											$ta3 = $value->ta3;
											$kehadiran4 = $value->kehadiran4;
											$al4 = $value->al4;
											$ta4 = $value->ta4;
											$kehadiran5 = $value->kehadiran5;
											$al5 = $value->al5;
											$ta5 = $value->ta5;
											$kehadiran6 = $value->kehadiran6;
											$al6 = $value->al6;
											$ta6 = $value->ta6;
											$kehadiran7 = $value->kehadiran7;
											$al7 = $value->al7;
											$ta7 = $value->ta7;
									}

									if ($kehadiran1 != 0 ){
										$kehadiran1 = 'class="ace-icon fa fa-check"';
									} else {
										$kehadiran1 = 'class="ace-icon fa fa-minus"';
									}
									if ($kehadiran2 != 0 ){
										$kehadiran2 = 'class="ace-icon fa fa-check"';
									} else {
										$kehadiran2 = 'class="ace-icon fa fa-minus"';
									}
									if ($kehadiran3 != 0 ){
										$kehadiran3 = 'class="ace-icon fa fa-check"';
									} else {
										$kehadiran3 = 'class="ace-icon fa fa-minus"';
									}
									if ($kehadiran4 != 0 ){
										$kehadiran4 = 'class="ace-icon fa fa-check"';
									} else {
										$kehadiran4 = 'class="ace-icon fa fa-minus"';
									}
									if ($kehadiran5 != 0 ){
										$kehadiran5 = 'class="ace-icon fa fa-check"';
									} else {
										$kehadiran5 = 'class="ace-icon fa fa-minus"';
									}
									if ($kehadiran6 != 0 ){
										$kehadiran6 = 'class="ace-icon fa fa-check"';
									} else {
										$kehadiran6 = 'class="ace-icon fa fa-minus"';
									}
									if ($kehadiran7 != 0 ){
										$kehadiran7 = 'class="ace-icon fa fa-check"';
									} else {
										$kehadiran7 = 'class="ace-icon fa fa-minus"';
									}

									$ta1 = $ta1 * 5;
									$ta2 = $ta2 * 5;
									$ta3 = $ta3 * 5;
									$ta4 = $ta4 * 5;
									$ta5 = $ta5 * 5;
									$ta6 = $ta6 * 5;
									$ta7 = $ta7 * 5;

									if ($ta1 == 10 ){
										$ta1 = 0;
									}
									elseif ( $ta1 != 0  ) {
										$ta1 = $ta1;
									}
									else {
										$ta1 = '<li class="ace-icon fa fa-minus" >';
									}



									if  ( $ta2 == 10 ) {
										$ta2 = 0;
									}
									elseif ($ta2 != 0)
									{
										$ta2 		= $ta2;
									}
									else 
									{
										$ta2 = '<li class="ace-icon fa fa-minus" >';
									}


									if ($ta3 == 10)
									{
										$ta3 = 0;
									}
									elseif ( $ta3 != 0 ) 
									{
										$ta3 = $ta3;
									}
									else 
									{
										$ta3 = '<li class="ace-icon fa fa-minus" >';
									}


									if ( $ta4 == 10 ) 
									{
										$ta4 = 0;
									}
									elseif ($ta4 != 0)
									{
										$ta4 = $ta4;
									}
									else 
									{
										$ta4 = '<li class="ace-icon fa fa-minus" >';
									}



									if ( $ta5 == 10 ) 
									{
										$ta5 = 0;
									}
									elseif ($ta5 != 0)
									{
										$ta5 = $ta5;
									}
									else 
									{
										$ta5 = '<li class="ace-icon fa fa-minus" >';
									}


									if ( $ta6 == 10 ) 
									{
										$ta6 = 0;
									}
									elseif ($ta6 != 0)
									{
										$ta6 		= $ta6;
									}
									else 
									{
										$ta6 = '<li class="ace-icon fa fa-minus" >';
									}

									if ( $ta7 == 10 ) 
									{
										$ta7 = 0;
									}
									elseif ($ta7 != 0)
									{
										$ta7 = $ta7;
									}
									else 
									{
										$ta7 = '<li class="ace-icon fa fa-minus" >';
									}


									if ($al1 != 0)
									{
										$al1 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al1		= '<li class="ace-icon fa fa-minus" >';
									}
									if ($al2 != 0){
										$al2 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al2		= '<li class="ace-icon fa fa-minus" >';
									}
									if ($al3 != 0){
										$al3 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al3		= '<li class="ace-icon fa fa-minus" >';
									}
									if ($al4 != 0){
										$al4 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al4		= '<li class="ace-icon fa fa-minus" >';
									}
									if ($al4 != 0){
										$al4 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al4		= '<li class="ace-icon fa fa-minus" >';
									}
									if ($al5 != 0){
										$al5 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al5		= '<li class="ace-icon fa fa-minus" >';
									}
									if ($al6 != 0){
										$al6 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al6		= '<li class="ace-icon fa fa-minus" >';
									}
									if ($al7 != 0){
										$al7 		= '<li class="ace-icon fa fa-check" >';
									}else {
										$al7		= '<li class="ace-icon fa fa-minus" >';
									}
								?>
														<tbody>
															<?php
															$kelas = $this->session->userdata('kelas');
															$con = substr($kelas,0,3);
															
															$var_Query = "
																SELECT
																   tbmatkul.nama_matkul 
																   , tbmatkul.kd_matkul
						                                           , tbmatkul.t_ajaran
						                                           , tbbab.nama_bab

																FROM
																    tbaktivasi2 
																   INNER JOIN
																      tbpraktikan
																      ON tbpraktikan.kelas = tbaktivasi2.kelas 
																   INNER JOIN
																      tbbab 
																      ON tbaktivasi2.kd_bab = tbbab.kd_bab 
																   INNER JOIN
																      tbmatkul 
																      ON tbbab.kd_matkul = tbmatkul.kd_matkul 
																WHERE  
																   tbaktivasi2.kelas = '".$this->session->userdata('kelas')."'
						                                        GROUP BY tbaktivasi2.kd_bab
															";

															$GetData = $this->db->query($var_Query);

															foreach ($GetData->result() as $Row ) 
															{
																$TahunAjaran = $Row->t_ajaran;
															}

															if ($TahunAjaran == 'ATA') 
															{
																switch ($con) 
																{
																	case '2DA':
																	echo '<tr style="text-align: center;">
																			      <td><b>IDE</b></td>
																		        <td><li '.$kehadiran1.'></li></td>
																		        <td> '.$al1.' </li></td>
																		        <td>'.$ta1.' </li></td>
																		    </tr>
																				<tr style="text-align: center;">
																						<td><b>ASPD</b></td>
																					  <td><li '.$kehadiran2.'></li></td>
																					  <td> '.$al2.' </li></td>
																					  <td>'.$ta2.'</li></td>
																			  </tr>
																				<tr style="text-align: center;">
																						<td><b>IDAT</b></td>
																					  <td><li '.$kehadiran3.'></li></td>
																					  <td>'.$al3.'</li></td>
																					  <td>'.$ta3.' </li></td>
																				</tr>
																				<tr style="text-align: center;">
																	      		<td><b>KD</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.'</li> </td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>AFL</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Leasing</b></td>
																						<td><li '.$kehadiran6.'></li></td>
																						<td> '.$al6.' </li></td>
																						<td>'.$ta6.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Pasar Modal</b></td>
																						<td><li '.$kehadiran7.'></li></td>
																						<td> '.$al7.' </li></td>
																						<td>'.$ta7.'</li></td>
																				</tr>';
																	break;

																	case '2EB':
																		echo '<tr style="text-align: center;">
																			      <td><b>IDE</b></td>
																		        <td><li '.$kehadiran1.'></li></td>
																		        <td> '.$al1.' </li></td>
																		        <td>'.$ta1.' </li></td>
																		    </tr>
																				<tr style="text-align: center;">
																						<td><b>ASPD</b></td>
																					  <td><li '.$kehadiran2.'></li></td>
																					  <td> '.$al2.' </li></td>
																					  <td>'.$ta2.'</li></td>
																			  </tr>
																				<tr style="text-align: center;">
																						<td><b>IDAT</b></td>
																					  <td><li '.$kehadiran3.'></li></td>
																					  <td>'.$al3.'</li></td>
																					  <td>'.$ta3.' </li></td>
																				</tr>
																				<tr style="text-align: center;">
																	      		<td><b>KD</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.'</li> </td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>AFL</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Leasing</b></td>
																						<td><li '.$kehadiran6.'></li></td>
																						<td> '.$al6.' </li></td>
																						<td>'.$ta6.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Pasar Modal</b></td>
																						<td><li '.$kehadiran7.'></li></td>
																						<td> '.$al7.' </li></td>
																						<td>'.$ta7.'</li></td>
																				</tr>';
																	break;
																	
																	case '2DF':
																		echo '<tr style="text-align: center;">
																			      <td><b>IDE</b></td>
																		        <td><li '.$kehadiran1.'></li></td>
																		        <td> '.$al1.' </li></td>
																		        <td>'.$ta1.' </li></td>
																		    </tr>
																				<tr style="text-align: center;">
																						<td><b>ASPD</b></td>
																					  <td><li '.$kehadiran2.'></li></td>
																					  <td> '.$al2.' </li></td>
																					  <td>'.$ta2.'</li></td>
																			  </tr>
																				<tr style="text-align: center;">
																						<td><b>IDAT</b></td>
																					  <td><li '.$kehadiran3.'></li></td>
																					  <td>'.$al3.'</li></td>
																					  <td>'.$ta3.' </li></td>
																				</tr>
																				<tr style="text-align: center;">
																	      		<td><b>KD</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.'</li> </td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>AFL</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Leasing</b></td>
																						<td><li '.$kehadiran6.'></li></td>
																						<td> '.$al6.' </li></td>
																						<td>'.$ta6.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Pasar Modal</b></td>
																						<td><li '.$kehadiran7.'></li></td>
																						<td> '.$al7.' </li></td>
																						<td>'.$ta7.'</li></td>
																				</tr>';
																	break;

																	case '2DA':
																		echo '<tr style="text-align: center;">
																			      <td><b>IDE</b></td>
																		        <td><li '.$kehadiran1.'></li></td>
																		        <td> '.$al1.' </li></td>
																		        <td>'.$ta1.' </li></td>
																		    </tr>
																				<tr style="text-align: center;">
																						<td><b>ASPD</b></td>
																					  <td><li '.$kehadiran2.'></li></td>
																					  <td> '.$al2.' </li></td>
																					  <td>'.$ta2.'</li></td>
																			  </tr>
																				<tr style="text-align: center;">
																						<td><b>IDAT</b></td>
																					  <td><li '.$kehadiran3.'></li></td>
																					  <td>'.$al3.'</li></td>
																					  <td>'.$ta3.' </li></td>
																				</tr>
																				<tr style="text-align: center;">
																	      		<td><b>KD</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.'</li> </td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>AFL</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Leasing</b></td>
																						<td><li '.$kehadiran6.'></li></td>
																						<td> '.$al6.' </li></td>
																						<td>'.$ta6.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Pasar Modal</b></td>
																						<td><li '.$kehadiran7.'></li></td>
																						<td> '.$al7.' </li></td>
																						<td>'.$ta7.'</li></td>
																				</tr>';
																	break;

																	case '2DD':
																		echo '<tr style="text-align: center;">
																			      <td><b>IDE</b></td>
																		        <td><li '.$kehadiran1.'></li></td>
																		        <td> '.$al1.' </li></td>
																		        <td>'.$ta1.' </li></td>
																		    </tr>
																				<tr style="text-align: center;">
																						<td><b>ASPD</b></td>
																					  <td><li '.$kehadiran2.'></li></td>
																					  <td> '.$al2.' </li></td>
																					  <td>'.$ta2.'</li></td>
																			  </tr>
																				<tr style="text-align: center;">
																						<td><b>IDAT</b></td>
																					  <td><li '.$kehadiran3.'></li></td>
																					  <td>'.$al3.'</li></td>
																					  <td>'.$ta3.' </li></td>
																				</tr>
																				<tr style="text-align: center;">
																	      		<td><b>KD</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.'</li> </td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>AFL</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Leasing</b></td>
																						<td><li '.$kehadiran6.'></li></td>
																						<td> '.$al6.' </li></td>
																						<td>'.$ta6.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Pasar Modal</b></td>
																						<td><li '.$kehadiran7.'></li></td>
																						<td> '.$al7.' </li></td>
																						<td>'.$ta7.'</li></td>
																				</tr>';
																	break;

																	case '2EA':
																		echo '<tr style="text-align: center;">
																			      <td><b>IDE</b></td>
																		        <td><li '.$kehadiran1.'></li></td>
																		        <td> '.$al1.' </li></td>
																		        <td>'.$ta1.' </li></td>
																		    </tr>
																				<tr style="text-align: center;">
																						<td><b>ASPD</b></td>
																					  <td><li '.$kehadiran2.'></li></td>
																					  <td> '.$al2.' </li></td>
																					  <td>'.$ta2.'</li></td>
																			  </tr>
																				<tr style="text-align: center;">
																						<td><b>IDAT</b></td>
																					  <td><li '.$kehadiran3.'></li></td>
																					  <td>'.$al3.'</li></td>
																					  <td>'.$ta3.' </li></td>
																				</tr>
																				<tr style="text-align: center;">
																	      		<td><b>KD</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.'</li> </td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>AFL</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Leasing</b></td>
																						<td><li '.$kehadiran6.'></li></td>
																						<td> '.$al6.' </li></td>
																						<td>'.$ta6.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>Pasar Modal</b></td>
																						<td><li '.$kehadiran7.'></li></td>
																						<td> '.$al7.' </li></td>
																						<td>'.$ta7.'</li></td>
																				</tr>';
																	break;

																	case '3DA':
																	echo '<tr style="text-align: center;">
																						<td><b>HTML</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr >
																				<tr>
																						<td><b>JARKOM</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>INTERNET</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>
																				<tr style="text-align: center;">
																						<td><b>E-COMMERCE</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.' </li></td>
																						<td>'.$ta4.'</li></td>
																				</tr>';
																	break;

																	case '3DD':
																	echo '<tr style="">
																						<td><b>Pengantar E-Commerce</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Keamanan Pembayaran E-Commerce</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Pembuatan WEB E-Commerce</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>';
																	break;
																}
															}

															if ($TahunAjaran == 'PTA') 
															{
																switch ($con) 
																{
																	case '3EA':
																		echo '<tr style="">
																						<td><b>MRP</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Forcasting</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>CPM Tanpa Percepatan</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>CPM dengan percepatan</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.' </li></td>
																						<td>'.$ta4.'</li></td>
																				</tr>';
																	break;

																	case '2EA':
																	echo '<tr style="">
																						<td><b>Simplex</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Transportasi Awal</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Transportasi Akhir</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Penugasan</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.' </li></td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Game Theory</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>
																				</tr>';
																	break;

																	case '2DD':
																	echo '<tr style="">
																						<td><b>Nilai waktu terhadap uang</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Manajemen Modal Kerja</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Manajemen Piutang</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Rasio Keuangan</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.' </li></td>
																						<td>'.$ta4.'</li></td>
																				</tr>';
																	break;

																	case '2DA':
																	echo '<tr style="">
																						<td><b>Nilai waktu terhadap uang</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Manajemen Modal Kerja</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Manajemen Piutang</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Rasio Keuangan</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.' </li></td>
																						<td>'.$ta4.'</li></td>
																				</tr>';
																	
																	break;

																	case '2DF':
																	echo '<tr style="">
																						<td><b>Nilai waktu terhadap uang</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Manajemen Modal Kerja</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Manajemen Piutang</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Rasio Keuangan</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.' </li></td>
																						<td>'.$ta4.'</li></td>
																				</tr>';
																	break; 

																	case '3DD':
																	echo '<tr style="">
																						<td><b>Managament Pemasaran Jasa</b></td>
																						<td><li '.$kehadiran1.'></li></td>
																						<td> '.$al1.' </li></td>
																						<td>'.$ta1.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Harga dan Biaya Jasa</b></td>
																						<td><li '.$kehadiran2.'></li></td>
																						<td> '.$al2.' </li></td>
																						<td>'.$ta2.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Edukasi Pelanggan dan Promosi Jasa</b></td>
																						<td><li '.$kehadiran3.'></li></td>
																						<td> '.$al3.' </li></td>
																						<td>'.$ta3.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Menyeimbangkan Permintaan dan Pasar</b></td>
																						<td><li '.$kehadiran4.'></li></td>
																						<td> '.$al4.' </li></td>
																						<td>'.$ta4.'</li></td>
																				</tr>
																				<tr style="">
																						<td><b>Sumber Daya Manusia</b></td>
																						<td><li '.$kehadiran5.'></li></td>
																						<td> '.$al5.' </li></td>
																						<td>'.$ta5.'</li></td>"';

																		// echo '<tr style="">
																		// 				<td><b>Komunikasi Pemasaran</b></td>
																		// 				<td><li '.$kehadiran1.'></li></td>
																		// 				<td> '.$al1.' </li></td>
																		// 				<td>'.$ta1.'</li></td>
																		// 		</tr>
																		// 		<tr style="">
																		// 				<td><b>Sumber & Solusi Komunikasi Pemasaran</b></td>
																		// 				<td><li '.$kehadiran2.'></li></td>
																		// 				<td> '.$al2.' </li></td>
																		// 				<td>'.$ta2.'</li></td>
																		// 		</tr>
																		// 		<tr style="">
																		// 				<td><b>Budget (Anggaran) Promosi</b></td>
																		// 				<td><li '.$kehadiran3.'></li></td>
																		// 				<td> '.$al3.' </li></td>
																		// 				<td>'.$ta3.'</li></td>
																		// 		<tr style="">
																		// 				<td><b>Komunikasi Pemasaran dengan GIMP</b></td>
																		// 				<td><li '.$kehadiran4.'></li></td>
																		// 				<td> '.$al4.' </li></td>
																		// 				<td>'.$ta4.'</li></td>
																		// 		</tr>
																		// 		<tr style="">
																		// 				<td><b>Open Office Impress</b></td>
																		// 				<td><li '.$kehadiran5.'></li></td>
																		// 				<td> '.$al5.' </li></td>
																		// 				<td>'.$ta5.'</li></td>"';

																	break;
																	default:
																		# code...
																	break;
																}
															}
															?>

														</tbody>
													</table>
												</div>
											</div>
								</div><!-- /.row -->
							</div>
							</div>
							<div class="col-xs-6">
										<div class="space-6"></div>
										<div class="chart">
												<!-- Sales Chart Canvas -->
												<canvas id="myChart" style="height: 180px;"></canvas>
												<script>
												var ctx = document.getElementById("myChart");
												            var myChart = new Chart(ctx, {
												                type: 'line',
												                data: {
												                    labels: [<?php foreach ($bab->result() as $value) {
												                    	echo "'.$value->minggu.',";
												                    }?>],
												                    datasets: [{
												                            label: 'Chart Tugas Akhir',
												                            data: [<?php foreach ($datanilai->result() as $value ) {

																			if ($value->ta1 == 2 ) 
																			{
																				$ta1 = 0;
																			}
																			else
																			{
																				$ta1 = $value->ta1 * 5;
																			}

																			if ($value->ta2 == 2 ) 
																			{
																				$ta2 = 0;
																			}
																			else
																			{
																				$ta2 = $value->ta2 * 5;
																			}

																			if ($value->ta3 == 2 ) 
																			{
																				$ta3 = 0;
																			}
																			else
																			{
																				$ta3 = $value->ta3 * 5;
																			}

																			if ($value->ta4 == 2 ) 
																			{
																				$ta4 = 0;
																			}
																			else
																			{
																				$ta4 = $value->ta4 * 5;
																			}

																			if ($value->ta5 == 2 ) 
																			{
																				$ta5 = 0;
																			}
																			else
																			{
																				$ta5 = $value->ta5 * 5;
																			}

																			if ($value->ta6 == 2 ) 
																			{
																				$ta6 = 0;
																			}
																			else
																			{
																				$ta6 = $value->ta6 * 5;
																			}

																			if ($value->ta7 == 2 ) 
																			{
																				$ta7 = 0;
																			}
																			else
																			{
																				$ta7 = $value->ta7 * 5;
																			}
																			echo ''.$ta1.','.$ta2.','.$ta3.','.$ta4.','.$ta5.','.$ta6.','.$ta7.',';
												                            }?>],
												                            backgroundColor: [
												                                'rgba(255, 99, 132, 0.2)',
												                                'rgba(54, 162, 235, 0.2)',
												                                'rgba(255, 206, 86, 0.2)',
												                                'rgba(75, 192, 192, 0.2)',
												                                'rgba(153, 102, 255, 0.2)',
												                                'rgba(255, 159, 64, 0.2)'

												                            ],
												                            borderColor: [
												                                'rgba(255,99,132,1)',
												                                'rgba(54, 162, 235, 1)',
												                                'rgba(255, 206, 86, 1)',
												                                'rgba(75, 192, 192, 1)',
												                                'rgba(153, 102, 255, 1)',
												                                'rgba(255, 159, 64, 1)'

												                            ],
												                            borderWidth: 1
												                        }]
												                },
												                options: {
												                    scales: {
												                        yAxes: [{
												                                ticks: {
												                                    beginAtZero: true
												                                }
												                            }]
												                    }
												                }
												            });
												</script>
										</div><!-- /.chart-responsive -->
				</div>
		</div>

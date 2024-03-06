<div class="row">
	<div class="col-xs-12" > 
		<div class="col-xs-3"></div>
			<div class="col-sm-6" widget-container-col">
										<div class="widget-box widget-color-blue">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">
													<i class="ace-icon fa fa-table"></i>
													Data Nilai 
												</h5>

												<div class="widget-toolbar widget-toolbar-light no-border">
													<select id="simple-colorpicker-1" class="hide">
														<option selected="" data-class="blue" value="#307ECC">#307ECC</option>
														<option data-class="blue2" value="#5090C1">#5090C1</option>
														<option data-class="blue3" value="#6379AA">#6379AA</option>
														<option data-class="green" value="#82AF6F">#82AF6F</option>
														<option data-class="green2" value="#2E8965">#2E8965</option>
														<option data-class="green3" value="#5FBC47">#5FBC47</option>
														<option data-class="red" value="#E2755F">#E2755F</option>
														<option data-class="red2" value="#E04141">#E04141</option>
														<option data-class="red3" value="#D15B47">#D15B47</option>
														<option data-class="orange" value="#FFC657">#FFC657</option>
														<option data-class="purple" value="#7E6EB0">#7E6EB0</option>
														<option data-class="pink" value="#CE6F9E">#CE6F9E</option>
														<option data-class="dark" value="#404040">#404040</option>
														<option data-class="grey" value="#848484">#848484</option>
														<option data-class="default" value="#EEE">#EEE</option>
													</select>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-user"></i>
																
																</th>

																<th>Kehadiran</th>
																<th>Laporan Pendahuluan</th>
																<th>Laporan Akhir </th>
																<th>Kuis</th> 
															</tr>
														</thead>
								<?php 
									foreach ($datanilai->result() as $value) {
											$kehadiran1 	= $value->kehadiran1;
											$lp1			= $value->lp1;
											$la1			= $value->la1;
											$kuis1 			= $value->quiz1;
											$kehadiran2 	= $value->kehadiran2;
											$lp2			= $value->lp2;
											$la2			= $value->la2;
											$kuis2 			= $value->quiz2;
									}


								?>
														<tbody>
															<tr>
														        <td>KB</td>
														        <td><?php echo $kehadiran1;?></td>
														        <td><?php echo $lp1; ?></td>
														        <td><?php echo $la1; ?></td>
														        <td><?php echo $kuis1 ?></td>
														        
														    </tr>
														    <tr>
														        <td>AFL</td>
														        <td><?php echo $kehadiran2;?></td>
														        <td><?php echo $lp2; ?></td>
														        <td><?php echo $la2; ?></td>
														        <td><?php echo $kuis2 ?></td>
														        
														</tbody>
													</table>
												</div>
											</div>
										<div class="col-xs-3"></div>
									</div>
									

									<!-- /.span -->
								</div><!-- /.row -->

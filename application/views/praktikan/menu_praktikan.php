<?php

									$var_Query = "";
									$var_Kelas = $this->session->userdata('kelas');
									$var_Query = "
											SELECT
											   tbmatkul.nama_matkul 
											   , tbmatkul.kd_matkul

											FROM
											   tbpraktikan 
											   INNER JOIN
											      tbaktivasi2 
											      ON tbpraktikan.kelas = tbaktivasi2.kelas 
											   INNER JOIN
											      tbbab 
											      ON tbaktivasi2.kd_bab = tbbab.kd_bab 
											   INNER JOIN
											      tbmatkul 
											      ON tbbab.kd_matkul = tbmatkul.kd_matkul 
											WHERE
											   tbpraktikan.kelas = '".$var_Kelas."' 
											GROUP BY
											   tbmatkul.nama_matkul
									";
									$List_MataKuliah = $this->db->query($var_Query);
?>


<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li <?php echo $dashboard; ?>>
						<a href="<?php echo base_url();?>home/praktikan">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Beranda </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li <?php echo $lappendahuluan; ?>>
						<a href="#" class="dropdown-toggle"> <!-- off-->
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Activity Lab
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<?php
										foreach ($List_MataKuliah->result() as $Row ) 
										{
									?>
											<li >
												<a href="<?php echo base_url();?>Activity_lab/DaftarMateri/<?=$Row->kd_matkul;?>" >
													<i class="menu-icon fa fa-caret-right"></i>
													<?=$Row->nama_matkul;?>
												</a>
												<b class="arrow"></b>
											</li>
							<?php		
										}
							?>
							</ul>
						</li>
							<li <?php echo $tugasakhir?> >
									<a href="#" class="dropdown-toggle">
										<i class="menu-icon fa fa-book"></i>
										<span class="menu-text">
											Tugas Akhir
										</span>
										<b class="arrow fa fa-angle-down"></b>
									</a>
									<b class="arrow"></b>
									<ul class="submenu">


									<?php
										foreach ($List_MataKuliah->result() as $Row ) 
										{
									?>
											<li >
												<a href="<?php echo base_url();?>Tugasakhir/DaftarMateri/<?=$Row->kd_matkul;?>" >
													<i class="menu-icon fa fa-caret-right"></i>
													<?=$Row->nama_matkul;?>
												</a>
												<b class="arrow"></b>
											</li>
								<?php		
										}
									?>


									<?php
										/* foreach ($menu_logic->result() as $value) {
													$kelas = $value->kelas;
													$ambil_kelas = substr($kelas, 0,3 );
												}
												switch ($ambil_kelas) {
													case '3DA':
														$var 	= base_url();
														echo '<li '.$tainterjar.' ?>
																		<a href="'.$var.'tugas_akhir/interjar">
																			<i class="menu-icon fa fa-caret-right"></i>
																		Interjar
																		</a>
																		<b class="arrow"></b>
																	</li>';
														break;
													case '2EA' || '2EB' || '2DA' || '2DD' || '2DF':
														$var 	= base_url();
														echo '<li '.$tamk2.' ?>
																		<a href="'.$var.'tugas_akhir/mk2" >
																			<i class="menu-icon fa fa-caret-right"></i>
																			MK 2
																		</a>
																		<b class="arrow"></b>
																	</li>';
														break;
													case '3DD':
													$var = base_url();
														echo '<li '.$lpecom.' ?>
																		<a href="'.$var.'tugas_akhir/ecom">
																			<i class="menu-icon fa fa-caret-right"></i>
																		E-Commerce
																		</a>
																		<b class="arrow"></b>
																	</li>';
														break;
												} */
									?>
							</li>
						</ul>
					</li>
					<li <?php echo $ujian; ?>>
						<a href="<?php echo base_url();?>ujian_praktikan" class=""> <!-- "<?php echo base_url();?>ujian_praktikan" -->
							<i class="menu-icon fa fa-graduation-cap"></i>
							<span class="menu-text">
								Ujian
							</span>
						</a>
								<b class="arrow"></b>
								<ul class="submenu">
								<b class="arrow"></b>
						</ul>
					</li>
					<li <?php echo $tentang; ?>>
						<a href="<?php echo base_url();?>tentang/praktikan" class="">
							<i class="menu-icon fa fa-globe"></i>
							<span class="menu-text">
								Tentang
							</span>
						</a>
								<b class="arrow"></b>
								<ul class="submenu">
								<b class="arrow"></b>
						</ul>
					</li>
				</ul>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

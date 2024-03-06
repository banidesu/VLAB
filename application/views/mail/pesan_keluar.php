<div class="row">
	<div class="col-xs-12">
		<div class="tabbable">
			<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
				<li class="li-new-mail pull-right" style="display: none;">
					<a href="<?php echo base_url();?>mail/create_mail/jarkom" class="btn-new-mail">
						<span class="btn btn-purple no-border">
							<i class="ace-icon fa fa-envelope bigger-130"></i>
							<span class="bigger-110">Buat Jarkom </span>
						</span>
					</a>
				</li>
				<li class="li-new-mail pull-right">
					<a href="<?php echo base_url();?>mail/create_mail/pesan" class="btn-new-mail">
						<span class="btn btn-purple no-border">
							<i class="ace-icon fa fa-envelope bigger-130"></i>
							<span class="bigger-110">Buat Pesan </span>
						</span>
					</a>
				</li>
				

				<li >
					<a href="<?php echo base_url();?>mail/inbox" >
						<i class="blue ace-icon fa fa-inbox bigger-130"></i>
						<span class="bigger-110">Kotak Masuk</span>
					</a>
				</li>

				<li class="active">
					<a href="<?php echo base_url();?>mail/sent" >
						<i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
						<span class="bigger-110">Pesan Terkirim</span>
					</a>
				</li>
			</ul>

			<div class="tab-content no-border no-padding">
				<div id="inbox" class="tab-pane in active" >
					<div class="message-container">
						<div id="id-message-list-navbar" class="message-navbar clearfix">
							<div class="message-bar">
								<div class="message-infobar" id="id-message-infobar">
									<span class="blue bigger-150">Pesan Terkirim</span>
									<!-- <span class="grey bigger-110">(2 unread messages)</span> -->
								</div>
								<?php echo $status;?>
							</div>
						</div>
						<div class="message-list-container">
							<div class="message-list" id="message-list">
							<?php
								$var_pengirim = $this->session->userdata('npm');


								if ($this->session->userdata('praktikan')) 
								{
									$var_status_pengguna = $this->db->query('SELECT * FROM tbmail WHERE npm_pengirim = '.$var_pengirim.' ');

									foreach ($var_status_pengguna->result() as $Row) 
									{
												$var_IdTemp = $Row->id;
												$var_Query1 = "SELECT 
																tbmail.npm_pengirim 
																,tbmail.npm_penerima AS npmpenerima
																,tbmail.id
																,tbmail.judul
																,tbmail.pesan
																,tbmail.tanggal_pesan
																,tbmail.status_pesan 
																,tbmail.status_tipe
																,tbpraktikan.nama AS namapengirim
	                                                            ,tbasisten.nama_lengkap AS namapenerima
																	FROM tbmail 
																INNER JOIN 
																	tbpraktikan 
																ON 
																	tbmail.npm_pengirim = tbpraktikan.npm
	                                                             INNER JOIN tbasisten 
	                                                             ON 
	                                                             	tbmail.npm_penerima = tbasisten.npm
																WHERE tbmail.npm_pengirim = ".$var_pengirim." 
																AND tbmail.id = ".$var_IdTemp."
																AND tbmail.status_pesan = 1
												";
												$pesan_terkirim1 = $this->db->query($var_Query1);
												if ($pesan_terkirim1->num_rows() > 0 ) 
													{
														foreach ($pesan_terkirim1->result() as $Row1) 
														{ 
																echo "<div class='message-item message-unread'>
																		<span class='sender' title='".$Row1->namapenerima."'>".$Row1->namapenerima." </span>
																		<span class='time'>".$Row1->tanggal_pesan."</span>

																		<span class='summary'>
																			<span class='text'>
																				<a href='".base_url()."mail/pesan_terkirim/".$Row1->id."' >".$Row1->judul."</a>
																			</span>
																		</span>
																	</div>";
														}
													}
									}
								}

								if ($this->session->userdata('asisten')) 
								{
									$var_status_pengguna = $this->db->query('SELECT * FROM tbmail WHERE npm_pengirim = '.$var_pengirim.'  ');

									foreach ($var_status_pengguna->result() as $Row) 
									{
											$var_IdTemp = $Row->id;
												$var_Query1 = "SELECT 
																tbmail.npm_pengirim 
																,tbmail.npm_penerima AS npmpenerima
																,tbmail.id
																,tbmail.judul
																,tbmail.pesan
																,tbmail.tanggal_pesan
																,tbmail.status_pesan 
																,tbmail.status_tipe
																,tbasisten.nama_lengkap AS namapengirim
	                                                            ,tbpraktikan.nama AS namapenerima
																	FROM tbmail 
																INNER JOIN 
																	tbasisten 
																ON 
																	tbmail.npm_pengirim = tbasisten.npm
	                                                             INNER JOIN tbpraktikan 
	                                                             ON 
	                                                             	tbmail.npm_penerima = tbpraktikan.npm
																WHERE tbmail.npm_pengirim = ".$var_pengirim." 
																AND tbmail.id = ".$var_IdTemp."
												";
												$pesan_terkirim1 = $this->db->query($var_Query1);
												if ($pesan_terkirim1->num_rows() > 0 ) 
													{
														foreach ($pesan_terkirim1->result() as $Row1) 
														{ 
																echo "<div class='message-item message-unread'>
																		<span class='sender' title='".$Row1->namapenerima."'>".$Row1->namapenerima." </span>
																		<span class='time'>".$Row1->tanggal_pesan."</span>

																		<span class='summary'>
																			<span class='text'>
																				<a href='".base_url()."mail/pesan_terkirim/".$Row1->id."' >".$Row1->judul."</a>
																			</span>
																		</span>
																	</div>";
														}
													}
									}
								}


								




							?>
								
							</div>
						</div>
					</div>
				</div>
					
			</div><!-- /.tab-content -->
		</div><!-- /.tabbable -->
	</div><!-- /.col -->
</div><!-- /.row -->
	
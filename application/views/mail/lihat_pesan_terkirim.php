<?php

	if ($lihat_pesan->num_rows() > 0 ) 
		{
			foreach ($lihat_pesan->result() as $Row1) 
			{ 
				echo "
						<div class='message-content' id='id-message-content'>
							<div class='message-header clearfix'>
								<div class='pull-left'>
									<div class='space-4'></div>
									<i class='ace-icon fa fa-user '></i> Untuk :
									
									<span>".$Row1->namapenerima." (".$Row1->npmpenerima.")</span>
									&nbsp;
									<br>
									<i class='ace-icon fa fa-flag bigger-110 middle'></i> Judul : 
									<span class='time grey'>".$Row1->judul."</span>
									<br>
								</div>
								<div class='pull-right action-buttons'>
									<a href='".base_url()."mail/hapus/".$Row1->id."'>
										<i class='ace-icon fa fa-trash-o red icon-only bigger-130'></i>
									</a>
								</div>
							</div>
							<div class='hr hr-double'></div>
								<div class='message-body'>
									<p>
										".$Row1->pesan."
									</p>

								<i class='ace-icon fa fa-clock-o bigger-110 middle'></i>
								<span class='time grey'>".$Row1->tanggal_pesan."</span><br>
							</div>
							<div class='hr hr-double'></div>
						</div>
				";
			}
		}

	

?>



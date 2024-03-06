<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			<div class="row">
				
					<?php

						$Query = "
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
											   tbpraktikan.kelas = '".$this->session->userdata('kelas')."' 
											GROUP BY
											   tbmatkul.nama_matkul";

						$get_kd_matkul = $this->db->query($Query);

						foreach ($get_kd_matkul->result() as $Row) 
						{
							$kd_matkul = $Row->kd_matkul;
							$nama_matkul = $Row->nama_matkul;
						}


						$cek_ujian = $this->db->query("SELECT * FROM tbmatkul WHERE kd_matkul = '".$kd_matkul."' AND status = 'Aktif' ");

						if ($cek_ujian->num_rows() > 0 ) 
						{
					?>
							<div class="widget-box">
								<div class="widget-header">
									<center><h4 class="widget-title blue bigger">Peraturan Ujian <?=$nama_matkul;?> </h4></center>
								</div>
								<div class="widget-body">
									<div class="widget-main no-padding">
										<form>
											<div style="padding-left:10px;">
												<h5 class="blue bigger">1. Isi data dengan lengkap dipojok kanan atas</h5>
												<h5 class="blue bigger">2. Untuk 3 orang tercepat +10 dengan syarat diisi semua</h5>
												<h5 class="blue bigger">3. Dilarang Menyontek!!! ketahuan dianggap tidak mengikuti Ujian</h5>
												<h5 class="blue bigger">4. Tidak boleh menggunakan kalkulator Handphone</h5>
												<h5 class="blue bigger">5. Tidak boleh menggunakan pencil</h5>
												<h5 class="blue bigger">6. Waktu Pengerjaan 45 Menit</h5>
											</div>
											<div class="form-actions center">
												<center>
													<a href="<?php echo base_url();?>ujian_praktikan/downloadujian" class="btn btn-primary ">Download Ujian</a>
												</center>
											</div>
										</form>
									</div>
								</div>
							</div>
					<?php
						}
						else
						{
					?>
						<div class='alert alert-block alert-success'	>
							</strong>Ujian belum dimulai.
						</div>
					<?php		
						}
					?>	
					<div class="space-6"></div>
				
			</div>
		</div>
	</div>
</div>
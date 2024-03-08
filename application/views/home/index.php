<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/virtual/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/virtual/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?= $Judul; ?>| Portal</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="<?= base_url(); ?>assets/virtual/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/virtual/css/material-kit.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?= base_url(); ?>assets/virtual/css/demo.css" rel="stylesheet" />

	<style>
		.title.dropdown-toggle {
			margin-bottom: 0;
		}
	</style>
</head>

<body class="index-page">
	<!-- Navbar -->
	<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?= base_url(); ?>">
					<div class="logo-container">
						<div class="logo">
							<img src="<?= base_url(); ?>assets/img/logo-mamen.png" alt="Creative Tim Logo" rel="tooltip" title="<b>Lab Manajemen Menengah</b> was Designed & Coded with care by the staff from <b>Vlab Tim</b>" data-placement="bottom" data-html="true">
						</div>
						<div class="brand">
							V-Lab MaMen
						</div>
					</div>
				</a>
			</div>

			<div class="collapse navbar-collapse" id="navigation-index">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="javascript:ShowHome();">
							<i class="material-icons">home</i>
							Home
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">account_circle</i>Profil
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li class="dropdown-header">Profil</li>
							<li><a href="javascript:ShowGambaranumum();">Gambaran Umum</a></li>
							<li><a href="javascript:ShowVisiMisi();">Visi Dan Misi</a></li>
							<li><a href="javascript:ShowAktivitas();">Aktifitas</a></li>
							<li><a href="javascript:ShowStrukturOrganisasi();">Struktur Organisasi</a></li>
							<li><a href="javascript:ShowPersonalia();">Personalia</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">event</i>Praktikum
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li class="dropdown-header">Praktikum</li>
							<li><a href="javascript:ShowPeraturanPraktikum();">Peraturan</a></li>
							<li><a href="javascript:ShowMateriPraktikum();">Materi</a></li>
							<li><a href="javascript:ShowJadwalPraktikum();">Jadwal</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:ShowDownlaod();">
							<i class="material-icons">get_app</i>Download
						</a>
					</li>
					<li>
						<a href="javascript:ShowContactUs();">
							<i class="material-icons">accessibility</i>Contact Us
						</a>
					</li>
					<li>
						<a href="<?= base_url(); ?>beranda">
							<i class="material-icons">fingerprint</i>Login
						</a>
					</li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->

	<div class="wrapper">

		<!-- Header -->
		<div class="header header-filter" style="background-image: url('<?= base_url(); ?>assets/virtual/img/intro2.png');">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="brand">
							<h2>Selamat Datang di <?= $Judul; ?> </h2>
							<div class="dropdown" style="margin: 0 auto; max-width: max-content;">
								<div class="btn btn-primary h4 title dropdown-toggle" data-toggle="dropdown">
									Open Recruitment
									<b class="caret"></b>
								</div>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<a href="<?= base_url() ?>index.php/oprec">Pendaftaran</a>
									</li>
									<li>
										<a href="<?= base_url() ?>index.php/result">Hasil</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- End Header -->

		<!-- Content -->
		<!-- HOME-->
		<div class="main main-raised" id="home" style="">
			<div class="container">
				<div class="section text-center section-landing">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="title">Virtual <?= $Judul; ?> </h2>
							<h5 class="description">Portal Virtual Lab (V-Lab) merupakan layanan pembelajaran online yang digunakan untuk mendukung proses belajar mengajar oleh asisten dan mahasiswa di lingkungan laboratorium Manajemen Menengah Universitas Gunadarma.</h5>
						</div>
					</div>

					<div class="features">
						<div class="row">
							<div class="col-md-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">chat</i>
									</div>
									<h4 class="info-title">Online Learn Practice</h4>
									<p></p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="info">
									<div class="icon icon-danger">
										<i class="material-icons">play_circle_filled</i>
									</div>
									<h4 class="info-title">Watch video module</h4>
									<p></p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="info">
									<div class="icon icon-default">
										<i class="material-icons">fingerprint</i>
									</div>
									<h4 class="info-title">Access anywhere</h4>
									<p></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div style="">
					<h1>News</h1>
					<?php
					$DataBerita = $this->db->query("SELECT * FROM tbberita WHERE status = 1");

					if ($DataBerita->num_rows() > 0) {
						foreach ($DataBerita->result() as $Row) {
					?>
							<div class="tim-typo">
								<blockquote>
									<h4><?= $Row->judul; ?></h4>
									<p>
										<?= $Row->isi; ?>
									</p>
									<small>
										Tanggal Post : <?= $Row->tanggal_post; ?>
									</small>
									<div align="right">
										<button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $Row->id ?>">
											Read More..
										</button>
									</div>
								</blockquote>
							</div>
						<?php
						}
					} else {
						?>
						<div align="center">
							<h4>Tidak Ada Berita</h4>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<!-- End HOME-->


		<!-- Gambaran Umum-->
		<div class="main main-raised" id="gambaranumum" style="display: none;">
			<div class="container">
				<div class="section text-center section-landing">
					<div class="row">
						<div class="col-md-12 ">
							<h2 class="title">Gambaran Umum </h2>
							<h5 class="description" style="text-align: justify;">Laboratorium Manajemen Menengah (Lab-MM) adalah suatu unit kerja yang bertanggung jawab pada kegiatan praktikum mata kuliah penunjang dan praktikum mandiri di lingkungan Universitas Gunadarma. Lab-MM ini telah melaksanakan kegiatannya sejak tahun 1994, mengembangkan program aplikasi Manajemen Keuangan, Manajemen Operasional dan Riset Operasional. Pada perkembangannya saat ini telah meluncurkan modul praktikum dengan program aplikasi yang diperuntukan bagi mahasiswa Program Diploma Tiga Bisnis dan Kewirausahaan (D3-BK) Universitas Gunadarma, dengan praktikum Dasar Manajemen Keuangan/Manajemen Keuangan 1, Komunikasi Pemasaran, Manajemen Pemasaran Jasa serta Internet dan Jaringan.
								Lab-MM memberikan pengajaran berdasarkan Kurikulum dan Satuan Acara Praktek (AP) yang berbasis teknologi informasi. Mahasiswa mengikuti praktikum diharapkan mampu memecahkan masalah-masalah manajemen dan membuat keputusan-keputusan manajemen dengan bantuan teknologi komputer. Program aplikasi yang digunakan dalam praktikum menggunakan program yang dihasilkan oleh tim pengembangan dan programmer Lab-MM serta program aplikasi non commercial (open-source).</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Gambaran Umum-->

		<!-- Visi Misi -->
		<div class="main main-raised" id="visimisi" style="display: none;">
			<div class="container">
				<div class="section text-center section-landing">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 ">
							<h2 class="title">Visi</h2>
							<h5 class="description" style="text-align: justify;">Unit penyelenggara… tahun 2017 menjadi laboratorium penyelenggara praktikum yang bereputasi Internasional, memiliki jejaring global, dan memberikan kontribusi signifikan bagi peningkatan daya saing bangsa khususnya bidang Manajemen Pemasaran, Keuangan dan Perbankan berbasis TI.</h5>

							<h2 class="title">Misi</h2>
							<h5 class="description" style="text-align: justify;">Melaksanakan praktikum untuk menghasilkan sarjana Manajemen dan Akuntansi yang profesional dan mampu mengikuti perkembangan ilmu pengetahuan dan teknologi serta mampu bersaing di lingkungan global dan Melaksanakan kegiatan pengembangan dalam bidang Manajemen sehingga dapat memberikan kontribusi kepada kemajuan ilmu pengetahuan.</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Visi Misi -->

		<!-- Aktivitas -->
		<div class="main main-raised" id="aktivitas" style="display: none;">
			<div class="container">
				<div class="section text-center section-landing">
					<div class="row">
						<div class="col-md-12 ">
							<h2 class="title">Aktivitas Laboratorium </h2>
							<h5 class="description" style="text-align: justify;">

								Aktivitas utama Lab-MM adalah melaksanakan pengajaran praktikum di laboratorium sebagai penunjang mata kuliah regular pada semester yang bersangkutan. Jadwal praktikum regular adalah hari Senin sampai dengan hari Sabtu, dengan waktu pelaksanaan setiap sesi adalah 2 jam dalam seminggu, dimulai dari jam 07.30 sampai dengan 16.30 untuk praktikum sesi pagi dan dimulai jam 16.30 sampai dengan 20.30 untuk praktikum sesi malam.
								<div class="clear"></div>
								<br>
								Kegiatan praktikum dilaksanakan di ruang Lab-MM yang berlokasi di Kampus E ruang E532 (Jl. Komjen M. Jasin, Kelapa Dua, Depok), diperuntukkan bagi praktikan dengan kelas-kelas yang berlokasi kuliah di Kampus A, B, C, D, E, dan G. Bagi praktikan dengan kelas-kelas yang berlokasi kuliah di Kampus J dan K, Lab-MM menyelenggarakan praktikum di Laboratorium Ekonomi Terpadu di Kampus J (Jl. KH. Noer Ali, Kalimalang, Bekasi).
								<div class="clear"></div>
								<br>
								Lab-MM di ruang E532 Kampus E secara reguler pada semester PTA (Ganjil) dan ATA (Genap), kapasitas waktu pelaksanaan praktikum dalam satu semester sebanyak 8 sesi (8 minggu), terdiri atas: 6 sesi untuk materi praktikum ditambah 1 sesi untuk ujian praktikum serta 1 sesi sebelum sesi ujian untuk pengulangan bagi praktikan yang pernah berhalangan. Lab-MM di ruang Laboratorium Ekonomi Terpadu Kampus J digunakan praktikum secara terpadu bersama dengan Laboratorium Manajemen dan Laboratorium Akuntansi. Semester PTA dan ATA, kapasitas waktu pelaksanaan praktikum dalam satu semester sebanyak 4 sesi (4 minggu) dengan pemadatan jadwal praktikum serta ujian praktikum.
								<div class="clear"></div>
								<br>
								Mulai semester PTA 2008/2009 (ganjil), Lab-MM telah melakukan proses migrasi sistem praktikum regulernya ke Laboratorium Terintegrasi atau Integrated Laboratory (I-Lab), tahap awal dengan satu subyek praktikum di semester ganjil dan selanjutnya satu subyek praktikum berikutnya di semester genap. I-Lab adalah sebuah laboratorium dengan sistem praktikum interaktif dan terintegrasi pelaksanaan praktikum secara pararel dengan sistem operasi, program aplikasi subyek praktikum berbeda dan berlangsung secara bersama-sama, para praktikan secara mandiri melakukan praktikum tanpa asisten yang mendampingi. Praktikum yang dilaksanakan di I-Lab adalah para praktikan mempergunakan sarana dan prasarana I-Lab yang meliputi; Komputer, sistem operasi dan program aplikasi interaktif secara mandiri berdasarkan jadwal praktikum masing-masing praktikan. Pengelolaan dan penilaian serta administrasinya dilakukan oleh asisten untuk diolah dan disimpan sebagai Data Base nilai praktikum di Lab-MM.
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Aktivitas -->

		<!-- Struktur Organisasi -->
		<div class="main main-raised" id="strukturorganisasi" style="display: none;">
			<div class="container">
				<div class="section text-center section-landing">
					<div class="row">
						<div class="col-md-12 ">
							<h2 class="title">Struktur Organisasi Laboratorium </h2>
							<h5 class="description" style="text-align: justify;">
								Laboratorium Manajemen Menengah melakukan penyusunan dan pengembangan program aplikasi computer dengan sumberdaya programmer internal Lab-MM. Kegiatan praktikum merupakan peranan Lab-MM dalam memfasilitasi kegiatan belajar dan mengajar reguler yang membutuhkan sarana komputer, seperti penggunaan program aplikasi; Manajemen Keuangan, Manajemen operasional, Riset Operasional, Manajemen Pemasaran Jasa, Komunikasi Pemasaran serta Internet dan Jaringan.</h5>
							<img src="<?= base_url(); ?>assets/virtual/img/Struktur.png">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Struktur Organisasi -->

		<!-- Personalia -->
		<div class="main main-raised" id="personalia" style="display: none;">
			<div class="container">
				<div class="section text-center section-landing">
					<div class="row">
						<div class="col-md-12 ">
							<div class="section text-center">
								<h2 class="title">Personalia Laboratorium </h2>
								<div class="team">
									<div class="row">
										<div class="col-md-4">
											<div class="team-player">
												<img src="<?= base_url(); ?>assets/virtual/img/Yunan.jpg" alt="Thumbnail Image" class="img-raised img-circle">
												<h4 class="title">Dr. Muh. Yunanto, SE., MM.<br />
													<small class="text-muted">Kepala. Lab. Manajemen Menengah</small><br>
													<a href="http://myunanto.staff.gunadarma.ac.id/" target="_blank"><small class="text-muted">StaffSite</small></a>
												</h4>

											</div>
										</div>
										<div class="col-md-4">
											<div class="team-player">
												<img src="<?= base_url(); ?>assets/virtual/img/Hadir.jpg" alt="Thumbnail Image" class="img-raised img-circle">
												<h4 class="title">Hadir Hudiyanto, SE., MMA<br />
													<small class="text-muted">Wakil Kepala. Lab. Manajemen Menengah</small><br>
													<a href="http://hudiyanto.staff.gunadarma.ac.id/" target="_blank"><small class="text-muted">StaffSite</small></a>
												</h4>
											</div>
										</div>
										<div class="col-md-4">
											<div class="team-player">
												<img src="<?= base_url(); ?>assets/virtual/img/Darmadi.jpg" alt="Thumbnail Image" class="img-raised img-circle">
												<h4 class="title">Darmadi, SE., MM<br />
													<small class="text-muted">Staff Lab. Manajemen Menengah</small><br>
													<a href="http://darmadi.staff.gunadarma.ac.id/" target="_blank"><small class="text-muted">StaffSite</small></a>
												</h4>
											</div>
										</div>
									</div>
								</div>
								<div class="team">
									<div class="row">
										<div class="col-md-4">
											<div class="team-player">
												<img src="<?= base_url(); ?>assets/virtual/img/Suhardi.png" alt="Thumbnail Image" class="img-raised img-circle">
												<h4 class="title">Suwardi, SE<br />
													<small class="text-muted">Staff Lab. Manajemen Menengah</small><br>
													<a href="http://suwardi.staff.gunadarma.ac.id/" target="_blank"><small class="text-muted">StaffSite</small></a>

												</h4>
											</div>
										</div>
										<div class="col-md-4">
											<div class="team-player">
												<img src="<?= base_url(); ?>assets/virtual/img/Adit.jpeg" alt="Thumbnail Image" class="img-raised img-circle">
												<h4 class="title">Aditya Rian Ramadhan, SE<br />
													<small class="text-muted">Staff Lab. Manajemen Menengah</small><br>
													<a href="#"><small class="text-muted">StaffSite</small></a>
												</h4>
											</div>
										</div>
										<div class="col-md-4">
											<div class="team-player">
												<img src="<?= base_url(); ?>assets/virtual/img/default-avatar.png" alt="Thumbnail Image" class="img-raised img-circle">
												<h4 class="title">Ridwan z Agha <br />
													<small class="text-muted">Asisten tetap Lab. Manajemen Menengah</small><br>
													<a href="#"><small class="text-muted">StaffSite</small></a>
												</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Personalia -->

		<!-- Peraturan Praktikum-->
		<div class="main main-raised" id="peraturanpraktikum" style="display: none;">
			<div class="container">
				<div class="section section-landing">
					<div class="row">
						<div class="col-md-12 ">
							<h2 class="title" style="text-align: center;">Peraturan Praktikum</h2>

							<div class="tim-typo" style="padding-left: 0px; ">
								<blockquote>
									<h4>Peraturan Praktikum Depok</h4>
									<div align="right">
										<a href="https://drive.google.com/open?id=0B0BLFAc6216dRHhpM29oelphVUk"><i class="btn btn-primary">Download..</i></a>
									</div>
								</blockquote>
							</div>
							<div class="tim-typo" style="padding-left: 0px; ">
								<blockquote>
									<h4>Peraturan Praktikum Kalimalang</h4>
									<div align="right">
										<a href="https://drive.google.com/open?id=0B0BLFAc6216daGVPTU1ZeXdOaUk"><i class="btn btn-primary">Download..</i></a>
									</div>
								</blockquote>
							</div>
							<div class="tim-typo" style="padding-left: 0px; ">
								<blockquote>
									<h4>Peraturan Praktikum Salemba</h4>
									<div align="right">
										<a href=""><i class="btn btn-primary">Tidak Tersedia</i></a>
									</div>
								</blockquote>
							</div>
							<div class="tim-typo" style="padding-left: 0px; ">
								<blockquote>
									<h4>Peraturan Praktikum Cengkareng</h4>
									<div align="right">
										<a href=""><i class="btn btn-primary">Tidak Tersedia</i></a>
									</div>
								</blockquote>
							</div>
							<div class="tim-typo" style="padding-left: 0px; ">
								<blockquote>
									<h4>Peraturan Praktikum Karawaci</h4>
									<div align="right">
										<a href="https://drive.google.com/file/d/0B0BLFAc6216dZjFvUFNwcktSWFU/view?usp=sharing"><i class="btn btn-primary">Download..</i></a>
									</div>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Peraturan Praktikum-->

		<!-- Materi Praktikum -->
		<div class="main main-raised" id="materipraktikum" style="display: none;">
			<div class="container">
				<div class="section text-center section-landing">
					<div class="row">
						<div class="col-md-12 ">
							<h2 class="title">Materi Praktikum</h2>
							<h5 class="description" style="text-align: justify;">
								MANAJEMEN PEMASARAN JASA 2
								<br>
								Praktikum Manajemen Pemasaran Jasa 2, dilaksanakan pada semester genap (ATA). Mahasiswa yang mengikuti praktikum ini adalah mahasiswa semester 6 (enam) Program Studi Manajemen Pemasaran Program Diploma Tiga Bisnis & Kewirausahaan (D3-BK).
								<div class="clear"></div>
								<br>
								RISET OPERASIONAL 2

								Praktikum Riset Operasional 2, dilaksanakan pada semester genap (ATA). Mahasiswa yang mengikuti praktikum ini adalah mahasiswa semester 6 (enam) Program Studi Strata-Satu Manajemen Fakultas Ekonomi.
								<div class="clear"></div>
								<br>
								RISET OPERASIONAL 1
								<br>
								Mahasiswa jenjang strata satu program studi manajemen semester 5, mengikuti praktikum Riset Operasional 1 pada semester ganjil (PTA). Sedangkan mahasiswa jenjang diploma tiga Bisnis & Kewirausahaan program studi manajemen keuangan semester 4, mengikuti praktikum Riset Operasional 1 pada semester genap (ATA).
								<div class="clear"></div>
								<br>
								MANAJEMEN PEMASARAN JASA 1
								<br>
								Praktikum Manajemen Pemasaran Jasa 1 diselenggarakan pada semester ganjil (PTA), diikuti oleh mahasiswa jenjang diploma tiga Bisnis & Kewirausahaan program studi manajemen pemasaran semester 5. Pelaksanaan praktikum dilakukan di Integrated Laboratory (I-Lab).
								<div class="clear"></div>
								<br>
								MANAJEMEN OPERASIONAL
								<br>
								Praktikum Manajemen Operasional diselenggarakan pada semester genap (ATA), diikuti oleh mahasiswa jenjang strata satu program studi manajemen Fakultas Ekonomi semester 6.
								<div class="clear"></div>
								<br>
								MANAJEMEN KEUANGAN 2
								<br>
								Praktikum Manajemen Keuangan 2 diselenggarakan pada semester Genap (ATA), diikuti oleh mahasiswa semester 4 program studi Manajemen dan Akuntansi Fakultas Ekonomi.
								<div class="clear"></div>
								<br>
								KOMUNIKASI PEMASARAN
								<br>
								Praktikum Komunikasi Pemasaran diselenggarakan pada semester Ganjil (PTA), diikuti oleh mahasiswa jenjang diploma tiga Bisnis & Kewirausahaan program studi Manajemen Pemasaran semester 5.
								<div class="clear"></div>
								<br>
								DASAR MANAJEMEN KEUANGAN & PRAKT.
								<br>
								Praktikum Dasar Manajemen Keuangan & Prakt. diselenggarakan pada semester Genap (ATA), diikuti oleh mahasiswa jenjang diploma tiga Bisnis dan Kewirausahaan program studi Manajemen Pemasaran, Manajemen Keuangan dan Akuntansi Komputer, masing-masing pada semester 4.
								<div class="clear"></div>
								<br>
								INTERNET JARINGAN
								<br>
								Praktikum Internet & Jaringan diselenggarakan pada semester Genap (ATA), diikuti oleh mahasiswa jenjang diploma tiga Bisnis & Kewirausahaan program studi Akuntansi Komputer semester 4.
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Materi Praktikum -->

		<!-- Jadwal Praktikum-->
		<div class="main main-raised" id="jadwalpraktikum" style="display: none;">
			<div class="container">
				<div class="section  section-landing">
					<div class="row">
						<div class="col-md-12 ">
							<h2 class="title" style="text-align: center;">Jadwal Praktikum</h2>
							<div class="tim-typo" style="padding-left: 0px; ">
								<blockquote>
									<h4>Jadwal Praktikum Depok</h4>
									<div align="right">
										<a href="https://drive.google.com/open?id=0B0BLFAc6216dbE1McThsaV82NUU"><i class="btn btn-primary">Download..</i></a>
									</div>
								</blockquote>
							</div>

							<div class="tim-typo" style="padding-left: 0px; ">
								<blockquote>
									<h4>Jadwal Praktikum Kalimalang</h4>
									<h5>Kampus J1</h5>
									<div align="right">
										<a href="https://drive.google.com/open?id=0B0BLFAc6216daWtwOXpWZkdkQlE"><i class="btn btn-primary">Download..</i></a>
									</div>
									<h5>Kampus J3</h5>
									<div align="right">
										<a href="https://drive.google.com/open?id=0B0BLFAc6216deTBabkMxdnZpSVE"><i class="btn btn-primary">Download..</i></a>
									</div>
							</div>
							</blockquote>


						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- End Jadwal Praktikum-->

	<!-- Download -->
	<div class="main main-raised" id="download" style="display: none;">
		<div class="container">
			<div class="section text-left section-landing">
				<div class="row">
					<div class="col-md-12 ">
						<h2 class="title">Download </h2>
						<h5 class="description" style="text-align: justify;"></h5>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div id="collapse3a" class="panel-collapse collapse in">
										<div class="panel-body">
											<div class="row">
												<div class="col-md-4">
													<img src="<?php echo base_url(); ?>assets/usr/img/template-easy-customize.png" alt="" class="img-responsive">
												</div>

												<?php
												$DataModul = $this->db->query("SELECT * FROM tbmodul WHERE status = 1");
												?>
												<div class="col-md-8">
													<h3>
														<center>Laboratorium Manajemen Menengah</center>
													</h3>
													<h3>
														<center>Universitas Gunadarma</center>
													</h3>
													<p>Bagi Mahasiswa yang mengikuti praktikum di Laboratorium Manajemen Menengah, dapat mendownload MODUL PRAKTIKUM dan SOAL LAPORAN AKHIR PRAKTIKUM (setiap pertemuan) di bawah ini:</p>
													<b>Modul Praktikum PTA 2017-2018</b><br><br>

													<?php
													if ($DataModul->num_rows() > 0) {
														foreach ($DataModul->result() as $Row) {
													?>
															<b><?= $Row->nama; ?></b><br>
															<ul>
																<li>Modul <?= $Row->nama; ?> - <a href="<?php echo base_url(); ?>assets/uploads/pdf/modul/<?= $Row->file; ?>"> Download Disini</a></li>
															</ul>
														<?php
														}
													} else {
														?>
														<h1>Modul Belum Tersedia</h1>
													<?php
													}
													?>
													<br>
													<b>
														<font color=red>[NEW]</color>
														</font> Download Kartu Praktikum Manajamen Menengah Depok <a href="
                                         http://www.mediafire.com/file/dwr0lsbh39bqm51/Kartu+Praktikum.pdf" target="_blank"> Download Disini </a>
													</b>
													<br>
													<b>Logo Laboratorium Manajemen Menengah Gunadarma - <a href="
							                           http://www.4shared.com/photo/HcdNsZZOba/logo_mamen.html" target="_blank"> Download Disini </a></b>
													<img src="<?php echo base_url(); ?>assets/usr/img/logo-mamen1.JPG"><br>
													<b>DOWNLOAD APLIKASI PENUNJANG PRAKTIKUM :</b>
													<ul>
														<li>Download Software Smart Method Management (SMM) v 15.4.1 <a href="https://www.dropbox.com/s/gh0eqmx3rcdbkvm/SMM%20v15.4.1.rar?dl=0"> disini </a></li>
														<li>Download Java Runtime Environment 32 bit <a href="https://www.dropbox.com/s/7e983pc6xeg2qog/jre-32%20bit.exe?dl=0" target="_blank"> disini </a></li>
														<li>Download Java Runtime Environment 64 bit <a href="https://www.dropbox.com/s/0xyr9hkbtegkljc/jre%20x64%20bit.exe?dl=0" target="_blank"> disini </a></li>
														<li>Download Software WinQSB untuk Windows 32bit <a href="https://www.dropbox.com/s/1ej76qwrjknq7az/WINQSB.zip?dl=0" target="_blank"> disini </a></li>
														<li>Silahkan download software ADMK ( Aplikasi Dasar Manajemen Keuangan ) <a href="http://www.mediafire.com/file/oqeyliu5q33rnia/SOFTWARE+DMK.rar" target="_blank"> disini </a></li>
														<li>Silahkan download software GIMP <a href="http://www.mediafire.com/file/yqdy0fzd2pa8wtv/gimp.rar" target="_blank"> disini </a></li>
														<li>Silahkan download software R Commander <a href="http://www.mediafire.com/file/rtgt54tbgl3zjge/R-2.8.0.rar" target="_blank"> disini </a></li>
														<li>Silahkan download Format Laporan Akhir <a href="http://www.mediafire.com/file/80gdq7j3jwopt4b/Format+LA+LAB.MM.docx" target="_blank"> disini </a></li>
														<li>Silahkan download Prestashop <a href="https://drive.google.com/file/d/0B7ZZBSD3hZx3aGxpSDhrNFdIZjQ/view" target="_blank"> disini </a></li>
														<li>Silahkan download Xampp <a href="https://drive.google.com/file/d/0B7ZZBSD3hZx3TXpuTUlrNjhTQzA/view" target="_blank"> disini </a></li>
													</ul>
													</h4>
													<img src=""><br>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Download -->

	<!-- Contact Us -->
	<div class="main main-raised" id="contactus" style="display: none;">
		<div class="container">
			<div class="section section-landing">
				<div class="row">
					<div class="col-md-12 ">
						<h2 class="title" style="text-align: center;">Contact Us</h2>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2357.783378302332!2d106.84085033516264!3d-6.354785174613509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec475427cefd%3A0xc4e7eee0f871687!2sUniversitas+Gunadarma+Kampus+E!5e0!3m2!1sid!2sid!4v1502420144740" width="1140" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<small>
						Kampus E Kelapa Dua (Ruang E52):
						Jl. Komjen M. Jasin, Kelapa Dua, Cimanggis, Depok. Telp. 021-8727538 ; 021-8727541 Ext. 556
					</small>
				</div>
			</div>
		</div>
	</div>
	<!-- End COntact Us -->


	<!-- Developer -->
	<div class="profile-page" id="developer" style="display: none;">
		<div class="main main-raised">
			<div class="profile-content">
				<div class="container">
					<div class="row">
						<div class="profile">
							<div class="avatar">
								<img src="<?= base_url(); ?>assets/virtual/img/BayuWijaya.png" alt="Circle Image" class="img-circle img-responsive img-raised">
							</div>
							<div class="name">
								<h3 class="title">Bayu Wijaya</h3>
								<h6>Developer</h6>
							</div>
							<div class="description text-center">
								<p><i>"Thankyou to visit my project"</i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Developer-->
	<!-- End Content -->

	</div>
	<!-- Fopter -->
	<footer class="footer">
		<div class="container">
			<nav class="pull-left">
				<ul>
					<li>
						<a href="javascript:ShowDeveloper();">
							V-Lab Tim
						</a>
					</li>
					<li>
						<a href="#">
							About Us
						</a>
					</li>
					<li>
						<a href="http://ma-menengah.lab.gunadarma.ac.id/">
							Blog
						</a>
					</li>
					<li>
						<a href="javascript:ShowContactUs();">
							Contact Us
						</a>
					</li>
				</ul>
			</nav>
			<div class="copyright pull-right">
				&copy; 2017, made with <i class="material-icons">favorite</i> by MaMen Tim for a better web.
			</div>
		</div>
	</footer>
	<!-- End Fopter -->


	<?php
	foreach ($DataBerita->result() as $Row2) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="myModal<?= $Row2->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							<i class="material-icons">clear</i>
						</button>
						<h4 class="modal-title"><?= $Row2->judul ?></h4>
					</div>
					<div align="center" style="padding-top: 30px;">
						<img src="<?php echo base_url(); ?>assets/uploads/images/berita/<?= $Row2->gambar; ?>" alt="<?= $Row2->gambar; ?>" class="img-rounded img-responsive" style="width: 300px; height: 300px;">
					</div>
					<div class="modal-body" style="">
						<?= $Row2->isi ?>
						<hr>
						<small>
							Tanggal Post : <?= $Row2->tanggal_post; ?>
						</small>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!--  End Modal -->
	<?php
	}
	?>


</body>
<!--   Core JS Files   -->
<script src="<?= base_url(); ?>assets/virtual/js/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/virtual/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/virtual/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url(); ?>assets/virtual/js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="<?= base_url(); ?>assets/virtual/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="<?= base_url(); ?>assets/virtual/js/material-kit.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/virtual/js/Function.js" type="text/javascript"></script>

<script type="text/javascript">
	$().ready(function() {
		// the body of this function is in assets/material-kit.js
		materialKit.initSliders();
		window_width = $(window).width();

		if (window_width >= 992) {
			big_image = $('.wrapper > .header');

			$(window).on('scroll', materialKitDemo.checkScrollForParallax);
		}
	});
</script>
<script type="text/javascript">
	var Tawk_API = Tawk_API || {},
		Tawk_LoadStart = new Date();
	(function() {
		var s1 = document.createElement("script"),
			s0 = document.getElementsByTagName("script")[0];
		s1.async = true;
		s1.src = 'https://embed.tawk.to/58c7bb542dfdd91cf6f232c3/default';
		s1.charset = 'UTF-8';
		s1.setAttribute('crossorigin', '*');
		s0.parentNode.insertBefore(s1, s0);
	})();
</script>

</html>
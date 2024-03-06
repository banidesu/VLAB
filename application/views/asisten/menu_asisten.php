	<!---=====================SEDEBAR===============-->
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
						<a href="<?php echo base_url();?>home/asisten">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Beranda </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li <?php echo $datapraktikan; ?>>
						<a href="<?php echo base_url();?>datapraktikan" >
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Praktikan
							</span>
						<b class=""></b>
						</a>
						<b class="arrow"></b>
					<ul class="submenu">
							</li>
						</ul>
					</li>
					<li <?php echo $datanilai; ?>>
						<a href="<?php echo base_url();?>Datanilai" >
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Nilai
							</span>
						<b class=""></b>
						</a>
						<b class="arrow"></b>
					<ul class="submenu">
							</li>
						</ul>
					</li>

					<li <?php echo $soal; ?>>
						<a href="<?php echo base_url();?>Soal" >
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Soal 
							</span>
						<b class=""></b>
						</a>
						<b class="arrow"></b>
					<ul class="submenu">
							</li>
						</ul>
					</li>

						<li <?php echo $matkul; ?>>
							<a href="<?php echo base_url();?>matakuliah" class="">
								<i class="menu-icon fa fa-bars"></i>
								<span class="menu-text">
									Sesi Praktikum
								</span>
							</a>
									<b class="arrow"></b>
									<ul class="submenu">
									<b class="arrow"></b>
							</ul>
						</li>
					<li <?php echo $ujian; ?>>
						<a href="<?php echo base_url();?>ujian" class="">
							<i class="menu-icon fa fa-pencil-square-o"></i>
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
						<a href="<?php echo base_url();?>tentang/asisten" class="">
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

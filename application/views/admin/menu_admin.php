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
					<li <?=$dashboard;?>>
						<a href="<?php echo base_url();?>home/admin">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Beranda </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li <?=$databerita;?>>
						<a href="<?php echo base_url();?>admin/berita" >
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Berita
							</span>
						<b class=""></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							</li>
						</ul>
					</li>

					<li <?=$datamodul;?>> 
						<a href="<?php echo base_url();?>admin/modul" >
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Modul
							</span>
						<b class=""></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
						</li>
						</ul>
					</li>
					<li <?=$dataasisten;?>>
						<a href="<?php echo base_url();?>admin/data_asisten" >
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">
								Data Asisten
							</span>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
								</li>
							</ul>
						</li>
					<li <?=$datapraktikum;?>>
						<a href="<?php echo base_url();?>admin/data_praktikum" >
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">
								Data Praktikum
							</span>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
								</li>
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

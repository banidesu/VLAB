  <?php
      foreach ($DataVlab->result() as $Row) 
      {
        $var_JmlPraktikan = $Row->JmlPraktikan;
        $var_JmlSoal_AL = $Row->JmlSoal_AL;
        $var_JmlSoal_TA = $Row->JmlSoal_TA;
        $var_JmlMatkul = $Row->JmlMatkul;
        $var_JmlUjian = $Row->JmlUjian;
      }
    ?>

    <div class="alert alert-block alert-success">
      <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
      </button>
      <i class="ace-icon fa fa-check green"></i>
       Selamat Datang Di 
      <strong class="green">
        Virtual Laboratorium Manajemen Menengah 
        <small></small>
      </strong>,
    </div>
    <div class="col-sm-12 infobox-container">
      <div class="infobox infobox-green">
        <div class="infobox-icon">
          <i class="ace-icon fa fa-user"></i>
        </div>

        <div class="infobox-data">
          <span class="infobox-data-number"><?=$var_JmlPraktikan?></span>
          <div class="infobox-content">Praktikan</div>
        </div>
      </div>

      <div class="infobox infobox-blue">
        <div class="infobox-icon">
          <i class="ace-icon fa fa-book"></i>
        </div>

        <div class="infobox-data">
          <span class="infobox-data-number"><?=$var_JmlSoal_TA?></span>
          <div class="infobox-content">Soal Tugas Akhir</div>
        </div>
      </div>

      <div class="infobox infobox-red">
        <div class="infobox-icon">
          <i class="ace-icon fa fa-book"></i>
        </div>

        <div class="infobox-data">
          <span class="infobox-data-number"><?=$var_JmlSoal_AL?></span>
          <div class="infobox-content">Soal Aktifitas Lab</div>
        </div>
      </div>

      <div class="infobox infobox-pink">
        <div class="infobox-icon">
          <i class="ace-icon fa fa-list-alt"></i>
        </div>

        <div class="infobox-data">
          <span class="infobox-data-number"><?=$var_JmlMatkul?></span>
          <div class="infobox-content">Mata Kuliah</div>
        </div>
      </div>

      <div class="infobox infobox-grey">
        <div class="infobox-icon">
          <i class="ace-icon fa fa-edit"></i>
        </div>

        <div class="infobox-data">
          <span class="infobox-data-number"><?=$var_JmlUjian?></span>
          <div class="infobox-content">Ujian</div>
        </div>
      </div>
  <hr />
      <div class="space-6"></div>
    </div>
    <div class="vspace-12-sm"></div>

        <?php 

          $get_berita = $this->db->query("SELECT * FROM tbberita WHERE status = 1 ORDER BY tanggal_post DESC ");
          
          if ($get_berita->num_rows()> 0 ) 
          {
            foreach ($get_berita->result() as $Row ) 
            {
        ?>
                <div class="col-sm-12">
                    <div class="widget-box">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title smaller">
                          <i class="ace-icon fa fa-news smaller-80"></i>
                          <?=$Row->judul?>
                        </h4>
                      </div>

                      <div class="widget-body">
                        <div class="widget-main">
                          

                          <div class="row">
                            <div class="col-xs-12">
                              <blockquote>
                                <p class="lighter line-height-125">
                                  <?=$Row->isi;?>
                                </p>

                                <small>
                                  Diposting Oleh 
                                  <cite title="Source Title"><?=$Row->deskripsi;?> - <?=$Row->tanggal_post;?></cite>
                                </small>
                              </blockquote>
                            </div>
                          </div>
                          <hr />
                        </div>
                      </div>
                      <div align="right" style="padding-bottom: 10px; padding-right: 10px">
                        <a href="#modal-form<?=$Row->id;?>" role="button" data-toggle="modal" class="btn btn-sm btn-primary"> Lihat Selengkapnya..</a>
                      </div>
                    </div>
                  </div>
                  <div id="modal-form<?=$Row->id;?>" class="modal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="blue bigger"><?=$Row->judul?></h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12">
                                <div align="center"> 
                                  <img src="<?php echo base_url();?>assets/uploads/images/berita/<?=$Row->gambar;?>" style="width: 300px; height: 300px;">
                                </div>
                              <hr / >
                                <?=$Row->isi?>
                                <div class="space-4"></div>
                              </div>
                            </div>
                          </div>
                          <blockquote>
                                <small>
                                  Diposting Oleh 
                                  <cite title="Source Title"><?=$Row->deskripsi;?> - <?=$Row->tanggal_post;?></cite>
                                </small>
                              </blockquote>
                          <div class="modal-footer">
                            <button class="btn btn-sm" data-dismiss="modal">
                              <i class="ace-icon fa fa-times"></i>
                              Tutup
                            </button>
                          </div>
                        </div>
                      </div>
</div><!-- PAGE CONTENT ENDS -->

        <?php
            }
          }
          else
          {
            ?>
                  <div class="col-sm-12" align="center">
                      <h1>Tidak ada berita.</h1>
                  </div>
        <?php   
          }
        ?>






  <!-- <embed src="http://www.praktikum-mm.com" style="width:1110px; height: 300px;"> -->


  <script type="text/javascript">
        jQuery(function($) {
          $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
              barColor: barColor,
              trackColor: trackColor,
              scaleColor: false,
              lineCap: 'butt',
              lineWidth: parseInt(size/10),
              animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
              size: size
            });
          })
        
          $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html',
                     {
                      tagValuesAttribute:'data-values',
                      type: 'bar',
                      barColor: barColor ,
                      chartRangeMin:$(this).data('min') || 0
                     });
          });
        
        
          //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
          //but sometimes it brings up errors with normal resize event handlers
          $.resize.throttleWindow = false;
        
          var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
          var data = [
          { label: "social networks",  data: 38.7, color: "#68BC31"},
          { label: "search engines",  data: 24.5, color: "#2091CF"},
          { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
          { label: "direct traffic",  data: 18.6, color: "#DA5430"},
          { label: "other",  data: 10, color: "#FEE074"}
          ]
          function drawPieChart(placeholder, data, position) {
            $.plot(placeholder, data, {
            series: {
              pie: {
                show: true,
                tilt:0.8,
                highlight: {
                  opacity: 0.25
                },
                stroke: {
                  color: '#fff',
                  width: 2
                },
                startAngle: 2
              }
            },
            legend: {
              show: true,
              position: position || "ne", 
              labelBoxBorderColor: null,
              margin:[-30,15]
            }
            ,
            grid: {
              hoverable: true,
              clickable: true
            }
           })
         }
         drawPieChart(placeholder, data);
        
         /**
         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
         so that's not needed actually.
         */
         placeholder.data('chart', data);
         placeholder.data('draw', drawPieChart);
        
        
          //pie chart tooltip example
          var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
          var previousPoint = null;
        
          placeholder.on('plothover', function (event, pos, item) {
          if(item) {
            if (previousPoint != item.seriesIndex) {
              previousPoint = item.seriesIndex;
              var tip = item.series['label'] + " : " + item.series['percent']+'%';
              $tooltip.show().children(0).text(tip);
            }
            $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
          } else {
            $tooltip.hide();
            previousPoint = null;
          }
          
         });
        
          /////////////////////////////////////
          $(document).one('ajaxloadstart.page', function(e) {
            $tooltip.remove();
          });
        
        
        
        
          var d1 = [];
          for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
          }
        
          var d2 = [];
          for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
          }
        
          var d3 = [];
          for (var i = 0; i < Math.PI * 2; i += 0.2) {
            d3.push([i, Math.tan(i)]);
          }
          
        
          var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
          $.plot("#sales-charts", [
            { label: "Domains", data: d1 },
            { label: "Hosting", data: d2 },
            { label: "Services", data: d3 }
          ], {
            hoverable: true,
            shadowSize: 0,
            series: {
              lines: { show: true },
              points: { show: true }
            },
            xaxis: {
              tickLength: 0
            },
            yaxis: {
              ticks: 10,
              min: -2,
              max: 2,
              tickDecimals: 3
            },
            grid: {
              backgroundColor: { colors: [ "#fff", "#fff" ] },
              borderWidth: 1,
              borderColor:'#555'
            }
          });
        
        
          $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
          function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();
        
            var off2 = $source.offset();
            //var w2 = $source.width();
        
            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
          }
        
        
          $('.dialogs,.comments').ace_scroll({
            size: 300
            });
          
          
          //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
          //so disable dragging when clicking on label
          var agent = navigator.userAgent.toLowerCase();
          if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
            $('#tasks').on('touchstart', function(e){
            var li = $(e.target).closest('#tasks li');
            if(li.length == 0)return;
            var label = li.find('label.inline').get(0);
            if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
          });
        
          $('#tasks').sortable({
            opacity:0.8,
            revert:true,
            forceHelperSize:true,
            placeholder: 'draggable-placeholder',
            forcePlaceholderSize:true,
            tolerance:'pointer',
            stop: function( event, ui ) {
              //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
              $(ui.item).css('z-index', 'auto');
            }
            }
          );
          $('#tasks').disableSelection();
          $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
            if(this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
          });
        
        
          //show the dropdowns on top or bottom depending on window height and menu position
          $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
            var offset = $(this).offset();
        
            var $w = $(window)
            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
              $(this).addClass('dropup');
            else $(this).removeClass('dropup');
          });
        
        })
      </script>

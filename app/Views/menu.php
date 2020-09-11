<?= $this->section('menu') // ESCPECIFICA EM QUAL SECTION COLOCA O ABAIXO ?>


<div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
  <ul class="nav nav-list">


<?php


// echo '<pre>';
// var_dump($controllers);


  echo "
  <li class=''>
    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
      <i class=\"menu-icon fa fa-gear\"></i>
      <span class=\"menu-text\">
        Results
      </span>

      <b class=\"arrow fa fa-angle-down\"></b>
    </a>

    <b class=\"arrow\"></b>
      <ul class=\"submenu\">
    ";



    echo "
        <li class=\"\">
          <a href=\"tester\">
            <i class=\"menu-icon fa fa-tachometer\"></i>
            List

            </a>
          <b class=\"arrow\"></b>
        </li>
    ";

  echo "
    </ul>
  </li>
  ";


 ?>
  </ul><!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon"
       class="ace-icon fa fa-angle-double-left"
       data-icon1="ace-icon fa fa-angle-double-left"
       data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>

<?= $this->endSection() // ENCERRA A SECTION?>

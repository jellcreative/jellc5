<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php');
?>
<div id="content_inner">
  <div class="width_holder">
    <div id="main_wrapper">


      <!-- begin main -->
      <div id="main">

        <div id="main_body">
          <?
          $main_content = new Area('Main Content');
          $main_content->display($c);
          ?>
        </div>
        <!-- end #main_body  -->
      </div>
      <!-- end main  -->

      <!---BEGIN SIDEBAR CONTENT-->
      <aside>
        <?php
        $aside_content = new Area('Aside Content');
        $aside_content->display($c);
        ?>
      </aside>
      <!---END SIDEBAR CONTENT-->


    </div><!-- end main_wrapper -->
  </div><!-- end width_holder -->



</div><!-- end content_inner -->
<? $this->inc('elements/footer.php');
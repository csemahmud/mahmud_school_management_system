      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
              <h2 class="pad_bot1">All   Notices</h2>
              
              <?php foreach ($notices as $v_notice) { ?>
              
              <p class="pad_bot1 pad_top2"><a href="<?php echo base_url(); ?>front_controller/details_notice_component/<?php echo $v_notice->notice_id; ?>">
                      <strong>
                          <?php echo $v_notice->notice_title; ?>
                      </strong>
                  </a></p>
              
                  <a href="<?php echo base_url(); ?>front_controller/details_notice_component/<?php echo $v_notice->notice_id; ?>" class="button marg_top1"><span><span>Details</span></span></a>
         
              <?php } ?>
                   </div></article>
        </div>
      </div>

      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
                <h1 style="font-size: larger" class="pad_bot1"><strong><?php echo $notice_info->notice_title; ?></strong></h1>
                
              <p class="pad_bot1 pad_top2"><strong>Date : <?php echo $notice_info->created_date_time; ?></strong></p>
              
              <p class="pad_bot1 pad_top2">
                      <?php echo $notice_info->notice_description; ?>
                  </p>
                    <?php if(isset($details)) {?>

                        <a href="<?php echo base_url(); ?>front_controller/make_notice_pdf/<?php echo $notice_info->notice_id; ?>" class="button marg_top1"><span><span>Download PDF</span></span></a>

                    <?php } ?>
              
                   </div></article>
        </div>
      </div>
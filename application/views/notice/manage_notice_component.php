<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Grid</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-th"></i> Notice Manager</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h3 class="message">
                <?php
                $message = $this->session->userdata('message');
                if ($message) {
                    echo $message;
                    $this->session->unset_userdata('message');
                }
                ?>
            </h3>
            <h3 class="exception">
                <?php
                $exception = $this->session->userdata('exception');
                if ($exception) {
                    echo $exception;
                    $this->session->unset_userdata('exception');
                }
                ?>

            </h3>
            <div class="row-fluid">
                <div class="span3"><h5>Notice Id</h5></div>
                <div class="span3"><h5>Notice Title</h5></div>
                <div class="span3"><h5>Publication Status</h5></div>
                <div class="span3"><h5>Action</h5></div>
            </div>                   
            <?php
            foreach ($all_notices as $v_notice) {
                ?>
                <div class="row-fluid">
                    <div class="span3"><h6><?php echo $v_notice->notice_id ?></h6></div>
                    <div class="span3"><h6><?php echo $v_notice->notice_title ?></h6></div>
                    <div class="span3"><h6>
                            <?php
                            if ($v_notice->publication_status == 1) {
                                echo 'published';
                            } else {
                                echo 'Unpublished';
                            }
                            ?></h6></div>
                    <div class="span3"><h6>
                            <a class="btn btn-info" href="<?php echo base_url(); ?>samsung_nt_controller/edit_notice/<?php echo $v_notice->notice_id; ?>" title="Edit"><i class="icon-edit icon-white"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>samsung_nt_controller/delete_notice/<?php echo $v_notice->notice_id; ?>" title="Delete" onclick="return confirm('Are You Sure To Delete This ?')" ><i class="icon-trash icon-white"></i></a>
                            <?php
                            if ($v_notice->publication_status == 0) {
                                ?>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>samsung_nt_controller/publish_notice/<?php echo $v_notice->notice_id; ?>" title="Publish" ><i class="icon-ok icon-white"></i></a>
                                <?php
                            } else {
                                ?> 

                            <a class="btn btn-danger" href="<?php echo base_url(); ?>samsung_nt_controller/unpublish_notice/<?php echo $v_notice->notice_id; ?>" title="Unpublish" ><i class="icon-lock icon-black"></i></a>
                            <?php } ?></h6></div>
                </div>                   
            <?php } ?>
        </div>
    </div><!--/span-->
</div><!--/row-->


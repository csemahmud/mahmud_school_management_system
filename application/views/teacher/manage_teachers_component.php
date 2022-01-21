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
            <h2><i class="icon-th"></i>Manage   Teacher</h2>
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
            <?php if(count($all_teachers)>0){ ?>
            <div class="row-fluid">
                <div class="span3"><h5>Teacher   Full   Name</h5></div>
                <div class="span3"><h5>Email</h5></div>
                <div class="span3"><h5>Activity   Status</h5></div>
                <div class="span3"><h5>Action</h5></div>
            </div>                   
            <?php foreach ($all_teachers as $v_teacher) {
                ?>
                <div class="row-fluid">
                    <div class="span3"><h6><?php echo $v_teacher->first_name.' '.$v_teacher->middle_name.' '.$v_teacher->last_name ?></h6></div>
                    <div class="span3"><h6><?php echo $v_teacher->email ?></h6></div>
                    <div class="span3"><h6>
                            <?php
                            if ($v_teacher->activity_status == 1) {
                                echo 'Active';
                            } else {
                                echo 'Inactive';
                            }
                            ?></h6></div>
                    <div class="span3"><h6>
                            <a class="btn btn-info" href="<?php echo base_url(); ?>samsung_tc_controller/edit_teacher/<?php echo $v_teacher->teacher_id; ?>" title="Edit"><i class="icon-edit icon-white"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>samsung_tc_controller/delete_teacher/<?php echo $v_teacher->teacher_id; ?>" title="Delete" onclick="return confirm('Are You Sure To Delete This ?')" ><i class="icon-trash icon-white"></i></a>
                            <?php
                            if ($v_teacher->activity_status == 1) {
                                ?>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>samsung_tc_controller/deactivate_teacher/<?php echo $v_teacher->teacher_id; ?>" title="Deactivate" ><i class="icon-lock icon-black"></i></a>
                                <?php
                            } else {
                                ?> 

                            <a class="btn btn-success" href="<?php echo base_url(); ?>samsung_tc_controller/activate_teacher/<?php echo $v_teacher->teacher_id; ?>" title="Activate" ><i class="icon-ok icon-white"></i></a>
            <?php } ?></h6></div>
                </div>                   
            <?php } ?>
            <!--
                <div class="pagination pagination-centered">
                 <ul>
                       <li><a href="#">Prev</a></li>
                       <li class="active">
                         <a href="#">1</a>
                       </li>
                       <li><a href="#">2</a></li>
                       <li><a href="#">3</a></li>
                       <li><a href="#">4</a></li>
                       <li><a href="#">Next</a></li>
                 </ul>
               </div>
            -->
            <?php }
            
            else {
                ?><h1>There   is   no   Teacher  to   Show</h1><?php
            }
            
            ?>
        </div>
    </div><!--/span-->
</div><!--/row-->


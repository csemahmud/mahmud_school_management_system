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
            <h2><i class="icon-th"></i> Admission Manager  |  </h2>
            <div>
                <a href="<?php echo base_url().'samsung_ad_controller/switch_admission_status/'.$admission_status ?>" class="btn btn-primary">
                    
                    <?php 
                    
                    switch ($admission_status){
                    case 0:
                        echo "Start   Admission";
                        break;
                    case 1:
                        echo "Stop   Admission";
                        break;
                    }
                    
                    ?>
                    
                    </a>
            </div>
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
            <?php if(count($all_applicants)>0){ ?>
            <div class="row-fluid">
                <div class="span3"><h5>Select   Applicants</h5></div>
                <div class="span3"><h5>Full Name</h5></div>
                <div class="span3"><h5>Applied For Class</h5></div>
                <div class="span3"><h5>Action</h5></div>
            </div>                   
            <form action="<?php echo base_url(); ?>samsung_ad_controller/transfer_applicants.aspx" method="post">
            <?php
            foreach ($all_applicants as $v_applicant) {
                ?>
                <div class="row-fluid">
                    <div class="span3"><h6>
							  <div class="control-group">
								<div class="controls">
								  <label class="checkbox inline">
                                                                      <input type="checkbox" name="<?php echo $v_applicant->admission_id; ?>" id="inlineCheckbox1" value="on" > 
								  </label>
								</div>
							  </div></h6></div>
                    <div class="span3"><h6><?php echo $v_applicant->first_name.' '.$v_applicant->middle_name.' '.$v_applicant->last_name ?></h6></div>
                    <div class="span3"><h6>
                            <?php echo $v_applicant->class ?></h6></div>
                    <div class="span3"><h6>
                            <a class="btn btn-info" href="<?php echo base_url(); ?>samsung_ad_controller/edit_applicant/<?php echo $v_applicant->admission_id; ?>" title="Edit"><i class="icon-edit icon-white"></i></a>
                            </h6></div>
                </div>                   
            <?php } ?>
                <div class="row-fluid">
                    <div class="span6"></div>
                    <div class="span6">
							<div class="form-actions">
                                                            <input type="submit" class="btn btn-primary" name="admit_btn" value="Admit   Selected   Cadidates">
                                                            <input type="submit" class="btn" name="delete_btn" value="Delete   Selected   Candidates"  onclick="return confirm('Are You Sure To Delete These   Selected   Candidates ?')">
							</div></div>
                </div>
            </form>
            <!--
<div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>
            -->

            <?php }
            
            else {
                echo '<h1>No   More   Applicants   to   show</h1>';
            }
            
            ?>
        </div>
    </div><!--/span-->
</div><!--/row-->

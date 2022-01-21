<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> <?php echo $function; ?>   Notice</h2>
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
            <form name="save_notice_form" action="<?php echo base_url(); ?>samsung_nt_controller/<?php 
            
                switch ($function){
                case 'Add':
                    echo 'save_notice';
                    break;
                case 'Update':
                    echo 'update_notice/'.$notice_info->notice_id;
                    break;
                }
            
                ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <legend><?php echo $function; ?>   Notice</legend>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Notice   Title</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="notice_title" value="<?php 
                            if(isset($notice_info->notice_title)){
                                echo $notice_info->notice_title;
                            }
                            elseif ($this->session->userdata('notice_title')) {
                                echo $this->session->userdata('notice_title');
                                $this->session->unset_userdata('notice_title');
                            }
                            ?>" required="required" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textarea2">Notice   Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="notice_description" required="required" id="textarea2" rows="3"><?php 
                            if(isset($notice_info->notice_description)){
                                echo $notice_info->notice_description;
                            }
                            elseif ($this->session->userdata('notice_description')) {
                                echo $this->session->userdata('notice_description');
                                $this->session->unset_userdata('notice_description');
                            }
                            ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                          <label class="control-label">Publication   Status</label>
                          <div class="controls">
                            <label class="radio">
                                  <input type="radio" name="publication_status" id="optionsRadios1" value="1" <?php 

                                  if(isset($notice_info->publication_status)){
                                      if($notice_info->publication_status==1){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('publication_status')!=NULL){
                                      if($this->session->userdata('publication_status')==1){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('publication_status');
                                  }}
                                  else {
                                      ?>checked="checked"<?php
                                  }
                                  ?> >
                                  Published
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                  <input type="radio" name="publication_status" id="optionsRadios2" value="0"<?php 
                                  if(isset($notice_info->publication_status)){
                                      if($notice_info->publication_status==0){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('publication_status')!=NULL) {
                                          if($this->session->userdata('publication_status')==0){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('publication_status');
                                  }}
                                  ?>>
                                  Unpublished
                            </label>
                          </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="btn" class="btn btn-primary" value="<?php echo $function; ?>">
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
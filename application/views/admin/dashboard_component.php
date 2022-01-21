			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Welcome</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            <h1>Hello,   <span style="font-family: cursive; color: #663399;"><i><?php if($this->session->userdata('admin_name')!=NULL){
                                                echo $this->session->userdata('admin_name');
                                                }
                                                elseif ($this->session->userdata('admin_teacher_name')!=NULL){
                                                    echo $this->session->userdata('admin_teacher_name');
                                                    }?></i></span></h1>
                                            <h1>Welcome   to   Dashboard</h1>
						
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			
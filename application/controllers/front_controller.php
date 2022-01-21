<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Front_Controller
 * Enity : Front
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Front_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $data=array();
            $cdata=array();
            $cdata['recent_notices'] = $this->front_model->recent_notices();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('index',$cdata,TRUE);
            $data['title']='Home';
            $data['banners']=TRUE;
            $data['page_id'] = 1;
            $data['icon3'] = TRUE;
            $this->load->view('master_ui',$data);
	}
        
	public function teachers_component()
	{
            $cdata = array();
            $cdata['teachers'] = $this->front_model->select_all_published_teachers();
            $all_qualifications = array();
            $i = 0;
            foreach ($cdata['teachers'] as $v_teacher) {
                $all_qualifications[$i] = $this->front_model->select_major_qualifications_by_teacher_id($v_teacher->teacher_id);
                $i++;
            }
            $cdata['all_qualifications'] = $all_qualifications;
            $data=array();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('teachers_component',$cdata,TRUE);
            $data['title']='Teachers';
            $data['page_id'] = 4;
            $this->load->view('master_ui',$data);
	}
        
        public function details_teacher_component($teacher_id){
            $cdata = array();
            $cdata['teacher_info'] = $this->front_model->select_teacher_by_id($teacher_id);
            $cdata['qualifications'] = $this->front_model->select_qualifications_by_teacher_id($teacher_id);
            $cdata['experiences'] = $this->front_model->select_experiences_by_teacher_id($teacher_id);
            $data=array();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('details_teacher_component',$cdata,TRUE);
            $data['title']='Details';
            $data['page_id'] = 4;
            $this->load->view('master_ui',$data);
        }
        
        public function assigned_courses_component($teacher_id){
            $cdata = array();
            $cdata['assigned_courses'] = $this->front_model->select_assigned_courses_by_teacher_id_and_assign_status($teacher_id,1);
            $data=array();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('assigned_courses_component',$cdata,TRUE);
            $data['title']='Details';
            $data['page_id'] = 4;
            $this->load->view('master_ui',$data);
        }

        public function admissions_component()
	{
            $data=array();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            if($data['admission_status']==1){
                $data['main_content']=$this->load->view('admissions_component','',TRUE);
                $data['title']='Admissions';
                $data['page_id'] = 5;
                $this->load->view('master_ui',$data);
            }
            else {
                redirect('','refresh');
            }
	}
        
	public function contacts_component()
	{
            $data=array();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('contacts_component','',TRUE);
            $data['title']='Contacts';
            $data['page_id'] = 6;
            $this->load->view('master_ui',$data);
	}
        
        public function save_application(){
            $data = array();
            $data['first_name'] = $this->input->post('first_name',TRUE);
            $data['middle_name'] = $this->input->post('middle_name',TRUE);
            $data['last_name'] = $this->input->post('last_name',TRUE);
            $data['class'] = $this->input->post('class',TRUE);
            $data['father_name'] = $this->input->post('father_name',TRUE);
            $data['mother_name'] = $this->input->post('mother_name',TRUE);
            $data['birth_date'] = $this->input->post('birth_date',TRUE);
            $data['gender'] = $this->input->post('gender',TRUE);
            $data['religion'] = $this->input->post('religion',TRUE);
            $data['email'] = $this->input->post('email',TRUE);
            $data['phone'] = $this->input->post('phone',TRUE);
            $data['address'] = $this->input->post('address',TRUE);
        
            if ($_FILES['student_image']['name']) {

                    $fdata=array();
                    $config['upload_path'] = 'uploads/student_images/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '225';
                    $config['max_width']  = '768';
                    $config['max_height']  = '1024';

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('student_image'))
                    {
                            $error = $this->upload->display_errors();
                            $data['exception'] = $error;
                            $this->session->set_userdata($data);
                            redirect('front_controller/admissions_component');
                    }
                    else
                    {
                            $fdata = $this->upload->data();
                            $data['student_image'] = $config['upload_path'].$fdata['file_name'];
                    }
            }
            else {
                $data['student_image'] = '';
            }
        
            if($this->front_model->insert_admission_info($data)>0){
                $data['message'] = '<strong>SAVED</strong> Application Successfully with Following  Information : ';
            }
            else {
                $data['exception'] = 'Could <strong>NOT</strong> save Application Information .....';
            }
            $this->session->set_userdata($data);
            redirect('front_controller/admissions_component');
        }
        
        public function registration_component(){
            $data=array();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('registration_component','',TRUE);
            $data['title']='Registration';
            $data['page_id'] = 6;
            $this->load->view('master_ui',$data);
        }
        
        public function check_student_email($email,$roll,$class){
            $student = $this->front_model->select_student_by_email_considering_roll_or_class($email,$roll,$class);
            if($student!=NULL){
                echo '<div><h4 class="exception">This   Email  Address   already   exists</h4></div>';
            }
            else {
                echo '<div><h4 class="message">This   Email  Address   is   available</h4></div>';
            }
        }
        
        public function check_existing_student($roll,$class){
            $student = $this->front_model->select_student_by_roll_and_class($roll,$class);
            if($student!=NULL){
                if($student->registration_status=='pen'){
                    echo '<div><h4 class="exception">You  have   already  requested  for  Registration</h4></div>';
                }
                elseif ($student->registration_status=='reg') {
                    echo '<div><h4 class="exception">You  are   already  Registered</h4></div>';
                }
            }
        }
        
        public function register_student(){
            $sdata = array();
            $roll = $this->input->post('roll',TRUE);
            $class = $this->input->post('class',TRUE);
            $email = $this->input->post('email',TRUE);
            $password = md5($this->input->post('password',TRUE));
            $student = $this->front_model->select_student_by_roll_and_class($roll,$class);
            if($student->registration_status!=NULL){
                if($student->registration_status=='pen'){
                    $sdata['exception'] = 'You  have   already  requested  for  Registration';
                }
                elseif ($student->registration_status=='reg') {
                    $sdata['exception'] = 'You  are   already  Registered';
                }
                $sdata['roll'] = $roll;
                $sdata['class'] = $class;
                $sdata['email'] = $email;
                $sdata['password'] = $this->input->post('password',TRUE);
                $this->session->set_userdata($sdata);
                redirect('front_controller/registration_component');
            }
            $student = $this->front_model->select_student_by_email_considering_roll_or_class($email,$roll,$class);
            if($student!=NULL){
                $sdata['email_exception'] = '<div><h4 class="exception">This   Email  Address   already   exists</h4></div>';
                $sdata['roll'] = $roll;
                $sdata['class'] = $class;
                $sdata['email'] = $email;
                $sdata['password'] = $this->input->post('password',TRUE);
                $this->session->set_userdata($sdata);
                redirect('front_controller/registration_component');
            }
            if($this->front_model->update_registration_status_email_password_by_roll_and_class($roll,$class,'pen',$email,$password)>0){
                $sdata['message'] = 'Request  for  <strong>REGISTRATION</strong>   has  been  sent   successfully !!!';
            }
            else {
                $sdata['exception'] = 'Could <strong>NOT</strong> send   request  request  for   registration .....';
            }
            $this->session->set_userdata($sdata);
            redirect('front_controller/registration_component');
        }
        
	public function all_notices_component()
	{
            $data=array();
            $cdata=array();
            $cdata['notices'] = $this->front_model->select_all_published_notices();
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('all_notices_component',$cdata,TRUE);
            $data['title']='All Notices';
            $data['page_id'] = 5;
            $this->load->view('master_ui',$data);
	}
        
	public function details_notice_component($notice_id)
	{
            $data=array();
            $cdata=array();
            $cdata['notice_info'] = $this->front_model->select_notice_by_id($notice_id);
            $cdata['details'] = TRUE;
            $data['admission_status'] = $this->front_model->select_admission_status_info(1)->admission_status;
            $data['main_content']=$this->load->view('details_notice_component',$cdata,TRUE);
            $data['title']='Details Notices';
            $data['page_id'] = 5;
            $this->load->view('master_ui',$data);
	}
        
	public function make_notice_pdf($notice_id)
	{
            $this->load->helper('dompdf');
            $cdata=array();
            $cdata['notice_info'] = $this->front_model->select_notice_by_id($notice_id);
            $view_file=$this->load->view('details_notice_component',$cdata,TRUE);
            $file_name=pdf_create($view_file, 'Notice');
            echo $file_name;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
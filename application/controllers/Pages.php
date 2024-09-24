<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
            //     redirect(base_url());
            // }
            $data['cars'] = $this->Rental_model->getAllCarsByType();
            $data['totalcars'] = $this->Rental_model->getAllCars();
            $data['users'] = $this->Rental_model->getAllUsers();
            $data['bookings'] = $this->Rental_model->getAllBookings();
            $data['home'] = 'active';
            $data['car'] = '';       
            $data['login'] = '';  
            $data['booking'] = '';   
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }
        public function cars(){
            $page = "cars";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
            //     redirect(base_url()."main");
            // }
            $data['cars'] = $this->Rental_model->getAllCars();     
            $data['cartype'] = $this->Rental_model->getAllCarType();       
            $data['home'] = '';
            $data['car'] = 'active';
            $data['type'] = "";
            $data['login'] = '';
            $data['booking'] = '';
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }
        public function view_car_details($id){
            $page = "car_details";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
            //     redirect(base_url()."main");
            // }
            $data['cars'] = $this->Rental_model->getSingleCar($id);
            $data['reviews'] = $this->Rental_model->getSingleCarReview($id);
            $data['home'] = '';
            $data['car'] = 'active';
            $data['type'] = "";
            $data['login'] = '';
            $data['booking'] = '';
            $data['id'] = $id;
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }
        public function view_car_type($type){
            $page = "cars";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
            //     redirect(base_url()."main");
            // }
            $data['cars'] = $this->Rental_model->getCarsByType($type);     
            $data['cartype'] = $this->Rental_model->getAllCarType();       
            $data['home'] = '';
            $data['car'] = 'active';
            $data['type'] = $type;
            $data['login'] = '';
            $data['booking'] = '';
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }
        public function user_login($loc,$id){
            $page = "login";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url()."main");
            }            
            $data['home'] = '';
            $data['car'] = '';
            $data['login'] = 'active';
            $data['location'] = $loc;            
            $data['id'] = $id;
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }
        public function save_user(){
            $username=$this->input->post('username');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');            
            $fullname=$firstname." ".$lastname;
            $save=$this->Rental_model->save_user();
            if($save){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $fullname,
                    'user_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url());
            }else{
                echo "<script>alert('Unable to sign up!');window.location='".base_url()."user_login';</script>";
            }
        }
        public function user_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        }
        public function user_authentication(){
            $loc=$this->input->post('location');
            $id=$this->input->post('id');
            $authenticate=$this->Rental_model->user_authentication();
            if($authenticate){
                $user_data=array(
                    'username' => $authenticate['username'],
                    'fullname' => $authenticate['fullname'],
                    'user_login' => true
                );
                $this->session->set_userdata($user_data);
                if($loc==0 && $id==0){
                    redirect(base_url());
                }else{
                    redirect(base_url()."$loc/$id");
                }
            }else{
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."user_login/$loc/$id';</script>";
            }
        }

        public function user_bookings(){
            $page = "user_bookings";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
            //     redirect(base_url()."main");
            // }            
            $data['bookings'] = $this->Rental_model->getAllUserBooking($this->session->username);       
            $data['home'] = '';
            $data['car'] = '';
            $data['type'] = '';
            $data['login'] = '';
            $data['booking'] = 'active';
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }

        public function car_booking($id){
            $page = "car_booking";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
            //     redirect(base_url()."main");
             }else{
                redirect(base_url()."user_login/view_car_details/$id");
             }
            $data['cars'] = $this->Rental_model->getSingleCar($id);            
            $data['home'] = '';
            $data['car'] = 'active';
            $data['type'] = "";
            $data['login'] = '';
            $data['booking'] = '';
            $data['id'] = $id;
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }
        public function book_save(){
            $id=$this->input->post('car_id');
            $startdate=$this->input->post('date_start');
            $enddate=$this->input->post('date_return');
            $check=$this->Rental_model->check_availability($id,$startdate,$enddate);
            if($check){
                echo "<script type='text/javascript'>alert('Unable to save booking! Unit is not available on your preferred date!');window.location='".base_url()."car_booking/$id';</script>";
            }else{
                
                    $message="Hello,
            
Thank you for booking with us. Please wait a few moment for the administrator to review your booking details.
            
God Bless you always.";
                    $prof=$this->Rental_model->getUserEmailAdd($this->session->username);
                    $email=$prof['email'];
                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'easykill.aboy@gmail.com',
                        'smtp_pass' => 'ngfpdqyrfvoffhur',
                        'mailtype' => 'text',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
                    $this->load->library('email',$config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('DOM Car Rental');
                    $this->email->to($email);
                    $this->email->subject('Booking Success!');
                    $this->email->message($message);
                    // $this->email->send();
                    // $this->email->print_debugger();
                    if($this->email->send()){
                        $book=$this->Rental_model->book_save();
                        echo "<script type='text/javascript'>alert('Booking Successfully saved! We sent you a confirmation email for your reference. Thank you!');window.location='".base_url()."user_bookings';</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Unable to save booking!');window.location='".base_url()."car_booking/$id';</script>";
                    }                   
            }            
        }
        public function cancel_user_booking($id){
            $cancel=$this->Rental_model->cancel_booking($id);
            echo "<script type='text/javascript'>";
            if($cancel){
                echo "alert('Booking successfully cancelled!');";
            }else{
                echo "alert('Unbale to cancel booking!');";
            }
                echo "window.location='".base_url()."user_bookings';";
            echo "</script>";
        }
        public function cancel_booking($id){
            $message="Hello,
            
We regret to inform you that we cancel your booking for some reasons. You may come to our office for more details.
            
Thank you.";
            $prof=$this->Rental_model->getUserEmail($id);
            $email=$prof['email'];
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('DOM Car Rental');
            $this->email->to($email);
            $this->email->subject('Booking Cancellation!');
            $this->email->message($message);
            // $this->email->send();
            // $this->email->print_debugger();
            if($this->email->send()){
                $this->Rental_model->cancel_booking($id);
                $this->session->set_flashdata("success","Booking status successfully updated!");
            }else{
                $this->session->set_flashdata("failed","Unable to update booking status!");
            }
            redirect(base_url()."manage_bookings");            
        }
        public function upload_pop($id){
            $page = "upload_pop";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
            //     redirect(base_url()."main");
            // }            
            $data['id'] = $id;       
            $data['home'] = '';
            $data['car'] = '';
            $data['type'] = '';
            $data['login'] = '';
            $data['booking'] = 'active';
            $this->load->view('templates/user/header');                        
            $this->load->view('templates/user/navbar',$data);
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');                        
            $this->load->view('templates/user/footer');
        }
        public function upload_pop_save(){            
            $book=$this->Rental_model->upload_pop_save();
            if($book){
                echo "<script type='text/javascript'>alert('Proof of Payment successfully uploaded!');window.location='".base_url()."user_bookings';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Unable to upload proof of payment!');window.location='".base_url()."user_bookings';</script>";
            }
        }
        public function view_pop_image($id){
            $page="pop_image";
            $data['image'] = $this->Rental_model->getProofPayment($id);
            $this->load->view('pages/'.$page,$data);
        }
        public function remove_pop($id){            
            $book=$this->Rental_model->remove_pop($id);
            if($book){
                echo "<script type='text/javascript'>alert('Proof of Payment successfully removed!');window.location='".base_url()."user_bookings';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Unable to remove proof of payment!');window.location='".base_url()."user_bookings';</script>";
            }
        }
        public function confirm_booking(){
            $id=$this->input->post('id');
            $message=$this->input->post('remarks');
            $prof=$this->Rental_model->getUserEmail($id);
            $email=$prof['email'];
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('DOM Car Rental');
            $this->email->to($email);
            $this->email->subject('Booking Confirmation!');
            $this->email->message($message);
            // $this->email->send();
            // $this->email->print_debugger();
            if($this->email->send()){
                $this->Rental_model->confirm_booking($id);                
                $this->session->set_flashdata("success","Booking status successfully updated!");
            }else{
                $this->session->set_flashdata("failed","Unable to update booking status!");
            }
            redirect(base_url()."manage_bookings");
        }

        public function complete_booking($id){
            $message="Hello,
            
Thank you for your support and we will be glad if you come back and rent again.";
            $prof=$this->Rental_model->getUserEmail($id);
            $email=$prof['email'];
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('DOM Car Rental');
            $this->email->to($email);
            $this->email->subject('Booking Complete!');
            $this->email->message($message);
            // $this->email->send();
            // $this->email->print_debugger();
            if($this->email->send()){
                $this->Rental_model->complete_booking($id);
                $this->session->set_flashdata("success","Booking status successfully updated!");
            }else{
                $this->session->set_flashdata("failed","Unable to update booking status!");
            }
            redirect(base_url()."manage_bookings");            
        }
        public function check_availability(){
            $car=$this->input->post('car');
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            $check=$this->Rental_model->check_availability($car,$startdate,$enddate);
            if($check){                
                $this->session->set_flashdata('failed','This unit is NOT available!');
            }else{
                $this->session->set_flashdata('success','This unit is available!');                
            }
            redirect(base_url());
        }
        public function save_review(){
            $id=$this->input->post('id');
            $save=$this->Rental_model->save_review();
            if($save){
                echo "<script type='text/javascript'>alert('Review successfully posted!');window.location='".base_url()."view_car_details/$id';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Unable to submit review!');window.location='".base_url()."view_car_details/$id';</script>";
            }
        }
        //=================================Start of Admin Modules================================
        public function admin(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url()."admin/main");
            }
            $this->load->view('pages/admin/'.$page);            
        }
        public function admin_authentication(){
            $authenticate=$this->Rental_model->admin_authentication();
            if($authenticate){
                $user_data=array(
                    'username' => $authenticate['username'],
                    'fullname' => $authenticate['fullname'],
                    'admin_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."admin_main");
            }else{
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."admin';</>";
            }
        }
        public function admin_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('admin_login');
            redirect(base_url()."admin");
        }
        public function admin_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                echo "<script>alert('You are not authorized!');window.location='".base_url()."admin';</script>";
            }
            $data['users'] = $this->Rental_model->getAllUsers();
            $data['bookings'] = $this->Rental_model->getAllBookings();
            $data['cars'] = $this->Rental_model->getAllCars();
            $data['available_cars'] = $this->Rental_model->getAllCarStatus("available");
            $data['book_pending'] = $this->Rental_model->getAllBookingStatus("pending");
            $data['book_completed'] = $this->Rental_model->getAllBookingStatus("completed");
            $data['recent_bookings'] = $this->Rental_model->getRecentBookings();
            $this->load->view('templates/admin/header');            
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);     
            $this->load->view('templates/admin/modal'); 
            $this->load->view('templates/admin/footer');       
        }
        public function manage_bookings(){
            $page = "bookings";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                echo "<script>alert('You are not authorized!');window.location='".base_url()."admin';</script>";
            }
            
            $data['bookings'] = $this->Rental_model->getAllBookings();                        
            $this->load->view('templates/admin/header');            
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);     
            $this->load->view('templates/admin/modal'); 
            $this->load->view('templates/admin/footer');       
        }
        public function manage_cars(){
            $page = "cars";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                echo "<script>alert('You are not authorized!');window.location='".base_url()."admin';</script>";
            }
            
            $data['cars'] = $this->Rental_model->getAllCars();
            $data['cartype'] = $this->Rental_model->getAllCarType();
            $this->load->view('templates/admin/header');            
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);     
            $this->load->view('templates/admin/modal',$data); 
            $this->load->view('templates/admin/footer');       
        }
        public function save_car(){
            $save=$this->Rental_model->save_car();
            if($save){
                echo "<script>alert('Car Details successfully saved!');</script>";
            }else{
                echo "<script>alert('Unable to save car details!');</script>";
            }
                echo "<script>window.location='".base_url()."manage_cars';</script>";
        }
        public function delete_ca($id){
            $save=$this->Rental_model->delete_car($id);
            if($save){
                echo "<script>alert('Car Details successfully deleted!');</script>";
            }else{
                echo "<script>alert('Unable to delete car details!');</script>";
            }
                echo "<script>window.location='".base_url()."manage_cars';</script>";
        }
        public function manage_car_type(){
            $page = "car_type";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                echo "<script>alert('You are not authorized!');window.location='".base_url()."admin';</script>";
            }                        
            $data['cartype'] = $this->Rental_model->getAllCarType();
            $this->load->view('templates/admin/header');            
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);     
            $this->load->view('templates/admin/modal'); 
            $this->load->view('templates/admin/footer');       
        }
        public function save_car_type(){
            $save=$this->Rental_model->save_car_type();
            if($save){
                echo "<script>alert('Car Type successfully saved!');</script>";
            }else{
                echo "<script>alert('Unable to save car type!');</script>";
            }
                echo "<script>window.location='".base_url()."manage_car_type';</script>";
        }
        public function delete_car_type($id){
            $save=$this->Rental_model->delete_car_type($id);
            if($save){
                echo "<script>alert('Car Type successfully deleted!');</script>";
            }else{
                echo "<script>alert('Unable to delete car type!');</script>";
            }
                echo "<script>window.location='".base_url()."manage_car_type';</script>";
        }
        public function save_car_image(){
            $save=$this->Rental_model->save_car_image();
            if($save){
                echo "<script>alert('Car Image successfully saved!');</script>";
            }else{
                echo "<script>alert('Unable to save car Image!');</script>";
            }
                echo "<script>window.location='".base_url()."manage_cars';</script>";
        }
        public function view_car_image($id){
            $page="car_image";
            $data['image'] = $this->Rental_model->getCar($id);
            $this->load->view('pages/admin/'.$page,$data);
        }
        //=================================End of Admin Modules================================
    }
?>
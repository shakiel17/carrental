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
            if($this->session->user_login){
                redirect(base_url()."main");
            }
            $this->load->view('pages/'.$page);            
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
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."admin';</script>";
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
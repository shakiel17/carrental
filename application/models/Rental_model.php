 <?php   
    date_default_timezone_set('Asia/Manila');
    class Rental_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function admin_authentication(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM `admin` WHERE username='$username' AND password='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM users");
            return $result->result_array();
        }
        public function getAllBookings(){
            $result=$this->db->query("SELECT * FROM booking ORDER BY datearray ASC");
            return $result->result_array();
        }
        public function getAllCars(){
            $result=$this->db->query("SELECT c.*,ct.description as type_desc FROM cars c LEFT JOIN cartype ct ON ct.id=c.type ORDER BY c.`description` ASC");
            return $result->result_array();
        }
        public function getAllCarStatus($status){
            $result=$this->db->query("SELECT * FROM cars WHERE `status`='$status' ORDER BY `description` ASC");
            return $result->result_array();
        }
        public function getAllBookingStatus($status){
            $result=$this->db->query("SELECT * FROM booking WHERE `status`='$status' ORDER BY datearray ASC");
            return $result->result_array();
        }
        public function getRecentBookings(){
            $result=$this->db->query("SELECT c.*,b.id as bid,b.*,cr.description FROM booking b INNER JOIN customer c ON c.id=b.customer_id INNER JOIN cars cr ON cr.id=b.car_id ORDER BY b.datearray DESC LIMIT 10");
            return $result->result_array();
        }
        public function getAllCarType(){
            $result=$this->db->query("SELECT * FROM cartype ORDER BY `description` ASC");
            return $result->result_array();
        }
        public function save_car(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $type=$this->input->post('type');
            $fuel_type=$this->input->post('fuel_type');
            $trans_type=$this->input->post('trans_type');
            $amount=$this->input->post('amount');            
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO cars(`description`,`type`,`fuel_type`,`trans_type`,amount,datearray,timearray,`image`) VALUES('$description','$type','$fuel_type','$amount','$datearray','$timearray','')");
                }else{
                    $result=$this->db->query("UPDATE cars SET `description`='$description',`type`='$type',fuel_type='$fuel_type',trans_type='$trans_type',amount='$amount' WHERE id='$id'");
                }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_car($id){            
            $result=$this->db->query("DELETE FROM cars WHERE id='$id'");        
            if($result){                
                return true;
            }else{
                return false;
            }
        }
        public function save_car_type(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $check=$this->db->query("SELECT * FROM cartype WHERE description = '$description' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO cartype(`description`) VALUES('$description')");
                }else{
                    $result=$this->db->query("UPDATE cartype SET `description`='$description' WHERE id='$id'");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_car_type($id){
            $result=$this->db->query("DELETE FROM cartype WHERE id='$id'");        
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_car_image(){
            $id=$this->input->post('id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE cars SET `image`='$imgContent' WHERE id='$id'");            
            }else{
                return false;
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getCar($id){
            $result=$this->db->query("SELECT * FROM cars WHERE id='$id'");
            return $result->row_array();
        }
        public function getAllCarsByType(){
            $result=$this->db->query("SELECT c.*,ct.description as type_desc FROM cars c LEFT JOIN cartype ct ON ct.id=c.type GROUP BY c.`type` ORDER BY c.`description` ASC");
            return $result->result_array();
        }
        public function getCarsByType($type){
            $result=$this->db->query("SELECT c.*,ct.description as type_desc FROM cars c LEFT JOIN cartype ct ON ct.id=c.type WHERE c.type='$type' ORDER BY c.`description` ASC");
            return $result->result_array();
        }
        public function save_user(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $fullname=$firstname." ".$lastname;
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $facebook=$this->input->post('facebook');
            $v1=$_FILES["vid1"]["tmp_name"];
            $vid1=addslashes(file_get_contents($v1));
            $v2=$_FILES["vid2"]["tmp_name"];
            $vid2=addslashes(file_get_contents($v2));
            $padd=$_FILES["proof_address"]["tmp_name"];
            $paddress=addslashes(file_get_contents($padd));
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            $checkuser=$this->db->query("SELECT * FROM users WHERE username='$username'");
            if($checkuser->num_rows() > 0){
                return false;
            }else{
                $result=$this->db->query("INSERT INTO customer(lastname,firstname,middlename,`address`,contactno,email,facebook,valid_id_1,valid_id_2,proof_of_address,datearray,timearray) VALUES('$lastname','$firstname','$middlename','$address','$contactno','$email','$facebook','$vid1','$vid2','$paddress','$datearray','$timearray')");
            }
            if($result){
                $this->db->query("INSERT INTO users(username,`password`,fullname,datearray,timearray) VALUES('$username','$password','$fullname','$datearray','$timearray')");
                return true;
            }else{
                return false;
            }
        }
        public function user_authentication(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM users WHERE username='$username' AND `password`='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getSingleCar($id){
            $result=$this->db->query("SELECT c.*,ct.description as car_type FROM cars c INNER JOIN cartype ct ON ct.id=c.type WHERE c.id='$id'");
            return $result->row_array();
        }
        public function getSingleCarReview($id){
            $result=$this->db->query("SELECT * FROM reviews WHERE car_id='$id'");
            return $result->result_array();
        }
    }
?>
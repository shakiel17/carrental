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
            $amount=$this->input->post('amount');            
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO cars(`description`,`type`,`fuel_type`,amount,datearray,timearray,`image`) VALUES('$description','$type','$fuel_type','$amount','$datearray','$timearray','')");
                }else{
                    $result=$this->db->query("UPDATE cars SET `description`='$description',`type`='$type',fuel_type='$fuel_type',amount='$amount' WHERE id='$id'");
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
    }
?>
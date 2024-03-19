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
            $result=$this->db->query("SELECT * FROM cars ORDER BY `description` ASC");
            return $result->result_array();
        }
    }
?>
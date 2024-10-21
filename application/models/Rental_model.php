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
            $result=$this->db->query("SELECT c.*,b.id as bid,b.*,cr.description FROM booking b INNER JOIN customer c ON c.username=b.customer_id INNER JOIN cars cr ON cr.id=b.car_id ORDER BY b.datearray DESC LIMIT 10");
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
                    $result=$this->db->query("INSERT INTO cars(`description`,`type`,`fuel_type`,`trans_type`,amount,datearray,timearray,`image`) VALUES('$description','$type','$fuel_type','$trans_type','$amount','$datearray','$timearray','')");
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
                $result=$this->db->query("INSERT INTO customer(lastname,firstname,middlename,`address`,contactno,email,facebook,valid_id_1,valid_id_2,proof_of_address,datearray,timearray,username) VALUES('$lastname','$firstname','$middlename','$address','$contactno','$email','$facebook','$vid1','$vid2','$paddress','$datearray','$timearray','$username')");
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
        public function getAllUserBooking($username){
            $result=$this->db->query("SELECT * FROM booking WHERE customer_id='$username' ORDER BY datearray DESC");
            return $result->result_array();
        }
        public function getSingleUserCarReview($id,$username){
            $result=$this->db->query("SELECT * FROM reviews WHERE car_id='$id' AND customer_id='$username'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function book_save(){
            $id=$this->input->post('car_id');
            $username=$this->input->post('username');
            $date_start=$this->input->post('date_start');
            $time_start=$this->input->post('time_start');
            $date_return=$this->input->post('date_return');
            $time_return=$this->input->post('time_return');
            $destination=$this->input->post('destination');
            $mode=$this->input->post('payment');
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            $result=$this->db->query("INSERT INTO booking(customer_id,car_id,date_started,time_started,date_return,time_return,destination,datearray,timearray,payment_type) VALUES('$username','$id','$date_start','$time_start','$date_return','$time_return','$destination','$datearray','$timearray','$mode')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSingleUser($username){
            $result=$this->db->query("SELECT * FROM users WHERE username='$username'");
            return $result->row_array();
        }
        public function getUserEmail($id){
            $result=$this->db->query("SELECT c.email FROM customer c INNER JOIN booking b ON b.customer_id=c.username WHERE b.id='$id'");
            return $result->row_array();
        }
        public function getUserEmailAdd($username){
            $result=$this->db->query("SELECT * FROM customer WHERE username='$username'");
            return $result->row_array();
        }
        public function cancel_booking($id){
            $result=$this->db->query("UPDATE booking SET `status`='cancel' WHERE id='$id'");
            if($result){
                return  true;
            }else{
                return false;
            }
        }
        public function upload_pop_save(){
            $id=$this->input->post('id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE booking SET `proof_of_payment`='$imgContent' WHERE id='$id'");            
            }else{
                return false;
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getProofPayment($id){
            $result=$this->db->query("SELECT * FROM booking WHERE id='$id'");
            return $result->row_array();
        }
        public function remove_pop($id){
            $result=$this->db->query("UPDATE booking SET proof_of_payment='' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function confirm_booking($id){
            $result=$this->db->query("UPDATE booking SET `status`='booked' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function complete_booking($id){
            $result=$this->db->query("UPDATE booking SET `status`='completed' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function check_availability($car,$startdate,$enddate){
            $result=$this->db->query("SELECT * FROM booking WHERE car_id='$car' AND (date_started BETWEEN '$startdate' AND '$enddate' OR date_return BETWEEN '$startdate' AND '$enddate') AND `status`='booked'");
            if($result->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
        public function save_review(){
            $id=$this->input->post('id');
            $details=$this->input->post('details');
            $rating=$this->input->post('rating');
            $username=$this->session->username;
            $fullname=$this->session->fullname;
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO reviews(car_id,customer_id,fullname,star_rate,details,datearray,timearray) VALUES('$id','$username','$fullname','$rating','$details','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_agreement(){
            $book_id=$this->input->post('book_id');
            $date_rented=$this->input->post('date_rented');
            $date_return=$this->input->post('date_return');
            $time_rented=$this->input->post('time_rented');
            $time_return=$this->input->post('time_return');
            $signedday=$this->input->post('signedday');
            $signedmonth=date('m',strtotime($this->input->post('signedmonth')));
            $signedyear=$this->input->post('signedyear');
            $renter=$this->input->post('renter');
            $contactno=$this->input->post('contactno');
            $address=$this->input->post('address');
            $vehicle=$this->input->post('vehicle');
            $odometer=$this->input->post('odometer');
            $fuel=$this->input->post('fuel');
            $plateno=$this->input->post('plateno');
            $destination=$this->input->post('destination');
            $rate=$this->input->post('rate');
            $payment_terms=$this->input->post('payment_terms');
            $washing=$this->input->post('washing');
            $tendered=$this->input->post('tendered');
            $datearray=$signedyear."-".$signedmonth."-".$signedday;
            $plateno=$this->input->post('plateno');
            $check=$this->db->query("SELECT * FROM agreement WHERE book_id='$book_id'");
            if($check->num_rows() > 0){
                $result=$this->db->query("UPDATE agreement SET datearray='$datearray',rented_by='$renter',contactno='$contactno',`address`='$address',car_id='$vehicle',odometer='$odometer',fuel_type='$fuel',destination='$destination',rate='$rate',payment_terms='$payment_terms',washing='$washing',totalamount='$tendered',date_rented='$date_rented',time_rented='$time_rented',date_return='$date_return',time_return='$time_return',plateno='$plateno' WHERE book_id='$book_id'");
            }else{
                $result=$this->db->query("INSERT INTO agreement(datearray,rented_by,contactno,`address`,car_id,odometer,fuel_type,destination,rate,payment_terms,washing,totalamount,date_rented,time_rented,date_return,time_return,book_id,plateno) VALUES('$datearray','$renter','$contactno','$address','$vehicle','$odometer','$fuel','$destination','$rate','$payment_terms','$washing','$tendered','$date_rented','$time_rented','$date_return','$time_return','$book_id','$plateno')");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_profile(){
            $id=$this->input->post('id');
            $oldusername=$this->input->post('oldusername');
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
            $check=$this->db->query("SELECT * FROM customer WHERE username='$username' AND id <> '$id'");
            if($check->num_rows() > 0){
                return false;
            }else{
                $result=$this->db->query("UPDATE customer SET lastname='$lastname',firstname='$firstname',middlename='$middlename',`address`='$address',contactno='$contactno',email='$email',facebook='$facebook',username='$username' WHERE id='$id'");                
            }
            if($result){
                $this->db->query("UPDATE users SET username='$username',`password`='$password' WHERE username='$oldusername'");
                return true;
            }else{
                return false;
            }
        }

        public function save_signature(){
            $id=$this->input->post('id');
            $fileName=$this->input->post('file');             
            $filetype=explode(';base64,',$fileName);
            $filetype_aux=explode('image/',$filetype[0]);
            //$fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($filetype_aux[1], PATHINFO_EXTENSION);            
            //$allowTypes = array('jpg','png','jpeg','gif');
            //if(in_array($fileType,$allowTypes)){
                //$image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($fileName));
                $result=$this->db->query("UPDATE agreement SET `signature`='$imgContent' WHERE book_id='$id'");            
            // }else{
            //     return false;
            // }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getUserChat(){
            $username=$this->session->username;
            $odb=$this->load->database('livechat',TRUE);
            $result=$odb->query("SELECT * FROM chat WHERE (sender='$username' AND receiver='admin') OR (receiver='$username' AND sender='admin') ORDER BY datearray ASC,timearray ASC");
            return $result->result_array();
        }
        public function save_chat($sender,$receiver,$message){
            $odb=$this->load->database('livechat',TRUE);
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $odb->query("INSERT INTO chat(sender,receiver,`message`,`status`,datearray,timearray) VALUES('$sender','$receiver','$message','pending','$date','$time')");
            return true;        
        }
        public function getAllPendingAdminChat(){
            $odb=$this->load->database('livechat',TRUE);
            $result=$odb->query("SELECT * FROM chat WHERE receiver='admin' AND `status`='pending' GROUP BY sender");
            return $result->result_array();
        }
        public function getAllAdminChat(){
            $odb=$this->load->database('livechat',TRUE);
            $result=$odb->query("SELECT * FROM chat WHERE receiver='admin' GROUP BY sender");
            return $result->result_array();
        }
        public function getSingleUserChat($username){            
            $odb=$this->load->database('livechat',TRUE);
            $result=$odb->query("SELECT * FROM chat WHERE sender='$username' OR receiver='$username' ORDER BY datearray ASC,timearray ASC");
            return $result->result_array();
        }
        public function updateChatStatus($receiver){
            $odb=$this->load->database('livechat',TRUE);
            $odb->query("UPDATE chat SET `status`='seen' WHERE sender='$receiver'");
            return true;
        }
        public function updateChatStatusUser($receiver){
            $odb=$this->load->database('livechat',TRUE);
            $odb->query("UPDATE chat SET `status`='seen' WHERE receiver='$receiver'");
            return true;
        }
        public function getPendingChat($username){
            $odb=$this->load->database('livechat',TRUE);
            $result=$odb->query("SELECT * FROM chat WHERE receiver='$username' AND `status`='pending' GROUP BY `message`");
            return $result->result_array();
        }
    }
?>
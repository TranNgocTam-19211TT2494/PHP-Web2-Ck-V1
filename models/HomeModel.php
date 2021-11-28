<?php
require_once 'BaseModel.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class HomeModel extends BaseModel {
    protected static $_instance;
    //   ------------ User ---------------//
      //Login
      public function login($username, $password)
      {
          $md5Password = md5($password);
          $sql = 'SELECT * FROM users WHERE username = "' . $username . '" AND password = "' . $md5Password . '"';
  
          $user = $this->select($sql);
          return $user;
      }
    //   Register:
    public function insertUserDecorator($input,$zipcode)
    {
        $allUser = $this->getAllUser();
        foreach ($allUser as  $value) {
           if($input['email'] == $value['email']){
               return false;
           }
        }
        $sql = "INSERT INTO `users`(`username`, `email`, `password`,`otp`,`permission`) 
        VALUES ('" . $input['username'] . "','" . $input['email'] . "','" . md5($input['password']) . "','". $input['otp'] . "','" . 'User' . "')";
        $user = $this->insert($sql);

        $lastUserId = $this->lastUserId();
       
        $data = [
            'zipcode' =>$this->getToken(8),
            'user_id' => $lastUserId
        ];
        $sql1 = "INSERT INTO `zipcode`(`zipcode`, `user_id`) 
        VALUES ('" . $data['zipcode'] . "','" . $data['user_id'] . "')";
        $zipcode = $this->insert($sql1);

        return $user;
    }
    public function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }
    public function getAllUser()
    {
        $sql = 'SELECT * FROM users';
        $users = $this->select($sql);
        return $users;
    }
    public function lastUserId()
    {
        $sql = "SELECT MAX(id) FROM users";
        $id = $this->select($sql);
        return $id[0]['MAX(id)'];
    }
    
      //Forget Password
      public function checkMail($email)
      {
        $sql = 'SELECT * FROM users WHERE email = "' . $email . '"';
        $user = $this->select($sql);
        return $user;
      }
      //Update password cho user: 
      public function UpdatePassword($password , $email) 
      {
        $sql = 'UPDATE users SET 
        password = "' . md5($password) . '"
        WHERE email = "' . $email. '" ';
        $user = $this->update($sql);
        return $user;
      }
      //Send mail password cho nguoi dung:
      public function sendMail($email , $password)
      {
        $mail = new PHPMailer(true);//true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'phantinh1209@gmail.com'; // SMTP username
            $mail->Password = 'zexpotcxbxkuspaq';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('phantinh1209@gmail.com', 'AnhTam' ); 
            $mail->addAddress($email);
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Thư gửi lại mật khẩu';
            $noidungthu = "<p>Bạn nhận được mail này, do bạn hoặc ai đó yêu cầu mật khẩu mới cho website...</p>
                                Mật khẩu mới của bạn là {$password}
            "; 
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            echo "Đã gửi mail xong";
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
        }
      
            
      }
      public function getid(){
        $sql = 'SELECT * FROM users ORDER BY ID DESC LIMIT 1';
        $protypes = $this->select($sql);
        return $protypes;
      }
      public function getOtp(){
        $sql1 = 'SELECT * FROM users ORDER BY ID DESC LIMIT 1';
        $userid = $this->select($sql1);
        // var_dump($userid[0]['id']).die();
        $sql = 'SELECT otp FROM users WHERE id = '. $userid[0]['id'];
        $protypes = $this->select($sql);
        return $protypes;
      }
      public function getOtpAsAction(){
        $sql1 = 'SELECT * FROM users ORDER BY ID DESC LIMIT 1';
        $userid = $this->select($sql1);
        // var_dump($userid[0]['id']).die();
        $sql = 'UPDATE `users` SET `action`= 1 WHERE id = '. $userid[0]['id'];
        $protypes = $this->update($sql);
        return $protypes;
      }
      //Google
  
      //Forget password
    //   ---------------------- Protype ---------------- //
    public function getProtype()
    {
        $sql = 'SELECT * FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getByIdProtype()
    {
        $sql = 'SELECT type_id FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getprotypeOnProduct($typeid){
        $protypes = 'SELECT type_id FROM protypes';
        $protype = $this->select($protypes);
        $proty = null;
        foreach($protype as $idproty){
            $md5 = md5($idproty['type_id'] . 'chuyen-de-web-2');
            if($md5 == $typeid){
                $sql = 'SELECT * FROM `protypes`,products WHERE protypes.type_id = products.type_id AND protypes.type_id = '.$idproty['type_id'] .' ORDER BY products.id DESC';
            $proty = $this->select($sql);
            }
        }
        return $proty;
    }

    public function getProducts()
    {
        $sort ='';
        if(isset($_GET['sort'])){
            if($_GET['sort']=='desc'){
                $sort = 'DESC';
            }
            elseif($_GET['sort'] == 'asc'){
                $sort = 'ASC';
            }
           
        }

        $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY products.price ' . $sort;
        $products = $this->select($sql);
        return $products;
    }
    public function getWhishlist()
    {
        $sql = 'SELECT * FROM `whishlist` ORDER BY `id` DESC;';
        $whishlist = $this->select($sql);
        return $whishlist;
    }
    public function getWhishlistExist($userid,$pro_id)
    {
        $sql = "SELECT * FROM `whishlist` WHERE `user_id` = $userid and `pro_id` = $pro_id";
        $whishlist = $this->select($sql);
        return $whishlist;
    }
    public function getWhishlistByUserID($userid)
    {
        $sql = "SELECT whishlist.id as whishlistId,products.pro_image,products.name,products.price 
        FROM `whishlist`,products 
        WHERE whishlist.pro_id = products.id 
        AND whishlist.user_id = $userid ORDER BY `whishlist`.`id` DESC";
        $whishlist = $this->select($sql);
        return $whishlist;
    }
    public function insertWhishList($id,$userId)
    {
        $allProduct = $this->getProducts();
        foreach ($allProduct as $value) {
           if(md5($value['id'].'chuyen-de-web-2') == $id){
            $sql = "INSERT INTO `webbanhkem`.`whishlist` (`user_id` ,`pro_id`) VALUES (" .
            "'" . $userId
            . "','" . $value['id'] . "')";
            $allWhishlist = $this->getWhishlistExist($userId,$value['id']);
            if(empty($allWhishlist)){
                $products = $this->insert($sql);
                return $products;
            }else{
                return 2;
            }
           }
        }
    }
    public function deleteWhishList($id)
    {
        $allWhishlist = $this->getWhishlist();
        foreach ($allWhishlist as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                $sql = "DELETE FROM whishlist WHERE id =  " . $value['id'] ;
                $whishlist = $this->delete($sql);
                return $whishlist;
             }
        }
      return false;
    }
    // --------------------- Manufacture ------------------ //
    // Hien thi data bang manufactures:
    public function getManufactures()
    {
        $sql = "SELECT * FROM manufactures";
        $manufactures = $this->select($sql);
        return $manufactures;
    }
    // Hien thi san pham theo danh 
    public function getManufactureById($id)
    {
        $manufacture = 'SELECT manu_id FROM manufactures';
        $manufactures = $this->select($manufacture);
        $manu = null;
        foreach($manufactures as $manufac){
            $md5 = md5($manufac['manu_id'] . 'chuyen-de-web-2');
            if($md5 == $id){
                $sql = 'SELECT * FROM `products` , manufactures WHERE products.manu_id = manufactures.manu_id AND products.manu_id =  '.$manufac['manu_id'].' ';
            $manu = $this->select($sql);
            }
        }
        
      
        return $manu;
    }
    // Dem so san pham theo danh muc:
    public function countProductWithManufacture($id)
    {
        $sql = 'SELECT * FROM `products` WHERE products.manu_id = '.$id;
        $manufactures = $this->select($sql);
        return $manufactures;
    }
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
    public function searchProduct($search)
    {
        $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%' ORDER BY id DESC;";
        $searchResult = $this->select($sql);
        return $searchResult;
    }
    //hàm đếm kết quả trả về
    public function num_result($search)
    {
        return count($this->searchProduct($search));
    }
    // Hàm tìm kiếm theo tên của category(manufacture)
    public function searchCategories($search)
    {
        $sql = "SELECT * FROM products,manufactures WHERE products.manu_id=manufactures.manu_id AND manufactures.manu_name like '%$search%' ORDER BY products.id DESC;";
        $searchResult = $this->select($sql);
        return $searchResult;
    }
}
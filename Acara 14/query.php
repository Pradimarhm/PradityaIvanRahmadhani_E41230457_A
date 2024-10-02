<?php
class crud extends koneksi {
    public function lihatData(){
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;

    }

    public function InsertData($email,$pass,$name){
        try{
            $sql = "INSERT INTO user_detail(user_email, user_password, user_fullname, level) VALUES(:email, :pass, :name, 2)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function loginn($email,$pass){
        try{
            $query = "SELECT * FROM user_detail WHERE user_email = '$email' ";
            $result = $this->koneksi->prepare($query);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $userVal = $row['user_email'];
                $passVal = $row['user_password'];
                $userName = $row['user_fullname'];
                if ($userVal==$email && $passVal==$pass){
                    header('location home.php');
                    exit();
                }else{
                    $error = 'user atau password salah';
                    header('location: login.php'.urlencode($error));
                    exit();
                }

            }else{
                $error = 'user tidak ditemukan';
                header('location: login.php'.urlencode($error));
                exit();
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
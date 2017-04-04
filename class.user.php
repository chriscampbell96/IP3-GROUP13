<?php


require_once 'config.php';

class USER
{

 private $conn;

 public function __construct()
 {
  $database = new Database();
  $db = $database->dbConnection();
  $this->conn = $db;
    }

 public function runQuery($sql)
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }

 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }

 public function register($fname,$lname,$uname,$email,$upass)
 {
  try
  {
    $password = sha1($upass);
    $stmt = $this->conn->prepare("INSERT INTO tbl_users(userFirstName,userSurname,userName,userEmail,userPass)
                                                 VALUES(:user_firstname, :user_surname, :user_name, :user_mail, :user_pass)");

    $stmt->bindparam(":user_firstname",$fname);
    $stmt->bindparam(":user_surname",$lname);
    $stmt->bindparam(":user_name",$uname);
    $stmt->bindparam(":user_mail",$email);
    $stmt->bindparam(":user_pass",$password);
    $stmt->execute();
    return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }

 public function login($email,$upass)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userEmail=:email_id");
   $stmt->execute(array(":email_id"=>$email));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

   if($stmt->rowCount() == 1)
   {
    if($userRow['userStatus']=="Y")
    {
     if($userRow['userPass']==sha1($upass))
     {
      $_SESSION['userSession'] = $userRow['userID'];
      $_SESSION['userEmail'] = $userRow['userEmail'];
      $_SESSION['userRole'] = $userRow['userRole'];
      $_SESSION['userFirstName'] = $userRow['userFirstName'];
      $_SESSION['userSurname'] = $userRow['userSurname'];
      $_SESSION['userName'] = $userRow['userName'];
      $_SESSION['userPass'] = $userRow['userPass'];


      return true;
     }
     else
     {
      header("Location: login.php?error");
      exit;
     }
    }
    else
    {
     header("Location: login.php?inactive");
     exit;
    }
   }
   else
   {
    header("Location: login.php?error");
    exit;
   }
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }



 public function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }


public function create_doc($docTitle,$docDesc,$file,$file_type,$new_size,$userID){
   try
   {
     $stmt = $this->conn->prepare("INSERT INTO tbl_documents(docTitle,docDesc,docFile,docType,docSize,userID)
                                                  VALUES(:document_title, :document_desctiption, :doc_file, :doc_Type, :doc_Size, :userUpload)");

     $stmt->bindparam(":document_title",$docTitle);
     $stmt->bindparam(":document_desctiption",$docDesc);
     $stmt->bindparam("doc_file",$file);
     $stmt->bindparam("doc_Type",$file_type);
     $stmt->bindparam("doc_Size",$new_size);
     $stmt->bindparam(":userUpload",$userID);
     $stmt->execute();
     return $stmt;
   }
   catch(PDOException $ex)
   {
    echo $ex->getMessage();
   }

 }

 public function create_rev($revTitle,$revDesc,$file,$file_type,$new_size,$docID,$userID){
    try
    {
      $stmt = $this->conn->prepare("INSERT INTO tbl_revisions(revTitle,revDesc,revFile,revType,revSize,docID,userID)
                                                   VALUES(:rev_title, :rev_desctiption, :rev_file, :rev_Type, :rev_Size, :docRevised, :userUpload)");

      $stmt->bindparam(":rev_title",$revTitle);
      $stmt->bindparam(":rev_desctiption",$revDesc);
      $stmt->bindparam("rev_file",$file);
      $stmt->bindparam("rev_Type",$file_type);
      $stmt->bindparam("rev_Size",$new_size);
      $stmt->bindparam(":docRevised",$docID);
      $stmt->bindparam(":userUpload",$userID);
      $stmt->execute();
      return $stmt;
    }
    catch(PDOException $ex)
    {
     echo $ex->getMessage();
    }

  }

 public function delete_doc($docID, $id){

       $stmt = $this->conn->prepare("INSERT INTO tbl_documentsdel
         SELECT * FROM tbl_documents WHERE docID=$id");

    $stmt = $this->conn->prepare("DELETE FROM tbl_documents WHERE docID=:id");
    $stmt->bindparam(":id",$id);
    $stmt->execute();
    return $stmt;
  }


//UPDATE `tbl_users` SET `userStatus` = 'N' WHERE `tbl_users`.`userID` = 17;

  public function activate_user($userStatus)
  {
   try
   {
    $stmt=$this->conn->prepare("UPDATE tbl_users SET userStatus= 'Y'
              WHERE userID=:id ");
    $stmt->bindparam("userStatus",$userStatus);
    $stmt->bindparam(":id",$id);
    $stmt->execute();

    return true;
   }
   catch(PDOException $e)
   {
    echo $e->getMessage();
    return false;
   }
  }


 public function redirect($url)
 {
  header("Location: $url");
 }

 public function logout()
 {
  session_destroy();
  $_SESSION['userSession'] = false;
 }

 public function getID($id)
 {
  $stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userID=:id");
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }

 public function update($id,$fname,$lname,$uname,$email)
 {
  try
  {
   $stmt=$this->conn->prepare("UPDATE tbl_users SET userFirstName=:fname,
                                                 userSurname=:lname,
                                                 userName=:uname,
                                                userEmail=:email
             WHERE userID=:id ");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":uname",$uname);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":id",$id);
   $stmt->execute();

   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
  }
 }

 public function getdID($id)
 {
  $stmt = $this->conn->prepare("SELECT * FROM tbl_documents WHERE docID=:id");
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }


 public function updateDoc($id,$dname,$ddesc)
 {
  try
  {
   $stmt=$this->conn->prepare("UPDATE tbl_documents SET docTitle=:dname,
                                                 docDesc=:ddesc
             WHERE docID=:id ");
   $stmt->bindparam(":dname",$dname);
   $stmt->bindparam(":ddesc",$ddesc);
   $stmt->bindparam(":id",$id);
   $stmt->execute();

   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
  }
 }

 public function updatepass($id,$upass)
{
 try
 {
   $password = sha1($upass);
  $stmt=$this->conn->prepare("UPDATE tbl_users SET userPass=:upass
                  WHERE userID=:id ");
  $stmt->bindparam(":upass",$password);
  $stmt->bindparam(":id",$id);
  $stmt->execute();

  return true;
 }
 catch(PDOException $e)
 {
  echo $e->getMessage();
  return false;
 }
}



// function send_mail($email,$message,$subject)
 //{
//  require_once('mailer/class.phpmailer.php');
//  $mail = new PHPMailer();
  //$mail->IsSMTP();
  //$mail->SMTPDebug  = 0;
  //$mail->SMTPAuth   = true;
  //$mail->SMTPSecure = "ssl";
  //$mail->Host       = "smtp.gmail.com";
  //$mail->Port       = 465;
  //$mail->AddAddress($email);
  //$mail->Username="yourgmailid@gmail.com";
  //$mail->Password="yourgmailpassword";
  //$mail->SetFrom('you@yourdomain.com','Coding Cage');
  //$mail->AddReplyTo("you@yourdomain.com","Coding Cage");
  //$mail->Subject    = $subject;
  //$mail->MsgHTML($message);
  //$mail->Send();

 //}
}

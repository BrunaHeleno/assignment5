<?php
if(isset($_POST['email'])) {
 
    // Email is been sent to:
    $email_to = "bgheleno@gmail.com";
    $email_subject = "Contact from Gloomhaven Website";
 
    function died($error) {
        // message error
        echo "Sorry, there's something wrong, please try it again";
        echo "This error is caused by <br /><br />";
        echo $error."<br /><br />";
        echo "Please, return to the last page or send an email to bgheleno@gmail.com or rafiq.ms.abudulai@gmail.com<br /><br />";
        die();
    }
 
    // checking information
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['cel']) ||
        !isset($_POST['whats']) ||
        !isset($_POST['note'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $cellphone = $_POST['cel']; //  required
    $whats = $_POST['whats']; // not required
    $comments = $_POST['note']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$cellphone)) {
    $error_message .= 'The Contact Number you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Cellphone: ".clean_string($cellphone)."\n";
    $email_message .= "Whats: ".clean_string($whats)."\n";
    $email_message .= "Message: ".clean_string($comments)."\n";
 

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

?>
 
<!-- Form submited successufuly -->

<head>
    <title> Gloomhaven </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> <!--user screen size -->
    <link rel="icon" type="image/x-icon" href="../resources/images/beast.ico"> <!--icon tab-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icons contact-->
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
   <nav class="navbar">
        <div id="subnav">
            <a href="../index.html"> Home </a>
        </div>
        <div id="subnav">
            <a href="../pages/about.html"> About </a>
        </div>
        <div class="dropdown">
            <button class="dropBtn"> How To Play
            </button>
            <div class="dropContent">
                  <a href="../pages/characters.html"> Characters </a>
                  <a href="../pages/map.html"> Map </a>
                  <a href="../pages/monsters.html"> Monsters </a>
                  <a href="../pages/rewards.html"> Rewards </a>
            </div>
        </div>
        <div id="subnav">
            <a href="../pages/developers.html"> Developers </a>
        </div>
        <div id="subnav">
            <a href="../pages/contact.html"> Contact </a>
        </div>
    </nav>
    
    <div id="formSubmit">
        <img src="../resources/images/formSubmit.png">
    </div>
    <footer><small> Developed by <br> Bruna Heleno <br> Rafiq Abudulai </small></footer>
</body>
 

 
<?php
 
}
?>

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "regionpoltava.ua.com";
    $email_subject = "📧 Нове повідомлення з сайту ";
 
    function died($error) {
        // your error code can go here
        echo "Вибачте потрібно зробити виправлення ";
        echo "Було виявлено наступні помилки:\n \n";
        echo $error."<br /><br />";
        echo "Будь-ласка виправти помилки та повторіть знову.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['email']) ||
        {
        died('Вибачте, але виникла помилка під час відправлення вашої форми. Спробуйте ще раз.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $phone = $_POST['phone']; // required
    $email_from = $_POST['email']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Вибачте, але Ви ввели невірний формат пошти. <br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Воу... Ви не ввели імя <br />';
  }
 
  if (strlen($phone) < 10) {
    echo "Упс... Ви ввели невірний номер телефону \n";
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details be.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "ПІБ: ".clean_string($name)."\n";
    $email_message .= "Електропошта: ".clean_string($email_from)."\n";
    $email_message .= "Телефон: ".clean_string($telephone)."\n";
    
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>
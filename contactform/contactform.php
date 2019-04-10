<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "regionpoltava.ua.com";
    $email_subject = "📨 Нове повідомлення з сайту 🌐 реєстрація громадських організацій 🌐";
 
    function died($error) {
        // your error code can go here
        echo "Вибачте потрібно зробити виправлення ";
        echo "Було виявлено наступні помилки:<br /><br />";
        echo $error."<br /><br />";
        echo "Будь-ласка виправти помилки та повторіть знову.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['email']))
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
    $error_message .= "Воу... Ви не ввели ім'я \n";
  }
 
  if (strlen($phone) < 10) {
    echo "Упс... Ви ввели невірний номер телефону \n";
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Ви отримали замовлення на реєстрацію громадської організації. Деталі нижче \n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "ПІБ: ".clean_string($name)."\n";
    $email_message .= "Електропошта: ".clean_string($email_from)."\n";
    $email_message .= "Телефон: ".clean_string($phone)."\n";
    
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> ☺️ Дякуємо за Ваше звернення. Наші спеціалісти вже споспішають до Вас 🏃‍♀️</title>
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  </head>

<body>
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro-thx-message" class="clearfix">
    <div class="container">
      <div class="intro-info">
        <h1>Дякуємо за Ваше звернення <br><span>Вже зв'язуємося</span><br>Якщо, ше ні, то <a href="#" class="drift-open-chat">ось..</a></h1>
        <div>
          
          <a href="/" class="btn-services scrollto" aria-haspopup="true" aria-expanded="false">Головна</a>
          
        </div>
      </div>

    </div>
  </section><!-- #intro-thx-message -->
  <script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('3wpkdnvzdeym');
</script>
<!-- End of Async Drift Code -->
<!-- place this script tag after the Drift embed tag -->
<script>
  (function() {
    /* Add this class to any elements you want to use to open Drift.
     *
     * Examples:
     * - <a class="drift-open-chat">Questions? We're here to help!</a>
     * - <button class="drift-open-chat">Chat now!</button>
     *
     * You can have any additional classes on those elements that you
     * would ilke.
     */
    var DRIFT_CHAT_SELECTOR = '.drift-open-chat'
    /* http://youmightnotneedjquery.com/#ready */
    function ready(fn) {
      if (document.readyState != 'loading') {
        fn();
      } else if (document.addEventListener) {
        document.addEventListener('DOMContentLoaded', fn);
      } else {
        document.attachEvent('onreadystatechange', function() {
          if (document.readyState != 'loading')
            fn();
        });
      }
    }
    /* http://youmightnotneedjquery.com/#each */
    function forEachElement(selector, fn) {
      var elements = document.querySelectorAll(selector);
      for (var i = 0; i < elements.length; i++)
        fn(elements[i], i);
    }
    function openSidebar(driftApi, event) {
      event.preventDefault();
      driftApi.sidebar.open();
      return false;
    }
    ready(function() {
      drift.on('ready', function(api) {
        var handleClick = openSidebar.bind(this, api)
        forEachElement(DRIFT_CHAT_SELECTOR, function(el) {
          el.addEventListener('click', handleClick);
        });
      });
    });
  })();
</script>
</body>
</html>
    <?php

}
?>
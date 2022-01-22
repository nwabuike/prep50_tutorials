<?php

require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

 $firstname = $_POST['firstname']; // form field
 $lastname = $_POST['lastname']; // form field
 $phone = $_POST['phone']; // form field
 //$phone2 = $_POST['phone2']; // form field
 $quantity = $_POST['quantity']; // form field
 $email = $_POST['email']; // form field
 //$home = $_POST['address']; // form field
 
 if ($_POST['submit']){



 $from = "sales@centreforinternationaljustice.com	"; //enter your email address
 $to = "onwudiwevictorbenji@gmail.com"; //enter the email address of the contact your sending to
 $subject = "Contact Form"; // subject of your email

$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);

$text = ''; // text versions of email.
$html = "<html><body>First Name: $firstname <br> Last Name: $lastname <br> Phone Number: $phone <br> Quantity: $quantity <br> Email: $email <br> </body></html>"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
$mime->setTXTBody($text);
$mime->setHTMLBody($html);

//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

 $host = "localhost"; // all scripts must use localhost
 $username = "sales@centreforinternationaljustice.com"	; //  your email address (same as webmail username)
 $password = "&qemSbtzP?fl"; // your password (same as webmail password)

$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
'username' => $username,'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
}
else {
echo("<p>Message successfully sent!</p>");
// header("Location: http://www.example.com/");
}
  }
 ?>
<section class="cta-form cta-dark section-spacing" id="cta-form">
  <div class="container">
    <header class="section-header text-center">
      <h2>Fill this form to place your Order</h2>
    </header>
    <div class="row">
      <div class="col-sm-8 col-md-5 center-block">
         
 <form action="" method="post" form id="cta-signup-form" class="cta-signup-form">
          <div class="form-group">
            <input type="text" class="form-control input-lg" name="firstname" placeholder="First name" required>
            <label for="input-name"><span class="required">*</span>First name</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-control input-lg" name="lastname" placeholder="Last name" required>
            <label for="input-name"><span class="required">*</span>Last name</label>
          </div>
          <div class="form-group">
            <input type="email" class="form-control input-lg" name="email" placeholder="Email address" required>
            <label for="input-email"><span class="required">*</span>Details will be sent to this email</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-control input-lg" name="phone" placeholder="Phone Number" required>
            <label for="input-email"><span class="required">*</span>Input your phone number</label>
          </div>
           <div class="form-group">
           <select cars="quantity"class="form-control input-lg" name="quantity">
                <option value="(Discount) 2 months @ N25,000" selected> (Discount) 2 months @ N25,000</option>
                <option value="1 Month @ N20,000">1 Month @ N20,000</option>
                <option value="2 Month @ N40,000">2 Month @ N40,000</option>
            </select>
                <label for="input-name"><span class="required">*</span>N25,000 Huge 37.5% discount (Recommended) or 20k each month</label>
          </div>
          
<div class="form-btn">
<button class="btn" input type="submit" value="Send" name='submit'>ORDER NOW</button>
</div>
</table>
</form>
      </div>
    </div>

 </div>
</section>


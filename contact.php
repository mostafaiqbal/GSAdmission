<?php include "includes/nav.php"; ?>
<div class="container-fluid" id="contact"> 
<?php

$error = ""; $successMessage = "";
if ($_POST) {
    if (!$_POST["subject"]) {
        $error .= "Please enter your name.<br>";
    }
    if (!$_POST["phone"]) {
        $error .= "Please enter your phone number.<br>";
    }
    if (!$_POST["content"]) {
        $error .= "Please enter your message.<br>";
    }
   if ($error != "") {
        $error = '<div class="alert alert-danger" role="alert"><p>Please enter missing detai(s):  </p>' . $error . '</div>';
    } else {
        $emailTo = "info@gsadmission.com";
        $subject = "Message from Customer";
        $content .= "Name: " . $_POST['subject']."\n"."\n";
        $content .= "Phone Number: " . $_POST['phone']."\n"."\n";
        $content .= "Email Address: " . $_POST['email']."\n"."\n";
        $content .= "Booking Reference: " . $_POST['ref']."\n"."\n";
        $content .= "Customer Message: " .$_POST['content'];
        $headers = "From: ".$_POST['email'];
        if (mail($emailTo, $subject, $content, $headers)) {
            $successMessage = '<div class="alert alert-success" role="alert">Thank you for contacting us. One of our customer service agent will contact you ASAP!</div>';
        } else {
            
            $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';     
        } 
    }   
}

?>
<!-- Contact Form Start Here -->
<div id="contactEmpty"></div>
<div class="container-fluid" id="contactBg"> </div>
<div class="container" id = "contactDetails" >
    <div class="row">
        <div class="col-sm-3"> </div>
            <div class="col-sm-7">
                <h1 id="contacth1">Get in Touch</h1>
                    <div id="error"><? echo $error.$successMessage; ?></div>
                        <form method="post">
                            <fieldset class="form-group">
                            <!--<label for="subject">Name</label> -->
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Name">
                            </fieldset>
                            <fieldset class="form-group">
                            <!--<label for="email">Email address</label> -->
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </fieldset>
                            <fieldset class="form-group">
                            <!-- <label for="subject">Phone Nubmer</label>-->
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
                            </fieldset>                                                   
                            <fieldset class="form-group">                            
                            <!-- <label for="exampleTextarea"> Your Message Here?</label>-->
                            <textarea class="form-control" id="content" name="content" placeholder="Your Messagge" rows="3"></textarea>
                            </fieldset>
                            <button type="submit" id="submit" class="btn btn-primary">SEND</button>
                    </form>
             </div>
             <div class="col-sm-2"> </div>
        </div>
</div>
<!-- END OF Contact Form -->


<script type="text/javascript">
        
        $("form").submit(function(e) {
            
            var error = "";
          if ($("#subject").val() == "") { 
                error += "Please enter your name.<br>" 
            }
            if ($("#phone").val() == "") {    
                error += "Please enter your phone number.<br>"  
            }
            if ($("#content").val() == "") {
                error += "Please enter your message.<br>" 
            }
            if (error != "") {
               $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>Please enter missing detai(s): </strong></p>' + error + '</div>');
                return false; 
            } else {
                return true;
            }
        }) 
  </script>
</div>

<?php include "includes/footer.php"; ?>
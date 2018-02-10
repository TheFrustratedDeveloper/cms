<?php  include "includes/db_connect.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "class/config.php";
//only use when you are not using composer (not-recommended)
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';
?>
<!-- Navigation -->
<?php  include "includes/nav.php"; ?>


<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove();
    });
}, 4000);
</script>
<!-- Page Content -->
<?php 
if(isset($_SESSION['role'])){
	redirect('/cms/admin');
}else if(!$_GET['pswrd']){
    redirect('/cms/');
}
?>

<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password ?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">
                                    <form id="register-form" role="form" autocomplete="on" class="form" method="post">
<?php 
if(isset($_POST['recover-submit'])){
    $email = $_POST['email'];
    $length = 60;
    $token = bin2hex(openssl_random_pseudo_bytes($length));
    if(duplicateEmail($email)){
        $stmt = mysqli_prepare($connect,"UPDATE users SET token = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt,"ss",$token,$email);
        mysqli_stmt_execute($stmt);
    }else{
        echo "<p class='alert alert-danger'> Email doesn't exists. Please check your Email Address</p>";
        echo "<a class='btn btn-primary' href='/cms/login'>LOGIN</a> <a class='btn btn-success' href='/cms/register'>REGISTER</a>
        <a href='cms/'>HOME</a>";
        die();
    }
    /*
        CONFIG PHPMAILER
    */
     $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                           // Set mailer to use SMTP
        $mail->Host = config::SMTP_HOST;                          // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                  // Enable SMTP authentication
        $mail->Username = config::SMTP_USER;                    // SMTP username
        $mail->Password = config::SMTP_PASSWORD;                // SMTP password
        $mail->Port = config::SMTP_PORT;                       // TCP port to connect to
        $mail->SMTPSecure = 'tls';
        // $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
        $mail->CharSet = 'UTF-8';                                   
                        // TCP port to connect to
        //Recipients
        $mail->setFrom('thefrustratedDeveloper@dhruvsaxena.me', 'noReply');
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo('info@example.com', 'ReplyTo');
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset[noReply]';
        $mail->Body    = "<p>Please Click on the link or copy and paste the link in your browser to reset your password.
        <br>
        <a href='https://localhost/cms/reset.php?email=$email&token=$token'>
            https://localhost/cms/reset.php?email=$email&token=$token
        </a>
        </p>
        ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        
        if(!$mail->send()){
            echo "<p class='alert alert-danger'>FAILED ! Please try again.</p>";
        }else{
            echo "<p class='alert alert-info'>Success ! Please check your email for reset link.</p>";
        }
    } catch (Exception $e) {
        echo "<p class='alert alert-danger'>FAILED ! Please try again.</p>";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email"
                                                value="<?php echo isset($email) ? $email : ''?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>
                                </div><!-- Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php include "includes/footer.php";?>
</div> <!-- /.container -->


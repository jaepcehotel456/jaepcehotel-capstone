<?php include 'navbar.php' ?>
 <?php require ("phpmailer/PHPmailer.php");
      require ("phpmailer/SMTP.php");

      if(isset($_POST['submit'])){

    $mailTo= $_POST['email'];
    $body= $_POST['body'];

    $mail = new phpmailer\PHPMailer\PHPMailer();

    $mail->SMTPDebug = 3;
    $mail->isSMTP();

    $mail->Host="mail.smtp2go.com";
    $mail->SMTPAuth = true;

    $mail->Username="jaepce";
    $mail->Passowrd="Poplolo657!";

    $mail->SMTPSecure = "tls";

    $mail->Port = "2525";

    $mail->From = "jaepcehotel657@gmail.com";
    $mail->FromName="customer";

    $mail->addAddress($mailTo,$POST['name']);

    $mail->isHTML(true);
    $mail->Subject="Customer Comment";
    $mail->Body = $body;
    $mail->AltBody = "This is the the plain text version  of the email content";

    if(!$mail->send()){
        echo "Mailer Error :" . $mail->ErrorInfo;
    }else{
        echo "Message has been Sent";
    }
}

?> 

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Contact Info</h2>
                        <p>For Inquiries and Concerns please contact us from the details written below. You can also email us through text box at the side.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>Zamboanga City</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td>(+63) 987-654-3210 or 254-3210</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>jaepcehotel657@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Fax:</td>
                                    <td>+(12) 345 67890</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 ">
                    <form action="" method="POST" class="contact-form" id="formid">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="body" placeholder="Your Message"></textarea>
                                <button type="submit" name="submit">Submit Now</button>
                               
                               <!-- <a href="https://www.facebook.com/"><img src="img/icons/facebook.png" class="contact-icon"></a>
                                <a href="https://twitter.com/"><img src="img/icons/twitter.png" class="contact-icon"></a> 
                                <a href="https://www.instagram.com/"><img src="img/icons/instagram.png" class="contact-icon"></a>  -->

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->



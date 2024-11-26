<?php
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];
    $card_name = $_POST['card_name'];
    $email = $_POST['email'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    // Email message content
    $subject = "Payment Confirmation";
    $body = "
    <div style='font-family: Arial, sans-serif; color: #333; background: #f8f9fa; padding: 20px;'>
        <div style='max-width: 600px; margin: auto; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
            <div style='background: #007bff; color: white; padding: 15px; text-align: center;'>
                <h1 style='margin: 0;'>Payment Confirmation</h1>
            </div>
            <div style='padding: 20px;'>
                <p>Dear $card_name,</p>
                <p>Thank you for your payment. We have received your transaction details as follows:</p>
                <table style='width: 100%; border-collapse: collapse; margin: 20px 0;'>
                    <tr>
                        <th style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>Payment Method</th>
                        <td style='padding: 8px; border-bottom: 1px solid #ddd;'>$payment_method</td>
                    </tr>
                    <tr>
                        <th style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>Amount</th>
                        <td style='padding: 8px; border-bottom: 1px solid #ddd;'>$$amount</td>
                    </tr>
                </table>
                <p>If you have any questions or concerns, feel free to contact us.</p>
                <p style='text-align: center; margin: 30px 0;'>
                    <a href='https://example.com' style='background: #007bff; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px;'>Visit Our Website</a>
                </p>
                <p style='font-size: 12px; color: #666;'>This email is auto-generated. Please do not reply.</p>
            </div>
        </div>
    </div>
    ";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chinavalkarachal@gmail.com'; // Your email
        $mail->Password = 'ypww klms wzwq tymf';   // App-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your_email@gmail.com', 'Payment Gateway');
        $mail->addAddress($email); // Recipient's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send mail
        $mail->send();
        echo "Email sent successfully.";
    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>


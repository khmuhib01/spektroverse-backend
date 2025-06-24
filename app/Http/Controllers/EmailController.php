<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string',
            'subject' => 'nullable|string',
        ]);

        $subject = $request->subject ?? 'New Website Contact Enquiry';

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply@spektroverse.com';
            $mail->Password = 'Spektroverse@2025#';
            $mail->SMTPSecure = 'ssl'; // for port 465 use 'ssl'
            $mail->Port = 465;

            // Sender and recipient
            $mail->setFrom('no-reply@spektroverse.com', 'Spektroverse Support');
            $mail->addAddress('info@spektroverse.com'); // recipient
            $mail->addReplyTo($request->email, $request->name);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;

            // You can customize the email content here
            $mail->Body = view('email_template.enquiries_view', [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ])->render();

            $mail->AltBody = strip_tags($request->message);

            $mail->send();

            return response()->json(['message' => 'Email sent successfully']);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to send email',
                'details' => $mail->ErrorInfo
            ], 500);
        }
    }
}
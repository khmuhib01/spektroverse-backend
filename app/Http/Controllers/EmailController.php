<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'phone' => 'required|string',
            'service' => 'required|string',
            'message' => 'required|string'
        ]);

        $subject = $request->subject ?? 'New Website Contact Enquiry';

        // SEND ENQUIRY TO ADMIN
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply@spektroverse.com';
            $mail->Password = 'Spektroverse@2025#';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('no-reply@spektroverse.com', 'Spektroverse Support');
            $mail->addAddress('info@spektroverse.com');
            $mail->addReplyTo($request->email, $request->name);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = view('email_template.enquiries_view', [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service' => $request->service,
                'message' => $request->message
            ])->render();
            $mail->AltBody = strip_tags($request->message);

            $mail->send();
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to send main email',
                'details' => $mail->ErrorInfo
            ], 500);
        }
        $welcomeSend = $this->welcomeMail($request);

        if (!$welcomeSend) {
            return response()->json([
                'error' => 'Failed to send main email',
                'details' => $mail->ErrorInfo
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Email sent successfully',
            'data' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service' => $request->service,
                'subject' => $subject,
                'message' => $request->message
            ],
        ]);
    }


    public function welcomeMail($request)
    {
        $thankYou = new PHPMailer(true);

        try {
            $thankYou->isSMTP();
            $thankYou->Host = 'smtp.hostinger.com';
            $thankYou->SMTPAuth = true;
            $thankYou->Username = 'no-reply@spektroverse.com';
            $thankYou->Password = 'Spektroverse@2025#'; // 🔁 Change after testing
            $thankYou->SMTPSecure = 'ssl';
            $thankYou->Port = 465;

            $thankYou->CharSet = 'UTF-8';
            $thankYou->Hostname = 'spektroverse.com';

            $thankYou->setFrom('no-reply@spektroverse.com', 'Spektroverse Support');
            $thankYou->addAddress($request->email);

            $thankYou->isHTML(true);
            $thankYou->Subject = 'Thank You for Contacting Spektroverse';

            $thankYou->Body = view('email_template.thank_you', [
                'name' => $request->name
            ])->render();

            $thankYou->AltBody = 'Thank you for reaching out. We have received your message and will get back to you soon.';

            $thankYou->send();
            return true;
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to send thank-you email',
                'details' => $thankYou->ErrorInfo
            ], 500);
        }
    }
}
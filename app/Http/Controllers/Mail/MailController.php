<?php

namespace App\Http\Controllers\Mail;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use Illuminate\Http\Request;


class MailController extends Controller
{
    public function sendEmailToMultiple(Request $request)
    {
        // Validate the form input
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        $emails = Subscribers::pluck('email')->toArray();
    
        $mail = new PHPMailer(true);
    
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'b5872f561c58e3';
            $mail->Password = 'c2eb09974acd76';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;
    
            // Sender details
            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
    
            // Add recipients
            foreach ($emails as $email) {
                $mail->addAddress($email);
            }
    
            // Render email content using Blade
            $emailContent = view('admin.email.email', [
                'subject' => $request->input('subject'),
                'body' => $request->input('body'),
            ])->render();
    
            $mail->isHTML(true);
            $mail->Subject = $request->input('subject');
            $mail->Body = $emailContent;
            $mail->AltBody = strip_tags($request->input('body')); // Fallback for plain text clients
    
            // Send email
            $mail->send();
    
            return redirect()->back()->with('message', 'Emails sent successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }
    
}
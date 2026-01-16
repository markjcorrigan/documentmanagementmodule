<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailerController extends Controller
{
    public function email()
    {
        // ✅ This is correct - returns a view
        return view('email');
    }

    public function composeEmail(Request $request)
    {
        $mail = new PHPMailer(true);

        try {
            // Email server settings
            $mail->isSMTP();
            $mail->SMTPKeepAlive = true;
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            // Email content
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->emailRecipient);

            // Add CC and BCC only if they exist
            if ($request->filled('emailCc')) {
                $mail->addCC($request->emailCc);
            }
            if ($request->filled('emailBcc')) {
                $mail->addBCC($request->emailBcc);
            }

            // Handle file attachments safely
            if ($request->hasFile('emailAttachments')) {
                foreach ($request->file('emailAttachments') as $file) {
                    if ($file->isValid()) {
                        $mail->addAttachment(
                            $file->getRealPath(),
                            $file->getClientOriginalName()
                        );
                    }
                }
            }

            $mail->isHTML(true);
            $mail->Subject = $request->emailSubject;
            $mail->Body = $request->emailBody;

            // Send email
            if (! $mail->send()) {
                return back()->with('failed', 'Email not sent.')->withErrors($mail->ErrorInfo);
            } else {
                return back()->with('success', 'Email has been sent.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.');
        }
    }
}

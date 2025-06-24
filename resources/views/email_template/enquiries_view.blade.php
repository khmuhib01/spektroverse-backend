<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Website Enquiry - Spektroverse</title>
</head>
<body style="margin:0; padding:0; background-color:#f6f8fb;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f6f8fb">
        <tr>
            <td align="center" style="padding: 30px 20px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.05);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 20px 30px; border-bottom: 1px solid #dddddd;">
                            <h2 style="margin: 0; font-family: Arial, sans-serif; color: #1e40af;">New Website Enquiry</h2>
                        </td>
                    </tr>

                    <!-- User Info -->
                    <tr>
                        <td style="padding: 20px 30px; font-family: Arial, sans-serif; font-size: 15px; color: #333333;">
                            <p style="margin: 0;"><strong style="color: #111827;">Name:</strong> {{ $name }}</p>
                            <p style="margin: 8px 0 0;"><strong style="color: #111827;">Email:</strong> {{ $email }}</p>
                        </td>
                    </tr>

                    <!-- Message -->
                    <tr>
                        <td style="padding: 0 30px 20px 30px; font-family: Arial, sans-serif; font-size: 15px; color: #333333;">
                            <p style="margin: 15px 0 5px;"><strong style="color: #111827;">Message:</strong></p>
                            <p style="margin: 0;">{{ $message }}</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td bgcolor="#f6f8fb" style="padding: 20px 30px; font-family: Arial, sans-serif; font-size: 13px; color: #777777; border-top: 1px solid #eeeeee; text-align: center;">
                            This message was submitted via the contact form on
                            <a href="http://spektroverse.com" style="color: #1e40af; text-decoration: none;"><strong>spektroverse.com</strong></a>.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Enquiry - Spektroverse</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f6f8fb;
            color: #333;
            padding: 20px;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
        .header {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            color: #1e40af;
        }
        .section {
            margin-bottom: 20px;
        }
        .label {
            font-weight: 600;
            color: #111827;
        }
        .footer {
            font-size: 13px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Website Enquiry</h2>
        </div>

        <div class="section">
            <p><span class="label">Name:</span> {{ $name }}</p>
            <p><span class="label">Email:</span> {{ $email }}</p>
        </div>

        <div class="section">
            <p class="label">Message:</p>
            <p>{{ $message }}</p>
        </div>

        <div class="footer">
            This message was submitted via the contact form on <strong> <a href="http://spektroverse.com">spektroverse.com</a></strong>.
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Health Booking Platform!</title>
    <style>
        /* Add your custom styles here */
        /* For example: */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Health Booking Platform!</h1>
        <p>Dear {{ $data["user"]->name }},</p>
        <p>Thank you for joining our Health Ease Application. We're excited to have you on board and assist you in managing your appointments, consultations, and first aid needs.</p>
        <p>Here are a few things you can expect from our platform:</p>
        <ul>
            <li>Effortless appointment booking with healthcare professionals</li>
            <li>Seamless online consultations from the comfort of your home</li>
            <li>Quick access to first aid information and guidelines</li>
            <li>Reminders and notifications for your upcoming appointments</li>
        </ul>
        {{-- <p>Get started now by logging into your account and exploring all the features we have to offer.</p>
        <div style="text-align: center;">
            <a href="{{ route('login') }}" class="btn">Log In</a>
        </div> --}}
        <p>Here is your personal Medical Records(MR) Number: <strong>{{$data['mr_number']}}</strong> for identification. Keep this number to yourself</p>
        <p>If you have any questions or need assistance, our support team is always ready to help you. Feel free to reach out to us.</p>
        <p>We hope our platform brings convenience and peace of mind to your healthcare journey.</p>
        <p>Best regards,</p>
        <p>Your [Health Ease] Team</p>
    </div>
</body>
</html>

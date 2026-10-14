
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Car Care</title>
</head>

<body style="margin:0; padding:0; background:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">

    <div style="width:100%; padding:40px 0;">

        <div style="max-width:620px; margin:0 auto; background:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 8px 30px rgba(0,0,0,0.08);">

            <!-- Header -->
            <div style="background:#111827; padding:30px; text-align:center;">

                <div style="font-size:32px; font-weight:bold; color:#fbbf24;">
                    CAR CARE
                </div>

                <div style="color:#d1d5db; font-size:14px; margin-top:8px;">
                    Professional Car Care & Service
                </div>

            </div>


            <!-- Main Content -->
            <div style="padding:40px 35px;">

                <div style="text-align:center; margin-bottom:25px;">
                    <div style="font-size:50px;">
                        🚗
                    </div>
                </div>


                <h1 style="margin:0 0 15px; color:#111827; font-size:28px; text-align:center;">
                    Welcome to Car Care!
                </h1>


                <p style="font-size:17px; color:#374151; line-height:1.7;">
                    Hi <strong>{{ $name }}</strong>,
                </p>


                <p style="font-size:16px; color:#4b5563; line-height:1.7;">
                    Welcome to <strong>Car Care</strong>! We're excited to have you
                    as a part of our community.
                </p>


                <p style="font-size:16px; color:#4b5563; line-height:1.7;">
                    Your account has been successfully created. You can now
                    explore our services, book your car service, and manage
                    your bookings easily.
                </p>


                <!-- Account Details -->
                <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:12px; padding:20px; margin:30px 0;">

                    <h3 style="margin-top:0; color:#111827;">
                        Your Account
                    </h3>

                    <p style="margin:8px 0; color:#4b5563;">
                        <strong>Name:</strong> {{ $name }}
                    </p>

                    <p style="margin:8px 0; color:#4b5563;">
                        <strong>Email:</strong> {{ $email }}
                    </p>

                    <p style="margin:8px 0; color:#16a34a;">
                        <strong>Status:</strong> Account Active ✓
                    </p>

                </div>


                <!-- Button -->
                <div style="text-align:center; margin:30px 0;">

                    <a href="http://127.0.0.1:8000/"
                       style="display:inline-block; background:#fbbf24; color:#111827; text-decoration:none; padding:14px 30px; border-radius:8px; font-weight:bold; font-size:15px;">
                        Explore Car Care
                    </a>

                </div>


                <p style="font-size:15px; color:#6b7280; line-height:1.6;">
                    If you have any questions, our team is always here to help.
                </p>


                <p style="font-size:15px; color:#4b5563; line-height:1.6;">
                    We're looking forward to taking care of your car.
                </p>


                <p style="margin-top:30px; color:#374151; line-height:1.6;">
                    Regards,<br>
                    <strong>Car Care Team</strong>
                </p>

            </div>


            <!-- Footer -->
            <div style="background:#111827; padding:25px; text-align:center;">

                <p style="margin:0; color:#d1d5db; font-size:13px;">
                    © {{ date('Y') }} Car Care. All rights reserved.
                </p>

                <p style="margin:8px 0 0; color:#9ca3af; font-size:12px;">
                    Professional Car Care & Service
                </p>

            </div>

        </div>

    </div>

</body>
</html>


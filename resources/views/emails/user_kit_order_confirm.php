<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kit Order Confirmation</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4;">
    <table align="center" cellpadding="0" cellspacing="0" style="max-width:600px; width:100%; background:#ffffff; border-radius:8px; overflow:hidden; font-family: Arial, sans-serif;">
        <tr>
            <td style="background-color:#4CAF50; padding:20px; text-align:center; color:#ffffff;">
                <h1 style="margin:0; font-size:24px;">Order Confirmed 🎉</h1>
            </td>
        </tr>
        <tr>
            <td style="padding:20px; color:#333333; font-size:15px;">
                <p>Hi <strong>{{ userkitdata['student_name'] }}</strong>,</p>
                <p>We’re excited to let you know that your kit order has been successfully confirmed.</p>

                <table width="100%" cellpadding="5" cellspacing="0" style="margin-top:15px; background-color:#fafafa; border-radius:6px;">
                    <tr><td><strong>Order ID:</strong></td><td>{{ $userkitdata['order_id'] }}</td></tr>
                    <tr><td><strong>Kit Name:</strong></td><td>{{ $userkitdata['kit_name'] }}</td></tr>
                    <tr><td><strong>Total Amount:</strong></td><td>₹{{ $userkitdata['total_amount'] }}</td></tr>
                    <tr><td><strong>Order Date:</strong></td><td>{{ $userkitdata['order_date'] }}</td></tr>
                </table>

                <p style="margin-top:15px;">We’ll notify you as soon as your kit is packed and shipped.</p>
                <p>Thank you for choosing <strong>{{ $userkitdata['school_name'] }}</strong>!</p>
            </td>
        </tr>
        <tr>
            <td style="background-color:#f4f4f4; padding:15px; text-align:center; font-size:12px; color:#888888;">
                © {{ date('Y') }} {{ $userkitdata['school_name'] }}. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>

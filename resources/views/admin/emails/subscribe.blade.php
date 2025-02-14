<!DOCTYPE html>
<html>
<head>
    <title>Subscription Confirmation</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f4f4f4; padding: 20px;">
    <tr>
        <td align="center">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

                <!-- Header -->
                <tr>
                    <td align="center" style="padding: 20px 0;">
                        <h1 style="color: #3B5890; margin: 0;">By3nalk</h1>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding: 20px;">
                        <h2 style="color: #333;">Thank You for Subscribing, {{ $subscribe->email }}!</h2>
                        <p style="color: #555; font-size: 16px;">We're excited to have you as part of the By3nalk community. Stay tuned for updates, exclusive content, and special offers.</p>
                        <p style="color: #555; font-size: 16px;">If you have any questions, feel free to contact us.</p>
                    </td>
                </tr>

                <!-- Button -->
                <tr>
                    <td align="center" style="padding: 20px;">
                        <a href="https://www.by3nalk.com" style="background-color: #3B5890; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 5px; font-size: 16px; display: inline-block;">
                            Visit By3nalk
                        </a>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center" style="padding: 20px; font-size: 14px; color: #777;">
                        <p>By3nalk &copy; {{ date('Y') }}. All rights reserved.</p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>

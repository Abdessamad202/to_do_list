@props(['task'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Letter</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <table align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border: 1px solid #ddd; padding: 20px;">
        <!-- Header Section -->
        <tr>
            <td style="text-align: center; padding: 10px 0;">
                <h2 style="color: #333;">Company Name</h2>
                <p style="color: #555;">Address Line 1, City, ZIP</p>
            </td>
        </tr>

        <!-- Greeting -->
        <tr>
            <td style="padding: 20px; color: #333;">
                <p>Dear [Recipient's Name],</p>
            </td>
        </tr>

        <!-- Body Section -->
        <tr>
            <td style="padding: 20px; color: #555;">
                <p>We hope this message finds you well.</p>
                {{-- <p>We are excited to inform you about our latest updates. Our team has been working hard to bring new features and improvements that will enhance your experience with us. Here are some of the highlights:</p> --}}
                {{-- @if (isset($task->action) && $task->action !== 'create') --}}
                    <p>
                        We are here to tell you that you have added a task called
                        <span style="font-weight: bold;">{{ $task->task }}</span>
                        at {{ $task->created_at }} {{$task->action}}
                    </p>
                {{-- @endif --}}
                {{-- <p>we are here to tell you that you are added a task called <span style="font-weight: bold">{{$task->task}}</span> at {{$task->created_at}}</p> --}}
                {{-- <ul style="padding-left: 20px;">
                    <li>Feature 1: Brief description of the feature.</li>
                    <li>Feature 2: Brief description of the feature.</li>
                    <li>Feature 3: Brief description of the feature.</li>
                </ul> --}}
                <p>We appreciate your continued support and look forward to your feedback.</p>
            </td>
        </tr>

        <!-- Call-to-Action Button -->
        {{-- <tr>
            <td style="text-align: center; padding: 20px;">
                <a href="[Insert Link Here]" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Learn More</a>
            </td>
        </tr> --}}

        <!-- Closing Section -->
        <tr>
            <td style="padding: 20px; color: #333;">
                <p>Thank you,</p>
                <p>Best regards,</p>
                <p><strong>Company Team</strong></p>
            </td>
        </tr>

        <!-- Footer Section -->
        {{-- <tr>
            <td style="padding: 10px; text-align: center; color: #999; font-size: 12px;">
                <p>You are receiving this email because you subscribed to updates from our company.</p>
                <p>To unsubscribe, <a href="[Unsubscribe Link]" style="color: #007bff;">click here</a>.</p>
            </td>
        </tr> --}}
    </table>
</body>
</html>

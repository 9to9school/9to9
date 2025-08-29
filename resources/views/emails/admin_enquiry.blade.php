<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Enquiry Received</title>
</head>
<body style="background-color: #f3f4f6; padding: 40px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">

        <h2 style="color: #1f2937; font-size: 22px; font-weight: 600; margin-bottom: 20px; border-bottom: 2px solid #e5e7eb; padding-bottom: 10px;">
            📩 New Enquiry Received
        </h2>

        @if($data['type'] == 'talkexp')
            <p><strong>Name:</strong> {{ $data['full_name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $data['mobile_number'] }}</p>
            <p><strong>Preferred Time:</strong> {{ $data['preferred_time'] }}</p>
            <p><strong>Question / Concern:</strong></p>
            <div style="background-color: #f9fafb; padding: 10px 15px; border-left: 4px solid #6366f1; border-radius: 5px;">
                {{ $data['question_or_concern'] }}
            </div>

        @elseif($data['type'] == 'enquiry')
            <p><strong>Name:</strong> {{ $data['full_name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $data['mobile_number'] }}</p>
            <p><strong>State:</strong> {{ $data['state'] }}</p>
            <p><strong>City:</strong> {{ $data['city'] }}</p>
            <p><strong>Message:</strong></p>
            <div style="background-color: #f9fafb; padding: 10px 15px; border-left: 4px solid #10b981; border-radius: 5px;">
                {{ $data['message'] }}
            </div>

        @elseif($data['type'] == 'french')
            <p><strong>Name:</strong> {{ $data['full_name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $data['phone_number'] }}</p>
            <p><strong>City & State:</strong> {{ $data['city_state'] }}</p>
            <p><strong>Preferred Franchise Location:</strong> {{ $data['preferred_location'] }}</p>
            <p><strong>Investment Capacity (INR):</strong> {{ $data['investment_capacity'] }}</p>
            <p><strong>Business Background / Experience:</strong></p>
            <div style="background-color: #f9fafb; padding: 10px 15px; border-left: 4px solid #3b82f6; border-radius: 5px;">
                {{ $data['business_background'] }}
            </div>
            <p><strong>Comments:</strong></p>
            <div style="background-color: #f9fafb; padding: 10px 15px; border-left: 4px solid #10b981; border-radius: 5px;">
                {{ $data['comments'] }}
            </div>

        @elseif($data['type'] == 'teacherapply')
            <p><strong>Name:</strong> {{ $data['fullname'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $data['phone_number'] }}</p>
            <p><strong>State:</strong> {{ $data['state'] }}</p>
            <p><strong>City:</strong> {{ $data['city'] }}</p>
            <p><strong>Resume Link:</strong> <a href="{{ asset($data['resume']) }}" style="color: #2563eb;" target="_blank">Download Resume</a></p>
        @elseif($data['type'] == 'preschool')
            <p><strong>Email:</strong> {{ $data['name'] ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $data['mobile'] }}</p>
{{--            <p><strong>State:</strong> {{ $data['email'] }}</p>--}}
            <p><strong>City:</strong> {{ $data['age'] }}</p>
            <p><strong>Source : </strong> {{$data['type']}}</p>
        @elseif($data['type'] == 'partner_school')
            <p><strong>Name:</strong> {{ $data['full_name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $data['mobile_number'] }}</p>
            <p><strong>Message:</strong></p>
            <div style="background-color: #f9fafb; padding: 10px 15px; border-left: 4px solid #10b981; border-radius: 5px;">
                {{ $data['message'] }}
            </div>
        @endif


        <?php  // die;?>

        <div style="margin-top: 30px; font-size: 13px; color: #6b7280; text-align: center;">
            <!-- This message was generated from your website enquiry form. -->
        </div>
    </div>

</body>
</html>

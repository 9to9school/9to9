<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Enquiry</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
        <img src="https://in5cdn.npfs.co/uploads/college/image/6196410c3059a940222263_banner.jpg" alt="9to9 School Banner" class="w-full">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-indigo-700 mb-4">Admission Enquiry</h2>
            <p class="text-gray-700 mb-4">Dear <?php echo $userdata['full_name']; ?>,</p>
            <p class="text-gray-700 mb-4">
                Thank you for reaching out to <strong>9to9school.com</strong> regarding admission for <?php echo $userdata['school_name']; ?>. We truly appreciate your interest in our innovative and flexible learning platform.
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4">
                <li>Pay-per-day pricing</li>
                <li>Flexible timings</li>
                <li>Pick your own teacher</li>
            </ul>
            <p class="text-gray-700 mb-4">
                If you have any questions or need further information about our programs and admission process, please feel free to contact us.
            </p>
            <p class="text-gray-700">We look forward to welcoming you to our vibrant learning community.</p>
            <p class="text-gray-700 mt-6">Best regards,<br><strong>The 9to9 School Team</strong></p>
        </div>
    </div>
</body>
</html>
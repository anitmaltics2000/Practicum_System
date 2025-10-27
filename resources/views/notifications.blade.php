<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')

    <div class="pt-20 px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Notifications</h1>
            <div class="space-y-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-blue-600 mb-2">New Practicum Opportunity Available</h3>
                    <p class="text-gray-600 mb-2">A new internship position in Software Development has been posted. Check it out!</p>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-green-600 mb-2">Application Status Update</h3>
                    <p class="text-gray-600 mb-2">Your application for the Marketing Internship has been reviewed.</p>
                    <span class="text-sm text-gray-500">1 day ago</span>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-orange-600 mb-2">Deadline Reminder</h3>
                    <p class="text-gray-600 mb-2">Don't forget to submit your final project report by Friday.</p>
                    <span class="text-sm text-gray-500">3 days ago</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

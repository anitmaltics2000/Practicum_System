<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')

    <div class="pt-20 px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Your Profile</h1>
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex items-center mb-8">
                    <div class="w-24 h-24 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl font-bold mr-6">
                        JD
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">John Doe</h2>
                        <p class="text-gray-600">Computer Science Student</p>
                        <p class="text-gray-600">john.doe@example.com</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-blue-600">Personal Information</h3>
                        <div class="space-y-2">
                            <p><strong>Full Name:</strong> John Doe</p>
                            <p><strong>Email:</strong> john.doe@example.com</p>
                            <p><strong>Phone:</strong> (555) 123-4567</p>
                            <p><strong>Location:</strong> New York, NY</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-green-600">Academic Information</h3>
                        <div class="space-y-2">
                            <p><strong>Major:</strong> Computer Science</p>
                            <p><strong>Year:</strong> Junior</p>
                            <p><strong>GPA:</strong> 3.8</p>
                            <p><strong>Skills:</strong> JavaScript, Python, React</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

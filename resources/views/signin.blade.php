<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')

    <div class="pt-20 px-4">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Sign In</h1>
            <form class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                        Sign In
                    </button>
                </div>
            </form>
            <p class="mt-6 text-center text-sm text-gray-600">
                Don't have an account? <a href="/register" class="text-blue-600 hover:text-blue-500">Create one here</a>
            </p>
        </div>
    </div>
</body>
</html>

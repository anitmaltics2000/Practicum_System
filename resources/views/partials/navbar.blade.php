<nav class="fixed top-0 left-0 right-0 bg-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-gray-800">Practicum Placement</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Home</a>
                <a href="/#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">About</a>
                <a href="/notifications" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Notifications</a>
                <a href="/profile" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Profile</a>
                @auth
                    @if(Auth::user()->role === 'student')
                        <a href="/student-portal" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Student Portal</a>
                        <a href="/apply" class="bg-green-600 text-white hover:bg-green-700 px-4 py-2 rounded-md text-sm font-medium transition duration-300">Apply Now</a>
                    @elseif(Auth::user()->role === 'company')
                        <a href="/company-portal" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Company Portal</a>
                    @elseif(Auth::user()->role === 'admin')
                        <a href="/admin-portal" class="text-gray-700 hover:text-purple-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Admin Portal</a>
                    @endif
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Logout</button>
                    </form>
                @else
                    <a href="/signin" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Sign In</a>
                    <a href="/register" class="bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium transition duration-300">Create Account</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const homeLink = document.querySelector('a[href="/"]');
        if (homeLink && window.location.pathname === '/') {
            homeLink.setAttribute('href', '#top');
            homeLink.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('#top').scrollIntoView({ behavior: 'smooth' });
            });
        }
    });
</script>

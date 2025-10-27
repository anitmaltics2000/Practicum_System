<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .bounce-in {
            animation: bounceIn 0.8s ease-out;
        }
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')
    <!-- Hero Section -->
    <section id="top" class="gradient-bg text-white py-20 px-4">
        <div class="max-w-4xl mx-auto text-center fade-in">
            <h1 class="text-5xl font-bold mb-4 bounce-in">Welcome to Practicum Placement</h1>
            <p class="text-xl mb-8">Dedicated in the enablement of every student to achieve their goals as individuals in the society. To learn more on the organization placed in, sign in and if you do not have an account register.</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-4 bg-gray-100">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-8 text-gray-800">About Practicum Placement</h2>
            <p class="text-lg text-gray-600 mb-6">
                Welcome to Practicum Placement, your gateway to meaningful internship opportunities and career growth.
            </p>
            <p class="text-gray-600 mb-6">
                Our platform connects students with industry-leading companies, providing hands-on experience that bridges the gap between academic learning and professional success.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Our Mission</h3>
                    <p class="text-gray-600">
                        To empower students with practical skills and real-world experience through carefully curated practicum placements.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4 text-green-600">Our Vision</h3>
                    <p class="text-gray-600">
                        To be the leading platform for connecting talent with opportunity, fostering innovation and professional excellence.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <p class="mb-4">© 2025 Our Platform. All rights reserved.</p>
            <div class="space-x-4">
                <button class="bg-blue-500 px-4 py-2 rounded hover:bg-blue-600 transition">Contact Us</button>
                <button class="bg-green-500 px-4 py-2 rounded hover:bg-green-600 transition">Support</button>
            </div>
        </div>
    </footer>

    <script>
        // Simple interactivity
        document.getElementById('cta-btn').addEventListener('click', function() {
            alert('Get Started clicked! Let\'s begin your journey.');
        });

        document.getElementById('learn-btn').addEventListener('click', function() {
            alert('Learn More about our features!');
        });

        // Smooth scroll for About link
        document.querySelector('a[href="/#about"]').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#about').scrollIntoView({ behavior: 'smooth' });
        });



        // Scroll animation
        window.addEventListener('scroll', function() {
            const elements = document.querySelectorAll('.card-hover');
            elements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight - 100) {
                    el.classList.add('fade-in');
                }
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileConnect</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @keyframes rotateIn {
            from { transform: rotate(-10deg); opacity: 0; }
            to { transform: rotate(0); opacity: 1; }
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
            filter: blur(5px);
        }

        .green-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(32, 201, 151, 0.7);
        }

        .container-fluid {
            position: relative;
            z-index: 1;
            height: 100vh;
        }

        .row {
            height: 100%;
        }

        .btn-teal {
            background-color: #20c997;
            border-color: #20c997;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-teal:hover {
            background-color: #1ba87e;
            border-color: #1ba87e;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .profile-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: auto;
            animation: fadeInUp 0.8s ease-out;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background-color: #20c997;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: scale(1.1);
        }

        .logo {
            max-height: 30px;
            width: auto;
            animation: rotateIn 0.8s ease-out;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-pulse {
            animation: pulse 2s infinite ease-in-out;
        }

        .profile-showcase {
            display: none;
        }

        @media (min-width: 1024px) {
            .content-wrapper {
                width: 50%;
            }
            .profile-showcase {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 50%;
                position: fixed;
                right: 0;
                top: 0;
                bottom: 0;
            }
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="green-overlay"></div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="content-wrapper">
                    <div class="mb-5">
                        <img src="/api/placeholder/150/30" alt="ProfileConnect Logo" class="logo">
                    </div>
                    <h1 class="mb-4 animate-fadeInUp" style="animation-delay: 0.2s;">ProfileConnect</h1>
                    <p class="mb-4 animate-fadeInUp" style="animation-delay: 0.4s;">Join the network and share all your profiles in one place!</p>
                    <form>
                        <div class="form-group animate-fadeInUp" style="animation-delay: 0.6s;">
                            <input type="text" class="form-control form-control-lg" placeholder="Choose your username">
                        </div>
                        <button type="submit" class="btn btn-teal btn-lg btn-block animate-pulse">Get Started</button>
                    </form>
                    <p class="mt-3 animate-fadeInUp" style="animation-delay: 0.8s;"><small>Already have an account? <a href="#">Log in</a></small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-showcase">
        <div class="profile-card p-4">
            <img src="/api/placeholder/100/100" alt="Profile picture" class="rounded-circle mb-3 animate-pulse">
            <h3>Jane Doe</h3>
            <p>Digital Creator & Influencer</p>
            <div class="mb-3">
                <div class="social-icon"><img src="/api/placeholder/20/20" alt="Twitter"></div>
                <div class="social-icon"><img src="/api/placeholder/20/20" alt="Instagram"></div>
                <div class="social-icon"><img src="/api/placeholder/20/20" alt="YouTube"></div>
            </div>
            <button class="btn btn-outline-secondary">Follow</button>
        </div>
    </div>
</body>
</html>
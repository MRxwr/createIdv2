<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileConnect - Login</title>
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

        .logo {
            max-height: 40px;
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
                    <div class="mb-5 text-center">
                        <img src="/api/placeholder/200/40" alt="ProfileConnect Logo" class="logo">
                    </div>
                    <h1 class="mb-4 text-center animate-fadeInUp" style="animation-delay: 0.2s;">Welcome Back</h1>
                    <p class="mb-4 text-center animate-fadeInUp" style="animation-delay: 0.4s;">Log in to connect with your network</p>
                    <form>
                        <div class="form-group animate-fadeInUp" style="animation-delay: 0.6s;">
                            <input type="email" class="form-control form-control-lg" placeholder="Email address" required>
                        </div>
                        <div class="form-group animate-fadeInUp" style="animation-delay: 0.7s;">
                            <input type="password" class="form-control form-control-lg" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-teal btn-lg btn-block animate-pulse">Log In</button>
                    </form>
                    <p class="mt-3 text-center animate-fadeInUp" style="animation-delay: 0.8s;">
                        <small>Don't have an account? <a href="#">Sign up</a></small>
                    </p>
                    <p class="mt-2 text-center animate-fadeInUp" style="animation-delay: 0.9s;">
                        <small><a href="#" data-toggle="modal" data-target="#forgotPasswordModal">Forgot password?</a></small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-showcase">
        <div class="profile-card p-4 text-center">
            <h3 class="mb-4">Connect and Share</h3>
            <p>Join thousands of professionals showcasing their work and building their network.</p>
            <img src="/api/placeholder/250/150" alt="Networking illustration" class="img-fluid mb-3 animate-pulse">
            <p><strong>Log in now to access your ProfileConnect dashboard!</strong></p>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Enter your email address and we'll send you a temporary password.</p>
                    <form id="forgotPasswordForm">
                        <div class="form-group">
                            <input type="email" class="form-control" id="forgotPasswordEmail" placeholder="Enter your email" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-teal" onclick="sendTemporaryPassword()">Send Temporary Password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
    <script>
        function sendTemporaryPassword() {
            var email = document.getElementById('forgotPasswordEmail').value;
            if (email) {
                // Here you would typically send an AJAX request to your server
                // For this example, we'll just show an alert
                alert('A temporary password has been sent to ' + email);
                $('#forgotPasswordModal').modal('hide');
            } else {
                alert('Please enter a valid email address.');
            }
        }
    </script>
</body>
</html>
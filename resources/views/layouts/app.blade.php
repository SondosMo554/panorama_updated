<head>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <title>بانوراما القصيم للبرمجه و التصميم</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        #video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            object-fit: cover;
        }

        #main {
            position: relative;
            z-index: 1;
        }
        .alert-success {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-align: center;
            position: fixed;
            top: 100px;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .alert-success.hide {
            opacity: 0;
        }

        .alert-success {
            animation: slideIn 0.5s ease-out, slideOut 0.5s ease-in 4.5s forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>
<body class="is-preload">

    <video autoplay muted loop id="video-background">
        <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Success message -->
    @if(session('success'))
        <div id="success-message" class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div id="wrapper">
        <div id="main">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>

    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('hide');
                }, 5000); 
            }
        });
    </script>
</body>

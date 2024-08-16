<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #header {
            background-color: #030420;
            color: white;
            padding: 10px 40px;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            box-sizing: border-box;
        }

        #header .inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #header .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            margin-right: 20px;
        }

        #header .logo img {
            margin-left: 10px;
        }

        #nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        #nav ul li {
            margin-left: 20px;
        }

        #nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        #nav ul li a:hover,
        #nav ul li a:focus {
            color: #ff5d0d; /* Orange color */
        }

        #nav ul li a.active {
            color: #0288d1; /* Blue color for the active link */
            font-weight: bold; /* Optional: make the active link bold */
        }

        #nav ul li.login-button a {
            background-color: #ff5d0d;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            margin-left: 20px;
            text-align: center;
            display: inline-block;
        }

        #nav ul li.login-button a:hover,
        #nav ul li.login-button a:focus {
            background-color: #397eb7; /* New background color on hover */
            color: white; /* Text color remains white on hover */
        }

        body {
            margin: 0;
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <header id="header">
        <div class="inner">
            <a href="{{ url('/') }}" class="logo">
                <img width="40" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>

            <nav id="nav">
                <ul>
                    <li class="login-button">
                        <a href="{{ url('/login') }}" class="{{ Request::is('login') ? 'active' : '' }}">تسجيل الدخول</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">تواصل معنا</a>
                    </li>
                    <li>
                        <a href="{{ url('/clients') }}" class="{{ Request::is('clients') ? 'active' : '' }}">عملائنا</a>
                    </li>
                    <li>
                        <a href="{{ url('/services') }}" class="{{ Request::is('services') ? 'active' : '' }}">خدماتنا</a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">من نحن</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">الصفحة الرئيسية</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>

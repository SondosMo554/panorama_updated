
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #header_admin {
            background-color: #030420;
            color: white;
            padding: 10px 40px;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #header_admin .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
        }

        #header_admin .logo img {
            margin-left: 10px;
        }

        #nav {
            margin-left: auto;
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
            font-weight: bold; /* Make the active link bold */
        }

        #nav ul li.logout a {
            background-color: #ff5d0d;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            margin-left: 20px;
            text-align: center;
            display: inline-block;
        }

        #nav ul li.logout a:hover,
        #nav ul li.logout a:focus {
            background-color: #397eb7; /* New background color on hover */
            color: white; /* Text color remains white on hover */
        }

        body {
            margin: 0;
            padding-top: 70px; /* Ensure the content is below the fixed header */
        }
    </style>
</head>
<body>
    <header id="header_admin">
        <a href="{{ url('admin/home') }}" class="logo">
            <img width="40" src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>

        <nav id="nav">
            <ul>
                <li class="logout">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        تسجيل الخروج
                    </a>
                </li>
                <li><a href="{{ route('view.messages') }}" class="{{ Route::currentRouteName() == 'view.messages' ? 'active' : '' }}">عرض الرسائل</a></li>
                <li><a href="{{ route('manage.clients') }}" class="{{ Route::currentRouteName() == 'manage.clients' ? 'active' : '' }}">إدارة العملاء</a></li>
                <li><a href="{{ route('manage.services') }}" class="{{ Route::currentRouteName() == 'manage.services' ? 'active' : '' }}">إدارة الخدمات</a></li>
                <li><a href="{{ route('admin_home') }}" class="{{ Route::currentRouteName() == 'admin_home' ? 'active' : '' }}">الصفحة الرئيسية</a></li>
            </ul>
        </nav>
    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

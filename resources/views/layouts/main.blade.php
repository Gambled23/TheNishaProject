<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="./resources/css/app.css" rel="stylesheet">
    <style>
        /* Small devices (phones, 640px and down) */
        @media only screen and (max-width: 640px) {
            .mx-64 {
                margin-left: 16px;
                margin-right: 16px;
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .mx-64 {
                margin-left: 64px;
                margin-right: 64px;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .mx-64 {
                margin-left: 128px;
                margin-right: 128px;
            }
        }
    </style>
</head>

<body class="
relative">
    <x-navbar/>
    <!-- Main card-->
    <div class=" bg-white mx-64 my-8 rounded-xl pt-4 py-4 md:py-8">
        @yield('body')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
</body>
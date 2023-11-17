<head>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>Dashboard</title>
</head>

<body class="text-gray-800 font-inter">

    <x-admin.side-bar />
    @yield('body')
</body>

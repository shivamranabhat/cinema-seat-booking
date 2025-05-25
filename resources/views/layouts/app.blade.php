<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | Plex Cinemas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{asset('assets/vendor/aos/dist/aos.css')}}" />

    <!-- Design System Css -->
    <link rel="stylesheet" href="{{asset('assets/css/main-ui.min.css?v=2.0.0')}}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.min.css?v=2.0.0')}}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{asset('assets/css/dark.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/colorpicker.css')}}" />

    <!-- Flash message Css -->
    <link rel="stylesheet" href="{{asset('assets/css/flash.css')}}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{asset('assets/css/customizer.min.css')}}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{asset('assets/css/rtl.min.css')}}" />


</head>

<body>

    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a class="navbar-brand d-flex align-items-center gap-1">
                <div class="logo-main">
                    <img src="{{asset('main/images/plex-logo.svg')}}" width="120" alt="logo">
                </div>
                <!--logo End-->
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" tabindex="-1">
                            <span class="default-icon">Pages</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(1) == 'dashboard' && request()->segment(2) ==  null ? 'active' : ''}}"
                            aria-current="page" href="{{route('dashboard')}}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="icon-20">
                                    <path opacity="0.4"
                                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'movie'? 'active' : ''}}"
                            href="{{route('movies')}}">
                            <i class="icon">
                                <svg fill="currentColor" class="icon-20" viewBox="0 -13.54 122.88 122.88" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    style="enable-background:new 0 0 122.88 95.8" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path
                                                d="M12.14,0H32.8h29.43h28.8h19.71c3.34,0,6.38,1.37,8.58,3.56c2.2,2.2,3.56,5.24,3.56,8.58v7.13v57.25v7.09 c0,3.34-1.37,6.38-3.56,8.58c-2.2,2.2-5.24,3.56-8.58,3.56h-19.2c-0.16,0.03-0.33,0.04-0.51,0.04c-0.17,0-0.34-0.01-0.51-0.04 H62.74c-0.16,0.03-0.33,0.04-0.51,0.04c-0.17,0-0.34-0.01-0.51-0.04H33.31c-0.16,0.03-0.33,0.04-0.51,0.04 c-0.17,0-0.34-0.01-0.51-0.04H12.14c-3.34,0-6.38-1.37-8.58-3.56S0,86.95,0,83.61v-7.09V19.27v-7.13C0,8.8,1.37,5.76,3.56,3.56 C5.76,1.37,8.8,0,12.14,0L12.14,0z M55.19,31.24l20.53,14.32c0.32,0.2,0.61,0.48,0.84,0.81c0.92,1.33,0.58,3.14-0.74,4.06 L55.37,64.57c-0.5,0.41-1.15,0.66-1.85,0.66c-1.62,0-2.93-1.31-2.93-2.93V33.63h0.01c0-0.58,0.17-1.16,0.52-1.67 C52.05,30.64,53.87,30.32,55.19,31.24L55.19,31.24z M93.95,79.45V89.9h16.78c1.73,0,3.3-0.71,4.44-1.85 c1.14-1.14,1.85-2.71,1.85-4.44v-4.16H93.95L93.95,79.45z M88.1,89.9V79.45H65.16V89.9H88.1L88.1,89.9z M59.31,89.9V79.45H35.73 V89.9H59.31L59.31,89.9z M29.87,89.9V79.45H5.85v4.16c0,1.73,0.71,3.3,1.85,4.44c1.14,1.14,2.71,1.85,4.44,1.85H29.87L29.87,89.9z M5.85,73.6H32.8h29.43h28.8h26V22.2h-26h-28.8H32.8H5.85V73.6L5.85,73.6z M88.1,16.35V5.85H65.16v10.49H88.1L88.1,16.35z M93.95,5.85v10.49h23.07v-4.2c0-1.73-0.71-3.3-1.85-4.44c-1.14-1.14-2.71-1.85-4.44-1.85H93.95L93.95,5.85z M59.31,16.35V5.85 H35.73v10.49H59.31L59.31,16.35z M29.87,16.35V5.85H12.14c-1.73,0-3.3,0.71-4.44,1.85c-1.14,1.14-1.85,2.71-1.85,4.44v4.2H29.87 L29.87,16.35z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>

                            </i>
                            <span class="item-name">Movie</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'theater'? 'active' : ''}}"
                            href="{{route('theaters')}}">
                            <i class="icon">
                                <svg viewBox="0 0 512 512" class="icon-20" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill="currentColor"
                                            d="M32 32v224h448V32H32zm50.68 289.7c-14.05 0-24.17 1-30.73 3-6.57 2-9.44 4.3-11.93 8.6-1.46 2.5-2.56 6.2-3.41 10.9 4.88.7 9.36 1.5 13.48 2.8 10 3 18.17 9 23.1 17.3C78.12 356 86.27 350 96.27 347c8.93-2.7 19.43-3.8 32.43-4-.8-4.2-1.8-7.4-3.2-9.7-2.5-4.3-5.4-6.6-12-8.6s-16.74-3-30.82-3zm115.52 0c-14.1 0-24.2 1-30.7 3-6.6 2-9.5 4.3-12 8.6-1.4 2.4-2.5 5.8-3.3 10.3 7.5.6 14 1.6 19.8 3.4 10 3 18.2 8.9 23.1 17.3 4.9-8.4 13-14.3 23.1-17.3 7.4-2.3 15.9-3.4 26-3.8-.8-4.2-1.8-7.5-3.2-9.9-2.5-4.3-5.4-6.6-12-8.6s-16.7-3-30.8-3zm115.5 0c-14.1 0-24.2 1-30.7 3-6.6 2-9.5 4.3-12 8.6-1.4 2.4-2.4 5.7-3.2 9.9 10.1.4 18.7 1.5 26.1 3.8 10 3 18.2 8.9 23.1 17.3 4.9-8.4 13-14.3 23.1-17.3 5.8-1.8 12.3-2.8 19.7-3.4-.8-4.5-1.9-7.9-3.3-10.3-2.5-4.3-5.4-6.6-12-8.6s-16.7-3-30.8-3zm115.5 0c-14.1 0-24.2 1-30.7 3-6.6 2-9.5 4.3-12 8.6-1.4 2.3-2.4 5.5-3.2 9.7 13.1.2 23.6 1.3 32.5 4 10 3 18.2 8.9 23.1 17.3 4.9-8.4 13-14.3 23.1-17.3 4.1-1.3 8.6-2.1 13.4-2.8-.8-4.7-1.9-8.4-3.4-10.9-2.5-4.3-5.4-6.6-12-8.6s-16.7-3-30.8-3zM134.1 361c-14.9 0-25.6 1-32.6 3.2-6.99 2.1-10.17 4.6-12.88 9.4-2.53 4.4-4.06 11.8-5 22.3 10.74.4 19.68 1.4 27.38 3.8 10 3 18.2 8.9 23.1 17.3 4.9-8.4 13-14.3 23.1-17.3 7.7-2.4 16.7-3.5 27.5-3.8-1-10.5-2.5-17.9-5-22.3-2.7-4.7-5.9-7.3-13-9.4-7-2.2-17.7-3.2-32.6-3.2zm121.9 0c-14.9 0-25.6 1-32.6 3.2-7 2.1-10.2 4.6-12.9 9.4-2.5 4.4-4 11.8-5 22.3 10.8.4 19.7 1.4 27.4 3.8 10 3 18.2 8.9 23.1 17.3 4.9-8.4 13-14.3 23.1-17.3 7.7-2.4 16.7-3.5 27.5-3.8-1-10.5-2.5-17.9-5-22.3-2.7-4.7-5.9-7.3-13-9.4-7-2.2-17.7-3.2-32.6-3.2zm121.9 0c-14.9 0-25.6 1-32.6 3.2-7 2.1-10.2 4.6-12.9 9.4-2.5 4.4-4 11.8-5 22.3 10.8.4 19.7 1.4 27.4 3.8 10 3 18.2 8.9 23.1 17.3 4.9-8.4 13-14.3 23.1-17.3 7.7-2.4 16.7-3.5 27.5-3.8-1-10.5-2.5-17.9-5-22.3-2.7-4.7-5.9-7.3-13-9.4-7-2.2-17.7-3.2-32.6-3.2zm-359.9.1v48.5c4.64-4.5 10.54-7.9 17.28-9.9 7.76-2.4 16.72-3.5 27.49-3.8-.93-10.5-2.48-17.9-5-22.3-2.71-4.7-5.9-7.3-12.93-9.4-6.07-1.9-14.94-2.9-26.84-3.1zm476 0c-11.9.2-20.8 1.2-26.8 3.1-7 2.1-10.2 4.6-12.9 9.4-2.5 4.4-4 11.8-5 22.3 10.8.4 19.7 1.4 27.4 3.8 6.7 2 12.6 5.4 17.3 9.9v-48.5zM73.1 413.7c-14.84 0-25.56 1-32.56 3.2-7.01 2.1-10.18 4.6-12.89 9.4-4.93 8.6-6.15 28.5-6.33 60.7H125c-.2-32.2-1.4-52.1-6.3-60.7-2.7-4.7-5.9-7.3-13-9.4-6.98-2.2-17.72-3.2-32.6-3.2zm121.9 0c-14.9 0-25.6 1-32.6 3.2-7 2.1-10.2 4.6-12.9 9.4-4.9 8.6-6.1 28.5-6.3 60.7h103.7c-.2-32.2-1.4-52.1-6.3-60.7-2.7-4.7-5.9-7.3-13-9.4-7-2.2-17.7-3.2-32.6-3.2zm121.9 0c-14.9 0-25.6 1-32.6 3.2-7 2.1-10.2 4.6-12.9 9.4-4.9 8.6-6.1 28.5-6.3 60.7h103.7c-.2-32.2-1.4-52.1-6.3-60.7-2.7-4.7-5.9-7.3-13-9.4-7-2.2-17.7-3.2-32.6-3.2zm121.9 0c-14.8 0-25.6 1-32.6 3.2-7 2.1-10.2 4.6-12.9 9.4-4.9 8.6-6.1 28.5-6.3 60.7h103.7c-.2-32.2-1.4-52.1-6.3-60.7-2.7-4.7-5.9-7.3-13-9.4-7-2.2-17.7-3.2-32.6-3.2z">
                                        </path>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Theater</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'seat'? 'active' : ''}}"
                            href="{{route('seats')}}">
                            <i class="icon">
                                <svg fill="currentColor" class="icon-20" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 199.666 199.666" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M165.416,182.417c-1.104,0-2-0.896-2-2v-8.932h-61.583v8.932c0,1.104-0.896,2-2,2s-2-0.896-2-2v-8.932H36.61v8.932 c0,1.104-0.896,2-2,2s-2-0.896-2-2v-47.932c0-1.104,0.896-2,2-2s2,0.896,2,2v35h61.223v-35c0-1.104,0.896-2,2-2s2,0.896,2,2v35 h61.583v-35c0-1.104,0.896-2,2-2s2,0.896,2,2v47.932C167.416,181.521,166.521,182.417,165.416,182.417z M155.461,160.053h-46.2 c-3.482,0-6.316-2.834-6.316-6.316v-1.333c0-2.537,1.503-4.729,3.666-5.733v-32.602c0-5.011,1.438-9.692,3.925-13.652H89.2 c2.486,3.96,3.925,8.642,3.925,13.652v32.602c2.163,1.004,3.666,3.196,3.666,5.733v1.333c0,3.482-2.834,6.316-6.316,6.316h-46.2 c-3.482,0-6.316-2.834-6.316-6.316v-1.333c0-2.537,1.504-4.73,3.667-5.733v-32.602c0-5.011,1.438-9.692,3.925-13.652H4v8.931 c0,1.104-0.896,2-2,2s-2-0.896-2-2V61.417c0-1.104,0.896-2,2-2s2,0.896,2,2v35h44.645c4.236-4.493,10.066-7.467,16.577-8.009V61.417 c0-1.104,0.896-2,2-2s2,0.896,2,2v26.968c6.635,0.472,12.581,3.469,16.884,8.032h27.524c4.287-4.547,10.209-7.539,16.814-8.027 V61.417c0-1.104,0.896-2,2-2s2,0.896,2,2v26.986c6.539,0.525,12.395,3.505,16.646,8.014h44.575v-35c0-1.104,0.896-2,2-2s2,0.896,2,2 v47.931c0,1.104-0.896,2-2,2s-2-0.896-2-2v-8.931h-41.48c2.486,3.96,3.925,8.642,3.925,13.652v32.602 c2.163,1.003,3.667,3.196,3.667,5.733v1.333C161.777,157.219,158.943,160.053,155.461,160.053z M109.261,150.087 c-1.277,0-2.316,1.039-2.316,2.316v1.333c0,1.277,1.039,2.316,2.316,2.316h46.2c1.277,0,2.316-1.039,2.316-2.316v-1.333 c0-1.277-1.039-2.316-2.316-2.316H109.261z M44.274,150.087c-1.277,0-2.316,1.039-2.316,2.316v1.333 c0,1.277,1.039,2.316,2.316,2.316h46.2c1.277,0,2.316-1.039,2.316-2.316v-1.333c0-1.277-1.039-2.316-2.316-2.316H44.274z M110.61,145.856h43.5v-31.787c0-11.993-9.757-21.75-21.75-21.75s-21.75,9.757-21.75,21.75V145.856z M45.625,145.856h43.5v-31.787 c0-11.993-9.757-21.75-21.75-21.75s-21.75,9.757-21.75,21.75V145.856z M187.836,88.984h-46.2c-3.482,0-6.316-2.834-6.316-6.316 v-1.333c0-2.537,1.503-4.729,3.666-5.733V43c0-14.198,11.552-25.75,25.75-25.75s25.75,11.552,25.75,25.75v32.602 c2.163,1.003,3.667,3.196,3.667,5.733v1.333C194.152,86.15,191.318,88.984,187.836,88.984z M141.636,79.018 c-1.277,0-2.316,1.039-2.316,2.316v1.333c0,1.277,1.039,2.316,2.316,2.316h46.2c1.277,0,2.316-1.039,2.316-2.316v-1.333 c0-1.277-1.039-2.316-2.316-2.316H141.636z M142.985,74.787h43.5V43c0-11.993-9.757-21.75-21.75-21.75s-21.75,9.757-21.75,21.75 V74.787z M122.85,88.984h-46.2c-3.482,0-6.316-2.834-6.316-6.316v-1.333c0-2.537,1.504-4.73,3.667-5.733V43 c0-14.198,11.552-25.75,25.75-25.75S125.5,28.801,125.5,43v32.602c2.163,1.004,3.666,3.196,3.666,5.733v1.333 C129.166,86.15,126.332,88.984,122.85,88.984z M76.649,79.018c-1.277,0-2.316,1.039-2.316,2.316v1.333 c0,1.277,1.039,2.316,2.316,2.316h46.2c1.277,0,2.316-1.039,2.316-2.316v-1.333c0-1.277-1.039-2.316-2.316-2.316H76.649z M78,74.787 h43.5V43c0-11.993-9.757-21.75-21.75-21.75S78,31.006,78,43V74.787z M57.863,88.984h-46.2c-3.482,0-6.316-2.834-6.316-6.316v-1.333 c0-2.537,1.504-4.73,3.667-5.733V43c0-14.198,11.552-25.75,25.75-25.75S60.514,28.801,60.514,43v32.602 c2.163,1.004,3.667,3.196,3.667,5.733v1.333C64.181,86.15,61.347,88.984,57.863,88.984z M11.663,79.018 c-1.277,0-2.316,1.039-2.316,2.316v1.333c0,1.277,1.039,2.316,2.316,2.316h46.2c1.277,0,2.317-1.039,2.317-2.316v-1.333 c0-1.277-1.04-2.316-2.317-2.316H11.663z M13.014,74.787h43.5V43c0-11.993-9.757-21.75-21.75-21.75S13.014,31.006,13.014,43V74.787z ">
                                        </path>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Seats</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'booking'? 'active' : ''}}"
                            href="{{route('bookings')}}">
                            <i class="icon">
                                <svg class="icon-20" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M3 11.0975V16.0909C3 19.1875 3 20.7358 3.73411 21.4123C4.08422 21.735 4.52615 21.9377 4.99692 21.9915C5.98402 22.1045 7.13675 21.0849 9.44216 19.0458C10.4612 18.1445 10.9708 17.6938 11.5603 17.5751C11.8506 17.5166 12.1494 17.5166 12.4397 17.5751C13.0292 17.6938 13.5388 18.1445 14.5578 19.0458C16.8633 21.0849 18.016 22.1045 19.0031 21.9915C19.4739 21.9377 19.9158 21.735 20.2659 21.4123C21 20.7358 21 19.1875 21 16.0909V11.0975C21 6.80891 21 4.6646 19.682 3.3323C18.364 2 16.2426 2 12 2C7.75736 2 5.63604 2 4.31802 3.3323C3.5108 4.14827 3.19796 5.26881 3.07672 7"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M15 6H9" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round">
                                        </path>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Bookings</span>
                        </a>
                    </li>

                    <li>
                        <hr class="hr-horizontal">
                    </li>


                    <li>
                        <hr class="hr-horizontal">
                    </li>

                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" tabindex="-1">
                            <span class="default-icon">Settings</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'account'? 'active' : ''}}"
                            href="{{route('accounts')}}">
                            <i class="icon">
                                <svg viewBox="0 0 512 512" class="icon-20" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="currentColor">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>user-management</title>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Mask" fill="currentColor"
                                                transform="translate(64.000000, 64.000000)">
                                                <path
                                                    d="M298.666667,170.666667 C345.813333,170.666667 384,208.853333 384,256 L384,256 L384,384 L1.42108547e-14,384 L1.42108547e-14,298.666667 C1.42108547e-14,251.52 38.1866667,213.333333 85.3333333,213.333333 L85.3333333,213.333333 L160.853333,213.333333 C175.573333,187.733333 203.093333,170.666667 234.666667,170.666667 L234.666667,170.666667 Z M298.666667,213.333333 L234.666667,213.333333 C211.2,213.333333 192,232.533333 192,256 L192,256 L192,341.333333 L341.333333,341.333333 L341.333333,256 C341.333333,232.533333 322.133333,213.333333 298.666667,213.333333 L298.666667,213.333333 Z M149.333333,256 L85.3333333,256 C61.8666667,256 42.6666667,275.2 42.6666667,298.666667 L42.6666667,298.666667 L42.6666667,341.333333 L149.333333,341.333333 L149.333333,256 Z M106.666667,64 C141.952,64 170.666667,92.7146667 170.666667,128 C170.666667,163.285333 141.952,192 106.666667,192 C71.3813333,192 42.6666667,163.285333 42.6666667,128 C42.6666667,92.7146667 71.3813333,64 106.666667,64 Z M106.666667,104 C93.44,104 82.6666667,114.752 82.6666667,128 C82.6666667,141.248 93.44,152 106.666667,152 C119.893333,152 130.666667,141.248 130.666667,128 C130.666667,114.752 119.893333,104 106.666667,104 Z M266.666667,1.42108547e-14 C307.84,1.42108547e-14 341.333333,33.4933333 341.333333,74.6666667 C341.333333,115.84 307.84,149.333333 266.666667,149.333333 C225.493333,149.333333 192,115.84 192,74.6666667 C192,33.4933333 225.493333,1.42108547e-14 266.666667,1.42108547e-14 Z M266.666667,42.6666667 C249.024,42.6666667 234.666667,57.024 234.666667,74.6666667 C234.666667,92.3093333 249.024,106.666667 266.666667,106.666667 C284.309333,106.666667 298.666667,92.3093333 298.666667,74.6666667 C298.666667,57.024 284.309333,42.6666667 266.666667,42.6666667 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Accounts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'profile'? 'active' : ''}}"
                            href="{{route('admin.profile')}}">
                            <i class="icon">
                                <svg viewBox="0 0 20 20" class="icon-20" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="none">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>profile_round [#1342]</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs> </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Dribbble-Light-Preview"
                                                transform="translate(-140.000000, -2159.000000)" fill="currentColor">
                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <path
                                                        d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598"
                                                        id="profile_round-[#1342]"> </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item mb-5">
                        <form method="POST" action="{{route('admin.logout')}}"
                            class="nav-link d-flex align-items-center">
                            @csrf
                            <i class="icon">
                                <svg viewBox="0 0 24 24" class="icon-20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M11 12H21M21 12L18.5 9.5M21 12L18.5 14.5"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </i>
                            <input type="submit" class="text-white" value="Logout"
                                style="border:none; background:none; padding:0; margin-left:1rem">
                        </form>
                    </li>

                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="#" class="navbar-brand">
                        <!--Logo start-->
                        <!--logo End-->

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <img src="{{asset('main/images/plex-logo.svg')}}" class="rounded-circle" width="50"
                                    alt="Logo">
                            </div>
                        </div>
                        <!--logo End-->
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown">
                                @if(auth()->user())
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="rounded-circle p-2" style="border:1px solid #e7d300">
                                        <img src="{{asset('main/images/plex-logo.svg')}}" alt="User-Profile"
                                            class="img-fluid avatar avatar-35">
                                    </span>
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">{{auth()->user()->name}}</h6>
                                        <p class="mb-0 caption-sub-title">{{auth()->user()->email}}</p>
                                    </div>
                                </a>
                                @endif
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('admin.profile')}}">Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{route('admin.logout')}}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="text-capitalize mt-5">Dashboard <svg class="icon-20" width="20"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.5 5L15.5 12L8.5 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        @if (request()->segment(2)
                                        != '')
                                        {{str_replace('-',' ',request()->segment(2))}}
                                        @else
                                        Main
                                        @endif
                                      
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header1.png')}}" alt="header"
                        class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header2.png')}}" alt="header"
                        class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header3.png')}}" alt="header"
                        class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header4.png')}}" alt="header"
                        class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header5.png')}}" alt="header"
                        class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        {{$slot}}
        @if(session()->has('success') || session()->has('message'))
        <div class="success flash p-3 p-md-4 p-lg-3 p-xl-3 position-fixed bg-white rounded" id="flash-success">
            <div class="d-flex flex-row align-item-center gap-3">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path opacity="0.5"
                            d="M44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24Z"
                            fill="#92BCAE" />
                        <path
                            d="M32.0607 17.9393C32.6464 18.5251 32.6464 19.4749 32.0607 20.0607L22.0607 30.0607C21.4749 30.6464 20.5251 30.6464 19.9393 30.0607L15.9393 26.0607C15.3536 25.4749 15.3536 24.5251 15.9393 23.9393C16.5251 23.3536 17.4749 23.3536 18.0607 23.9393L21 26.8787L25.4697 22.409L29.9393 17.9393C30.5251 17.3536 31.4749 17.3536 32.0607 17.9393Z"
                            fill="#081C15" />
                    </svg>
                </div>
                <div class="message d-flex flex-column flex-start justify-content-center">
                    <h5>
                        Successfull
                    </h5>
                    <p class="mb-0"> {{session('success') ? session('success') : session('message')}} </p>
                </div>
            </div>
        </div>
        @endif
        @if(session()->has('error'))
        <div id="flash-error" class="error flash p-3 p-md-4 p-lg-3 p-xl-3 position-fixed bg-white rounded">
            <div class="d-flex flex-row align-item-center gap-3">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path opacity="0.5"
                            d="M44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24Z"
                            fill="#FF6F6F" />
                        <path
                            d="M24 12.5C24.8284 12.5 25.5 13.1716 25.5 14V26C25.5 26.8284 24.8284 27.5 24 27.5C23.1716 27.5 22.5 26.8284 22.5 26V14C22.5 13.1716 23.1716 12.5 24 12.5Z"
                            fill="#081C15" />
                        <path
                            d="M24 34C25.1046 34 26 33.1046 26 32C26 30.8954 25.1046 30 24 30C22.8954 30 22 30.8954 22 32C22 33.1046 22.8954 34 24 34Z"
                            fill="#081C15" />
                    </svg>
                </div>
                <div class="message d-flex flex-column gap-2 flex-start justify-content-center">
                    <h5>
                        {{ session('error') }}
                    </h5>
                    <p class="mb-0">Please try again later!</p>
                </div>
            </div>
        </div>
        @endif

    </main>
    <a class="btn btn-fixed-end btn-primary btn-icon btn-setting" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <svg width="24" viewBox="0 0 24 24" class="animated-rotate icon-24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></circle>
        </svg>
    </a>
    <!-- Wrapper End-->
    <!-- offcanvas start -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" data-bs-scroll="true"
        data-bs-backdrop="true" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center">
                <h3 class="offcanvas-title me-3" id="offcanvasExampleLabel">Settings</h3>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body data-scrollbar">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-3">Scheme</h5>
                    <div class="d-grid gap-3 grid-cols-3 mb-4">
                        <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="auto">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z" />
                            </svg>
                            <span class="ms-2 "> Auto </span>
                        </div>

                        <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="dark">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                            </svg>
                            <span class="ms-2 "> Dark </span>
                        </div>
                        <div class="btn btn-border active" data-setting="color-mode" data-name="color"
                            data-value="light">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z" />
                            </svg>
                            <span class="ms-2 "> Light</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mt-4 mb-3">Color Customizer</h5>
                        <button class="btn btn-transparent p-0 border-0" data-value="theme-color-default"
                            data-info="#079aa2" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Default">
                            <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z"
                                    fill="#31BAF1" />
                                <path
                                    d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z"
                                    fill="#0169CA" />
                            </svg>
                        </button>
                    </div>
                    <div class="grid-cols-5 mb-4 d-grid gap-x-2">
                        <div class="btn btn-border bg-transparent" data-value="theme-color-blue" data-info="#573BFF"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-1">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#00C3F9" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-gray" data-info="#FD8D00"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-2">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#91969E" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-red" data-info="#366AF0"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-3">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#DB5363" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-yellow" data-info="#6410F1"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-4">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#EA6A12" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-pink" data-info="#25C799"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-5">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#E586B3" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" />
                            </svg>
                        </div>

                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mb-3 mt-4">Scheme Direction</h5>
                    <div class="d-grid gap-3 grid-cols-2 mb-4">
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/01.png')}}" alt="ltr"
                                class="mode dark-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="dir-mode" data-name="dir" data-value="ltr">
                            <img src="{{asset('assets/images/settings/light/01.png')}}" alt="ltr"
                                class="mode light-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="dir-mode" data-name="dir" data-value="ltr">
                            <span class=" mt-2"> LTR </span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/02.png')}}" alt=""
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="dir-mode"
                                data-name="dir" data-value="rtl">
                            <img src="{{asset('assets/images/settings/light/02.png')}}" alt=""
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="dir-mode"
                                data-name="dir" data-value="rtl">
                            <span class="mt-2 "> RTL </span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Color</h5>
                    <div class="d-grid gap-3 grid-cols-2 mb-4">
                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-white">
                            <span class=""> Default </span>
                        </div>
                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-dark">
                            <span class=""> Dark </span>
                        </div>
                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-color">
                            <span class=""> Color </span>
                        </div>

                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-transparent">
                            <span class=""> Transparent </span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Types</h5>
                    <div class="d-grid gap-3 grid-cols-3 mb-4">
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/03.png')}}" alt="mini"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-mini">
                            <img src="{{asset('assets/images/settings/light/03.png')}}" alt="mini"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-mini">
                            <span class="mt-2">Mini</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/04.png')}}" alt="hover"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-hover" data-extra-value="sidebar-mini">
                            <img src="{{asset('assets/images/settings/light/04.png')}}" alt="hover"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-hover" data-extra-value="sidebar-mini">
                            <span class="mt-2">Hover</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/05.png')}}" alt="boxed"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-boxed">
                            <img src="{{asset('assets/images/settings/light/05.png')}}" alt="boxed"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-boxed">
                            <span class="mt-2">Boxed</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Active Style</h5>
                    <div class="d-grid gap-3 grid-cols-2 mb-4">
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/06.png')}}" alt="rounded-one-side"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-rounded">
                            <img src="{{asset('assets/images/settings/light/06.png')}}" alt="rounded-one-side"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-rounded">
                            <span class="mt-2">Rounded One Side</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/07.png')}}" alt="rounded-all"
                                class="mode dark-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded-all">
                            <img src="{{asset('assets/images/settings/light/07.png')}}" alt="rounded-all"
                                class="mode light-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded-all">
                            <span class="mt-2">Rounded All</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/08.png')}}" alt="pill-one-side"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill">
                            <img src="{{asset('assets/images/settings/light/09.png')}}" alt="pill-one-side"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill">
                            <span class="mt-2">Pill One Side</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/09.png')}}" alt="pill-all"
                                class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill-all">
                            <img src="{{asset('assets/images/settings/light/08.png')}}" alt="pill-all"
                                class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill-all">
                            <span class="mt-2">Pill All</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Navbar Style</h5>
                    <div class="d-grid gap-3 grid-cols-2 ">
                        <div class=" text-center">
                            <img src="{{asset('assets/images/settings/dark/11.png')}}" alt="image"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="nav-glass">
                            <img src="{{asset('assets/images/settings/light/10.png')}}" alt="image"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="nav-glass">
                            <span class="mt-2">Glass</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/10.png')}}" alt="color"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar-header" data-name="navbar-type" data-value="navs-bg-color">
                            <img src="{{asset('assets/images/settings/light/11.png')}}" alt="color"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar-header" data-name="navbar-type" data-value="navs-bg-color">
                            <span class="mt-2">Color</span>
                        </div>
                        <div class=" text-center">
                            <img src="{{asset('assets/images/settings/dark/12.png')}}" alt="sticky"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-sticky">
                            <img src="{{asset('assets/images/settings/light/12.png')}}" alt="sticky"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-sticky">
                            <span class="mt-2">Sticky</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/13.png')}}" alt="transparent"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-transparent">
                            <img src="{{asset('assets/images/settings/light/13.png')}}" alt="transparent"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-transparent">
                            <span class="mt-2">Transparent</span>
                        </div>
                        <div class="btn btn-border active col-span-full mt-4 d-block" data-setting="navbar"
                            data-name="navbar-default" data-value="default">
                            <span class=""> Default Navbar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="{{asset('assets/js/core/libs.min.js')}}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{asset('assets/js/core/external.min.js')}}"></script>

    <!-- fslightbox Script -->
    <script src="{{asset('assets/js/plugins/fslightbox.js')}}"></script>

    <!-- Settings Script -->
    <script src="{{asset('assets/js/plugins/setting.js')}}"></script>

    <!-- Slider-tab Script -->
    <script src="{{asset('assets/js/plugins/slider-tabs.js')}}"></script>

    <!-- Form Wizard Script -->
    <script src="{{asset('assets/js/plugins/form-wizard.js')}}"></script>

    <!-- AOS Animation Plugin-->
    <script src="{{asset('assets/vendor/aos/dist/aos.js')}}"></script>
    <!-- App Script -->
    @stack('scripts')
    <script src="{{asset('assets/js/main-ui.js')}}" defer></script>
    <script src="{{asset('assets/js/flash.js')}}" defer></script>

</body>

</html>
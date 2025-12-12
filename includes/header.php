<?php
// header.php
// วางไฟล์นี้ไว้ที่ root หรือ folder includes แล้วเรียกด้วย include 'includes/header.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>GeoTrip Mockup</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        .hotel-card-img {
            min-height: 160px;
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-800">
    <!-- NAVBAR -->
    <header class="w-full bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center">
            <div class="flex items-center gap-3">
                <img src="uploads/logo-Cutfx7YM.png" alt="GeoTrip" class="h-10 w-auto object-contain">

                <nav class="hidden md:flex items-center gap-2 text-sm text-slate-700 ml-6">
                    <button class="flex items-center gap-1 px-3 py-2 rounded-md hover:bg-slate-100 hover:text-blue-700">Home <i class="fa-solid fa-angle-down fa-sm"></i></button>

                    <div class="relative group">
                        <button class="flex items-center gap-1 px-3 py-2 rounded-md hover:bg-slate-100 hover:text-blue-700">Listing <i class="fa-solid fa-angle-down fa-sm"></i></button>
                        <div class="absolute left-0 top-full mt-2 hidden group-hover:block bg-white shadow-lg rounded-md w-44 py-2">
                            <a class="block px-4 py-2 text-sm hover:bg-blue-50" href="#">Hotels</a>
                            <a class="block px-4 py-2 text-sm hover:bg-blue-50" href="#">Tours</a>
                            <a class="block px-4 py-2 text-sm hover:bg-blue-50" href="#">Restaurants</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center gap-1 px-3 py-2 rounded-md hover:bg-slate-100 hover:text-blue-700">Pages <i class="fa-solid fa-angle-down fa-sm"></i></button>
                        <div class="absolute left-0 top-full mt-2 hidden group-hover:block bg-white shadow-lg rounded-md w-44 py-2">
                            <a class="block px-4 py-2 text-sm hover:bg-blue-50" href="#">About</a>
                            <a class="block px-4 py-2 text-sm hover:bg-blue-50" href="#">Contact</a>
                        </div>
                    </div>

                    <button class="flex items-center gap-1 px-3 py-2 rounded-md hover:bg-slate-100 hover:text-blue-700">Menu <i class="fa-solid fa-angle-down fa-sm"></i></button>
                </nav>
            </div>

            <div class="ml-auto flex items-center gap-3">
                <button class="hidden md:inline flex items-center gap-2 text-slate-700 px-3 py-2 rounded-md hover:text-blue-700">
                    INR <i class="fa-solid fa-globe"></i>
                </button>

                <button class="bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-circle-user text-xl"></i> Sign In / Register
                </button>
            </div>
        </div>
    </header>

    <!-- SEARCH BAR -->
    <section class="bg-blue-700 py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white/5 rounded-2xl p-4">
                <div class="grid gap-4 md:grid-cols-[2fr,2fr,1.5fr,1fr]">
                    <div class="flex flex-col">
                        <label class="text-xs font-semibold text-white uppercase tracking-wide mb-1">Where</label>
                        <div class="bg-white rounded-xl px-4 py-3 flex items-center gap-3">
                            <span class="w-9 h-9 rounded-md border flex items-center justify-center text-slate-500"><i class="fa-solid fa-location-dot"></i></span>
                            <input type="text" placeholder="Going To" class="w-full outline-none text-sm font-medium text-slate-700" />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-xs font-semibold text-white uppercase tracking-wide mb-1">Checkin & Checkout</label>
                        <div class="bg-white rounded-xl px-4 py-3 flex items-center gap-3">
                            <span class="w-9 h-9 rounded-md border flex items-center justify-center text-slate-500">📅</span>
                            <input id="dateRange" type="text" placeholder="Choose Date"
                                class="w-full outline-none text-sm font-medium text-slate-700 cursor-pointer" readonly />

                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-xs font-semibold text-white uppercase tracking-wide mb-1">Guests & Rooms</label>
                        <div class="bg-white rounded-xl px-4 py-3 flex items-center gap-3">
                            <span class="w-9 h-9 rounded-md border flex items-center justify-center text-slate-500">👤</span>
                            <input type="text" value="1 Room, 1 Adult" class="w-full outline-none text-sm font-medium text-slate-700" />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-xs font-semibold text-white uppercase tracking-wide mb-1 opacity-0">Search</label>
                        <button class="bg-yellow-400 hover:bg-yellow-500 rounded-xl text-slate-900 font-semibold text-sm flex items-center justify-center h-12">
                            <i class="fa-solid fa-magnifying-glass mr-2"></i> Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
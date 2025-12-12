<?php
// index.php
// สมมติว่า includes/header.php มี <html> <head> <body> และ includes/footer.php ปิด body/html
include 'includes/header.php';

// helper + sample data (ย้ายไป DB ได้ตามต้องการ)
function img_or_placeholder($path) {
    if (!empty($path) && file_exists($path)) return $path;
    return 'https://via.placeholder.com/800x600?text=No+Image';
}

$hotels = [
    ['title' => 'Hotel Chancellor@Orchard', 'location' => 'Waterloo and Southwark', 'distance' => '9.8 km from Delhi Airport', 'img' => 'uploads/hotel-1-CryAJkM6.jpg'],
    ['title' => 'Dorsett Singapore', 'location' => 'Waterloo and Southwark', 'distance' => '9.8 km from Delhi Airport', 'img' => 'uploads/hotel-2-CoM1FZJa.jpg'],
    ['title' => 'Royal Plaza on Scotts', 'location' => 'Waterloo and Southwark', 'distance' => '9.8 km from Delhi Airport', 'img' => 'uploads/hotel-3-CoU4Czun.jpg'],
    ['title' => 'Siloso Beach Resort - Sentosa', 'location' => 'Waterloo and Southwark', 'distance' => '9.8 km from Delhi Airport', 'img' => 'uploads/hotel-4-CfP0zQPJ.jpg'],
    ['title' => 'Mercure Singapore Tyrwhitt', 'location' => 'Waterloo and Southwark', 'distance' => '9.8 km from Delhi Airport', 'img' => 'uploads/hotel-5-DypnLWK8.jpg'],
    ['title' => 'Value Hotel Balestier', 'location' => 'Waterloo and Southwark', 'distance' => '9.8 km from Delhi Airport', 'img' => 'uploads/hotel-6-6q-5TYWe.jpg'],
    ['title' => 'Vigara Hotel Lavender', 'location' => 'Waterloo and Southwark', 'distance' => '9.8 km from Delhi Airport', 'img' => 'uploads/hotel-7-Bta0Yrlv.jpg'],
];

// helper function to render a card
function render_card($hotel) {
    $title = htmlspecialchars($hotel['title'], ENT_QUOTES);
    $location = htmlspecialchars($hotel['location'], ENT_QUOTES);
    $distance = htmlspecialchars($hotel['distance'], ENT_QUOTES);
    $img = img_or_placeholder($hotel['img']);
?>
    <style>
        .active-filter {
            background-color: #2563eb !important;
            /* blue-600 */
            color: white !important;
            border-color: #2563eb !important;
        }
    </style>

    <article class="bg-white rounded-2xl shadow-sm p-4 md:p-5">
        <div class="grid gap-4 items-start md:grid-cols-[1.5fr,2fr,1fr]">
            <!-- Image -->
            <div class="w-full md:w-auto">
                <div class="rounded-xl overflow-hidden h-96 md:h-60">
                    <img src="<?= $img ?>" alt="<?= $title ?>" class="w-full h-full object-cover">
                </div>
            </div>
            <!-- Content -->
            <div class="flex flex-col">
                <div>
                    <div class="text-yellow-400 text-xs mb-1">★★★★★</div>
                    <h3 class="text-xl font-semibold text-slate-800 leading-tight"><?= $title ?></h3>
                    <p class="text-xs text-slate-500 mt-1"><?= $location ?> · <?= $distance ?> · <a href="#" class="text-blue-700 underline">Show on Map</a></p>
                </div>
                <div class="mt-3 flex flex-wrap gap-2 text-[11px]">
                    <span class="border rounded-md px-2 py-1">Parking</span>
                    <span class="border rounded-md px-2 py-1">WiFi</span>
                    <span class="border rounded-md px-2 py-1">Eating</span>
                    <span class="border rounded-md px-2 py-1">Cooling</span>
                    <span class="border rounded-md px-2 py-1">Pet</span>
                </div>
                <div class="mt-4 text-sm text-slate-700">
                    <p class="font-medium">Standard Twin Double Room</p>
                    <p class="text-xs text-slate-500 mt-1">Last booked 25min ago</p>
                </div>
                <div class="mt-auto">
                    <div class="inline-block bg-emerald-100 text-emerald-700 text-[11px] font-semibold px-3 py-1 rounded-md">Free Cancellation, till 1 hour of Pick up</div>
                    <p class="text-[11px] text-slate-600 mt-2">Login &amp; get additional $15 Off Using <span class="text-blue-700 underline">Visa card</span></p>
                </div>
            </div>

            <!-- Price / CTA -->
            <div class="flex flex-col items-end justify-between">
                <div class="text-right">
                    <div class="text-xs text-slate-500">Exceptional</div>
                    <div class="inline-block bg-orange-400 text-white text-sm font-semibold rounded-md px-3 py-1 mt-1">4.8</div>
                    <div class="text-[11px] text-slate-500 mt-1">3,014 reviews</div>
                </div>

                <div class="mt-4 md:mt-0 text-right space-y-1">
                    <div class="inline-flex items-center gap-2 text-xs font-semibold">
                        <span class="bg-rose-100 text-rose-600 px-2 py-1 rounded-md">15% Off</span>
                    </div>
                    <div class="text-xs text-slate-400 line-through">US$79</div>
                    <div class="text-2xl font-bold text-rose-600">$59</div>
                    <div class="text-[11px] text-slate-500">+$22 taxes &amp; Fees · For 2 Nights</div>
                    <button class="mt-3 w-full md:w-auto bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold px-8 py-3 rounded-md flex items-center justify-center gap-2">
                        <span>See Availability</span>
                        <i class="fa-solid fa-arrow-trend-up" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </article>
<?php
}
?>
<!-- Main area -->
<main class="max-w-7xl mx-auto py-8 px-4 md:px-0 flex gap-6 items-start">

    <!-- Sidebar -->
    <aside class="md:w-1/3 lg:w-1/4 bg-white rounded-2xl shadow-sm p-5 space-y-6 self-start">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-slate-800">Filters</h2>
                <p class="text-xs text-slate-500">Showing 180 Hotels</p>
            </div>
            <button class="text-xs text-blue-700 font-medium">Clear All</button>
        </div>

        <!-- Bed Type -->
        <div class="border-t pt-4">
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Bed Type</h3>

            <ul class="grid grid-cols-2 gap-2 text-xs" id="bedTypeFilter">
                <li class="w-full">
                    <button data-value="1 Double Bed"
                        class="filter-btn border rounded-md py-2 w-full block text-center">
                        1 Double Bed
                    </button>
                </li>

                <li class="w-full">
                    <button data-value="2 Beds"
                        class="filter-btn border rounded-md py-2 w-full block text-center">
                        2 Beds
                    </button>
                </li>

                <li class="w-full">
                    <button data-value="1 Single Bed"
                        class="filter-btn border rounded-md py-2 w-full block text-center">
                        1 Single Bed
                    </button>
                </li>

                <li class="w-full">
                    <button data-value="3 Beds"
                        class="filter-btn border rounded-md py-2 w-full block text-center">
                        3 Beds
                    </button>
                </li>

                <li class="col-span-2 w-full">
                    <button data-value="King Bed"
                        class="filter-btn border rounded-md py-2 w-full block text-center">
                        King Bed
                    </button>
                </li>
            </ul>
        </div>

        <!-- Popular Filters -->
        <div class="border-t pt-4">
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Popular Filters</h3>
            <div class="space-y-3 text-sm">
                <label class="flex items-start gap-3"><input type="checkbox" class="w-4 h-4 mt-1"> Free Cancellation Available</label>
                <label class="flex items-start gap-3"><input type="checkbox" class="w-4 h-4 mt-1"> Book @ ₹1</label>
                <label class="flex items-start gap-3"><input type="checkbox" class="w-4 h-4 mt-1"> Pay At Hotel Available</label>
                <label class="flex items-start gap-3"><input type="checkbox" class="w-4 h-4 mt-1"> Free Breakfast Included</label>
            </div>
        </div>

        <!-- Pricing -->
        <div class="border-t pt-4">
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Pricing Range in US$</h3>
            <div class="flex gap-2 items-center">
                <input type="number" min="0" placeholder="Min" class="w-1/2 border rounded px-3 py-2 text-sm">
                <input type="number" min="0" placeholder="Max" class="w-1/2 border rounded px-3 py-2 text-sm">
            </div>
            <div class="mt-3">
                <input type="range" min="0" max="1000" value="200" class="w-full">
            </div>
        </div>

        <!-- Customer Ratings -->
        <div class="border-t pt-4">
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Customer Ratings</h3>
            <div class="space-y-3 text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="w-4 h-4">
                    <span class="flex items-center gap-2"><i class="text-amber-400">★</i> 4.5+</span>
                    <span class="ml-auto text-xs text-slate-400">16</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="w-4 h-4">
                    <span class="flex items-center gap-2"><i class="text-amber-400">★</i> 4+</span>
                    <span class="ml-auto text-xs text-slate-400">10</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="w-4 h-4">
                    <span class="flex items-center gap-2"><i class="text-amber-400">★</i> 3.5+</span>
                    <span class="ml-auto text-xs text-slate-400">8</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="w-4 h-4">
                    <span class="flex items-center gap-2"><i class="text-amber-400">★</i> 3+</span>
                    <span class="ml-auto text-xs text-slate-400">26</span>
                </label>
            </div>
        </div>

        <!-- Star Ratings -->
        <div class="border-t pt-4">
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Star Ratings</h3>
            <div class="space-y-3 text-sm">
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> <span class="text-amber-400">★★★★★</span></label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> <span class="text-amber-400">★★★★</span></label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> <span class="text-amber-400">★★★</span></label>
            </div>
        </div>

        <!-- Amenities -->
        <div class="border-t pt-4">
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Amenities</h3>
            <div class="grid gap-3 text-sm">
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Free Wifi</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Breakfast included</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Pool</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Free Parking</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Air Conditioning</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Spa</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Gym</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Restaurant</label>
            </div>
        </div>

        <!-- Fun Things -->
        <div class="border-t pt-4">
            <h3 class="text-sm font-semibold text-slate-800 mb-3">Fun Things To Do</h3>
            <div class="space-y-3 text-sm">
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Beach</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Fitness center</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Cycling</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Animation Show</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Shopping center</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Nightlife</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="w-4 h-4"> Sightseeing</label>
            </div>
        </div>

        <!-- Apply / Reset -->
        <div class="pt-2">
            <div class="flex gap-2">
                <button class="flex-1 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold px-4 py-2 rounded-md">Apply Filters</button>
                <button class="flex-1 bg-white border border-slate-200 text-sm px-4 py-2 rounded-md hover:bg-slate-50">Reset</button>
            </div>
        </div>

    </aside>

    <!-- Results -->
    <section class="flex-1 space-y-6">
        <!-- topbar -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="font-semibold text-slate-800">Showing <span class="font-bold">280</span> Search Results</h2>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 text-xs bg-white rounded-full px-3 py-1 shadow-sm">
                    <span class="inline-flex w-8 h-4 bg-slate-200 rounded-full items-center">
                        <span class="w-3 h-3 bg-white rounded-full ml-0.5"></span>
                    </span>
                    <span>Map</span>
                </button>

                <div class="bg-white rounded-full p-1 flex text-xs">
                    <button class="px-3 py-1 rounded-full bg-blue-700 text-white font-medium">Our Trending</button>
                    <button class="px-3 py-1 rounded-full text-slate-700">Most Popular</button>
                    <button class="px-3 py-1 rounded-full text-slate-700">Lowest Price</button>
                </div>
            </div>
        </div>

        <?php
        // show 2 cards
        $firstTwo = array_slice($hotels, 0, 2);
        foreach ($firstTwo as $h) render_card($h);
        ?>

        <!-- promo banner -->
        <div class="bg-emerald-600 text-white rounded-lg p-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center text-white text-xl"><i class="fa-solid fa-gift"></i></div>
                <div>
                    <div class="font-semibold text-lg">Start Exploring The World</div>
                    <div class="text-sm opacity-90">Book Flights Effortless and Earn $50+ for each booking with Booking.com</div>
                </div>
            </div>
            <button class="bg-white text-emerald-600 font-semibold px-4 py-2 rounded-md">Get Started</button>
        </div>

        <?php
        // show next 5 cards
        $nextFive = array_slice($hotels, 2, 5);
        foreach ($nextFive as $h) render_card($h);
        ?>

        <!-- pagination -->
        <div class="flex items-center justify-center mt-4">
            <nav class="inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a href="#" class="px-3 py-2 ml-0 leading-tight text-slate-700 bg-white border border-slate-200 rounded-l-md hover:bg-slate-50">Prev</a>
                <a href="#" class="px-3 py-2 leading-tight text-white bg-blue-700 border border-blue-700 hover:bg-blue-800">1</a>
                <a href="#" class="px-3 py-2 leading-tight text-slate-700 bg-white border border-slate-200 hover:bg-slate-50">2</a>
                <a href="#" class="px-3 py-2 leading-tight text-slate-700 bg-white border border-slate-200 hover:bg-slate-50">3</a>
                <a href="#" class="px-3 py-2 leading-tight text-slate-700 bg-white border border-slate-200 rounded-r-md hover:bg-slate-50">Next</a>
            </nav>
        </div>
    </section>
</main>
<script>
    flatpickr("#dateRange", {
        mode: "range", // เลือกหลายวัน (Check-in & Checkout)
        dateFormat: "d M Y",
        minDate: "today",
        animate: true,
        allowInput: false,
    });
    document.querySelectorAll("#bedTypeFilter .filter-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            btn.classList.toggle("active-filter");
            console.log("Selected filter:", btn.dataset.value);
        });
    });
</script>

<?php
include 'includes/footer.php';
?>
<?php

function h($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function bag_palette($type)
{
    $palettes = [
        'all'     => ['a' => '#8c5a32', 'b' => '#d8b188', 'c' => '#5a3a24', 'd' => '#f7efe6'],
        'travel'  => ['a' => '#4c5b7f', 'b' => '#c9d3eb', 'c' => '#2f3c59', 'd' => '#f7f5ef'],
        'kids'    => ['a' => '#ff9d6c', 'b' => '#8ba7ff', 'c' => '#70453a', 'd' => '#fff5ed'],
        'school'  => ['a' => '#5f7f63', 'b' => '#bfd6c0', 'c' => '#2f4b32', 'd' => '#f4f7f2'],
        'college' => ['a' => '#556b8d', 'b' => '#c8d5ea', 'c' => '#2c3f5c', 'd' => '#f3f6fb'],
        'office'  => ['a' => '#7a5d45', 'b' => '#d9c7b6', 'c' => '#4d3828', 'd' => '#faf5ef'],
        'laptop'  => ['a' => '#4d6578', 'b' => '#b9d1e0', 'c' => '#2b4354', 'd' => '#f1f7fa'],
        'hand'    => ['a' => '#8a5570', 'b' => '#e0bfd0', 'c' => '#5a3146', 'd' => '#faf3f7'],
        'tote'    => ['a' => '#9c6f4a', 'b' => '#ecd3bd', 'c' => '#6b472a', 'd' => '#fbf6f1'],
        'gym'     => ['a' => '#436a68', 'b' => '#b7d9d6', 'c' => '#224846', 'd' => '#f2f8f7'],
        'party'   => ['a' => '#6f4b7a', 'b' => '#d8c0e2', 'c' => '#43294b', 'd' => '#f8f2fb'],
        'mini'    => ['a' => '#b76a64', 'b' => '#f0c8c3', 'c' => '#7d3f3a', 'd' => '#fdf5f4'],
        'trolley' => ['a' => '#566b87', 'b' => '#c7d3e3', 'c' => '#2f4056', 'd' => '#f2f5f9'],
    ];

    return $palettes[$type] ?? $palettes['all'];
}

function bag_svg($type, $label)
{
    $p = bag_palette($type);
    $label = h($label);

    if (in_array($type, ['school', 'kids', 'college'], true)) {
        $art = '
        <g transform="translate(180 90)">
            <path d="M160 92 C160 28 368 28 368 92" fill="none" stroke="' . $p['c'] . '" stroke-width="18" stroke-linecap="round"/>
            <path d="M146 146 C112 160 92 190 92 235 L92 412 C92 462 132 502 182 502 L350 502 C400 502 440 462 440 412 L440 235 C440 190 420 160 386 146 Z" fill="' . $p['a'] . '"/>
            <rect x="146" y="200" width="240" height="116" rx="30" fill="' . $p['b'] . '" opacity=".78"/>
            <rect x="174" y="344" width="184" height="104" rx="24" fill="' . $p['c'] . '" opacity=".18"/>
            <path d="M112 228 C50 264 52 426 82 474" fill="none" stroke="' . $p['c'] . '" stroke-width="18" opacity=".42" stroke-linecap="round"/>
            <path d="M420 228 C482 264 480 426 450 474" fill="none" stroke="' . $p['c'] . '" stroke-width="18" opacity=".42" stroke-linecap="round"/>
        </g>';
    } elseif (in_array($type, ['office', 'laptop', 'tote'], true)) {
        $art = '
        <g transform="translate(150 95)">
            <path d="M190 90 C190 18 320 18 320 90" fill="none" stroke="' . $p['c'] . '" stroke-width="18" stroke-linecap="round"/>
            <path d="M320 90 C320 18 450 18 450 90" fill="none" stroke="' . $p['c'] . '" stroke-width="18" stroke-linecap="round"/>
            <path d="M130 140 L510 140 L480 500 Q475 538 436 538 L204 538 Q165 538 160 500 Z" fill="' . $p['a'] . '"/>
            <rect x="198" y="212" width="244" height="150" rx="26" fill="' . $p['b'] . '" opacity=".78"/>
            <rect x="260" y="140" width="120" height="24" rx="10" fill="' . $p['c'] . '" opacity=".35"/>
        </g>';
    } elseif (in_array($type, ['hand', 'party', 'mini'], true)) {
        $art = '
        <g transform="translate(170 115)">
            <path d="M220 120 C220 34 430 34 430 120" fill="none" stroke="' . $p['c'] . '" stroke-width="20" stroke-linecap="round"/>
            <rect x="144" y="120" width="364" height="272" rx="72" fill="' . $p['a'] . '"/>
            <rect x="196" y="192" width="260" height="110" rx="26" fill="' . $p['b'] . '" opacity=".78"/>
            <circle cx="326" cy="247" r="18" fill="' . $p['c'] . '" opacity=".45"/>
            <rect x="306" y="240" width="40" height="40" rx="10" fill="#f3ead6"/>
        </g>';
    } elseif ($type === 'trolley') {
        $art = '
        <g transform="translate(190 72)">
            <rect x="210" y="0" width="24" height="90" rx="10" fill="' . $p['c'] . '"/>
            <rect x="176" y="70" width="92" height="24" rx="12" fill="' . $p['c'] . '"/>
            <rect x="100" y="100" width="300" height="360" rx="44" fill="' . $p['a'] . '"/>
            <rect x="145" y="165" width="210" height="140" rx="24" fill="' . $p['b'] . '" opacity=".82"/>
            <circle cx="156" cy="500" r="28" fill="' . $p['c'] . '"/>
            <circle cx="344" cy="500" r="28" fill="' . $p['c'] . '"/>
            <circle cx="156" cy="500" r="11" fill="' . $p['d'] . '"/>
            <circle cx="344" cy="500" r="11" fill="' . $p['d'] . '"/>
        </g>';
    } elseif ($type === 'all') {
        $art = '
        <g transform="translate(80 110)">
            <rect x="70" y="180" rx="48" ry="48" width="290" height="150" fill="' . $p['a'] . '"/>
            <path d="M155 175 C155 120 275 120 275 175" fill="none" stroke="' . $p['c'] . '" stroke-width="16" stroke-linecap="round"/>
            <rect x="116" y="208" rx="24" ry="24" width="198" height="82" fill="' . $p['b'] . '" opacity=".75"/>

            <path d="M520 180 C520 116 660 116 660 180" fill="none" stroke="' . $p['c'] . '" stroke-width="18" stroke-linecap="round"/>
            <rect x="470" y="180" rx="66" ry="66" width="240" height="186" fill="' . $p['a'] . '" opacity=".88"/>
            <rect x="510" y="228" rx="24" ry="24" width="160" height="74" fill="' . $p['b'] . '" opacity=".8"/>
        </g>';
    } else {
        $art = '
        <g transform="translate(120 165)">
            <rect x="82" y="150" rx="48" ry="48" width="420" height="180" fill="' . $p['a'] . '"/>
            <rect x="162" y="118" rx="16" ry="16" width="110" height="44" fill="' . $p['c'] . '" opacity=".88"/>
            <path d="M210 118 C210 62 372 62 372 118" fill="none" stroke="' . $p['b'] . '" stroke-width="18" stroke-linecap="round"/>
            <rect x="134" y="194" rx="24" ry="24" width="118" height="92" fill="' . $p['b'] . '" opacity=".55"/>
            <rect x="276" y="194" rx="24" ry="24" width="176" height="92" fill="' . $p['b'] . '" opacity=".78"/>
            <path d="M500 214 Q590 146 644 194" fill="none" stroke="' . $p['c'] . '" stroke-width="20" stroke-linecap="round"/>
        </g>';
    }

    $svg = '
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 620">
        <defs>
            <linearGradient id="bg" x1="0" x2="1" y1="0" y2="1">
                <stop offset="0%" stop-color="' . $p['d'] . '"/>
                <stop offset="100%" stop-color="#ffffff"/>
            </linearGradient>
            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                <feDropShadow dx="0" dy="14" stdDeviation="16" flood-color="#000000" flood-opacity="0.12"/>
            </filter>
        </defs>

        <rect width="800" height="620" fill="url(#bg)"/>
        <circle cx="112" cy="110" r="70" fill="#ffffff" opacity="0.55"/>
        <circle cx="690" cy="510" r="100" fill="#ffffff" opacity="0.5"/>

        <g filter="url(#shadow)">
            ' . $art . '
        </g>

        <text x="400" y="570" text-anchor="middle" font-family="Arial, sans-serif" font-size="32" font-weight="700" fill="' . $p['c'] . '">' . $label . '</text>
    </svg>';

    return 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($svg);
}

$siteCategories = [
    'all' => [
        'title' => 'All Bags',
        'file' => 'all-bags.php',
        'short' => 'All',
        'imageType' => 'all',
        'desc' => 'See every bag type in one place. Pick the one that fits your day.',
        'items' => [
            ['name' => 'Daily Backpack', 'tag' => 'School', 'text' => 'Light feel for daily use.', 'price' => '₹1,699', 'img' => 'school'],
            ['name' => 'City Laptop Bag', 'tag' => 'Laptop', 'text' => 'Soft inside for device safety.', 'price' => '₹2,099', 'img' => 'laptop'],
            ['name' => 'Short Trip Duffel', 'tag' => 'Travel', 'text' => 'Good for 2 to 3 day trips.', 'price' => '₹2,499', 'img' => 'travel'],
            ['name' => 'Easy Tote Carry', 'tag' => 'Tote', 'text' => 'Open top and roomy shape.', 'price' => '₹1,299', 'img' => 'tote'],
            ['name' => 'Smart Office Bag', 'tag' => 'Office', 'text' => 'Keeps papers and charger neat.', 'price' => '₹2,299', 'img' => 'office'],
            ['name' => 'Compact Mini Bag', 'tag' => 'Mini', 'text' => 'Small size for basics.', 'price' => '₹1,099', 'img' => 'mini'],
            ['name' => 'Fun Kids Pack', 'tag' => 'Kids', 'text' => 'Soft straps and bright look.', 'price' => '₹1,199', 'img' => 'kids'],
            ['name' => 'Party Night Bag', 'tag' => 'Party', 'text' => 'For cards, phone, and keys.', 'price' => '₹1,499', 'img' => 'party'],
            ['name' => 'Gym Ready Duffel', 'tag' => 'Gym', 'text' => 'Extra room for clothes.', 'price' => '₹1,899', 'img' => 'gym'],
            ['name' => 'Everyday Hand Bag', 'tag' => 'Hand', 'text' => 'Works well for daily wear.', 'price' => '₹1,799', 'img' => 'hand'],
            ['name' => 'Campus Carry Bag', 'tag' => 'College', 'text' => 'Clean look for class days.', 'price' => '₹1,999', 'img' => 'college'],
            ['name' => 'Wheel Trip Bag', 'tag' => 'Trolley', 'text' => 'Easy pull and smooth move.', 'price' => '₹3,499', 'img' => 'trolley'],
        ],
    ],

    'travel' => [
        'title' => 'Travel Bags',
        'file' => 'travel-bags.php',
        'short' => 'Travel',
        'imageType' => 'travel',
        'desc' => 'Travel bags for short and long trips. Easy to carry and easy to pack.',
        'items' => [
            ['name' => 'Air Weekender Bag', 'tag' => 'Travel', 'text' => 'Fits clothes and small travel items.', 'price' => '₹2,499', 'img' => 'travel'],
            ['name' => 'Road Trip Duffel', 'tag' => 'Travel', 'text' => 'Soft body and wide zip opening.', 'price' => '₹2,699', 'img' => 'travel'],
            ['name' => 'Easy Cabin Bag', 'tag' => 'Travel', 'text' => 'Good size for short travel days.', 'price' => '₹2,299', 'img' => 'travel'],
            ['name' => 'Trip Move Bag', 'tag' => 'Travel', 'text' => 'Strong handles and simple shape.', 'price' => '₹2,899', 'img' => 'travel'],
            ['name' => 'Holiday Carry Bag', 'tag' => 'Travel', 'text' => 'Extra side pocket for quick use.', 'price' => '₹2,749', 'img' => 'travel'],
            ['name' => 'Weekend Pack Bag', 'tag' => 'Travel', 'text' => 'Made for light packing and easy hold.', 'price' => '₹2,399', 'img' => 'travel'],
        ],
    ],

    'kids' => [
        'title' => 'Kids Bags',
        'file' => 'kids-bags.php',
        'short' => 'Kids',
        'imageType' => 'kids',
        'desc' => 'Kids bags with soft straps and fun colors for school and small outings.',
        'items' => [
            ['name' => 'Happy Day Bag', 'tag' => 'Kids', 'text' => 'Light size for small school items.', 'price' => '₹1,199', 'img' => 'kids'],
            ['name' => 'Color Fun Bag', 'tag' => 'Kids', 'text' => 'Soft straps and easy front pocket.', 'price' => '₹1,099', 'img' => 'kids'],
            ['name' => 'Little Walk Bag', 'tag' => 'Kids', 'text' => 'Good for snacks and simple carry.', 'price' => '₹999', 'img' => 'kids'],
            ['name' => 'Tiny Buddy Bag', 'tag' => 'Kids', 'text' => 'Small shape for daily use.', 'price' => '₹1,149', 'img' => 'kids'],
            ['name' => 'Play Time Pack', 'tag' => 'Kids', 'text' => 'Bright look and light feel.', 'price' => '₹1,249', 'img' => 'kids'],
            ['name' => 'Junior Zip Bag', 'tag' => 'Kids', 'text' => 'Simple zip and easy open design.', 'price' => '₹1,179', 'img' => 'kids'],
        ],
    ],

    'school' => [
        'title' => 'School Bags',
        'file' => 'school-bags.php',
        'short' => 'School',
        'imageType' => 'school',
        'desc' => 'School bags with space for books, lunch, and daily school things.',
        'items' => [
            ['name' => 'Book Day Backpack', 'tag' => 'School', 'text' => 'Good space for books and bottle.', 'price' => '₹1,699', 'img' => 'school'],
            ['name' => 'Class Room Bag', 'tag' => 'School', 'text' => 'Front pocket for small items.', 'price' => '₹1,799', 'img' => 'school'],
            ['name' => 'Study Time Pack', 'tag' => 'School', 'text' => 'Strong straps and clean shape.', 'price' => '₹1,899', 'img' => 'school'],
            ['name' => 'Note Carry Bag', 'tag' => 'School', 'text' => 'Good for daily school use.', 'price' => '₹1,649', 'img' => 'school'],
            ['name' => 'Smart Book Pack', 'tag' => 'School', 'text' => 'Easy carry for full school day.', 'price' => '₹1,949', 'img' => 'school'],
            ['name' => 'Daily Class Bag', 'tag' => 'School', 'text' => 'Side space for bottle and lunch.', 'price' => '₹1,749', 'img' => 'school'],
        ],
    ],

    'college' => [
        'title' => 'College Bags',
        'file' => 'college-bags.php',
        'short' => 'College',
        'imageType' => 'college',
        'desc' => 'College bags with a clean look for notes, books, and daily class use.',
        'items' => [
            ['name' => 'Campus Walk Bag', 'tag' => 'College', 'text' => 'Made for books and notebook carry.', 'price' => '₹1,999', 'img' => 'college'],
            ['name' => 'Lecture Day Pack', 'tag' => 'College', 'text' => 'Good fit for daily class use.', 'price' => '₹2,099', 'img' => 'college'],
            ['name' => 'Urban Study Bag', 'tag' => 'College', 'text' => 'Simple shape and easy straps.', 'price' => '₹2,149', 'img' => 'college'],
            ['name' => 'College Move Pack', 'tag' => 'College', 'text' => 'Room for files and bottle.', 'price' => '₹1,949', 'img' => 'college'],
            ['name' => 'Note Plus Bag', 'tag' => 'College', 'text' => 'Clean style for campus days.', 'price' => '₹2,199', 'img' => 'college'],
            ['name' => 'Campus Zip Bag', 'tag' => 'College', 'text' => 'Useful pockets for daily carry.', 'price' => '₹2,049', 'img' => 'college'],
        ],
    ],

    'office' => [
        'title' => 'Office Bags',
        'file' => 'office-bags.php',
        'short' => 'Office',
        'imageType' => 'office',
        'desc' => 'Office bags for papers, charger, bottle, and daily work items.',
        'items' => [
            ['name' => 'Work Day Carry', 'tag' => 'Office', 'text' => 'Clean design for office use.', 'price' => '₹2,299', 'img' => 'office'],
            ['name' => 'Paper File Bag', 'tag' => 'Office', 'text' => 'Keeps papers and tools in place.', 'price' => '₹2,399', 'img' => 'office'],
            ['name' => 'Desk Move Bag', 'tag' => 'Office', 'text' => 'Simple look for daily meetings.', 'price' => '₹2,499', 'img' => 'office'],
            ['name' => 'Office Smart Bag', 'tag' => 'Office', 'text' => 'Easy hold and neat inside space.', 'price' => '₹2,199', 'img' => 'office'],
            ['name' => 'Daily Work Tote', 'tag' => 'Office', 'text' => 'Good room for charger and file.', 'price' => '₹2,599', 'img' => 'office'],
            ['name' => 'Formal Carry Bag', 'tag' => 'Office', 'text' => 'Made for office and travel work.', 'price' => '₹2,749', 'img' => 'office'],
        ],
    ],

    'laptop' => [
        'title' => 'Laptop Bags',
        'file' => 'laptop-bags.php',
        'short' => 'Laptop',
        'imageType' => 'laptop',
        'desc' => 'Laptop bags with soft inside space for your device and charger.',
        'items' => [
            ['name' => 'Safe Device Bag', 'tag' => 'Laptop', 'text' => 'Soft inner space for laptop care.', 'price' => '₹2,099', 'img' => 'laptop'],
            ['name' => 'Office Laptop Carry', 'tag' => 'Laptop', 'text' => 'Good room for charger and mouse.', 'price' => '₹2,299', 'img' => 'laptop'],
            ['name' => 'Slim Tech Bag', 'tag' => 'Laptop', 'text' => 'Light feel and simple outside look.', 'price' => '₹2,399', 'img' => 'laptop'],
            ['name' => 'City Work Laptop Bag', 'tag' => 'Laptop', 'text' => 'Daily use for office and class.', 'price' => '₹2,499', 'img' => 'laptop'],
            ['name' => 'Soft Guard Bag', 'tag' => 'Laptop', 'text' => 'Extra care for device corners.', 'price' => '₹2,349', 'img' => 'laptop'],
            ['name' => 'Travel Tech Bag', 'tag' => 'Laptop', 'text' => 'Good for work trips and daily carry.', 'price' => '₹2,649', 'img' => 'laptop'],
        ],
    ],

    'hand' => [
        'title' => 'Hand Bags',
        'file' => 'hand-bags.php',
        'short' => 'Hand',
        'imageType' => 'hand',
        'desc' => 'Hand bags for daily use with simple style and easy carry.',
        'items' => [
            ['name' => 'Daily Hand Bag', 'tag' => 'Hand', 'text' => 'Simple shape for daily wear.', 'price' => '₹1,799', 'img' => 'hand'],
            ['name' => 'Classic Carry Bag', 'tag' => 'Hand', 'text' => 'Good space for phone and wallet.', 'price' => '₹1,899', 'img' => 'hand'],
            ['name' => 'Soft Curve Bag', 'tag' => 'Hand', 'text' => 'Easy hold and smooth finish.', 'price' => '₹1,999', 'img' => 'hand'],
            ['name' => 'Day Out Hand Bag', 'tag' => 'Hand', 'text' => 'Useful size for daily items.', 'price' => '₹2,099', 'img' => 'hand'],
            ['name' => 'Simple Style Bag', 'tag' => 'Hand', 'text' => 'Clean design with zip close.', 'price' => '₹1,949', 'img' => 'hand'],
            ['name' => 'Everyday Carry Bag', 'tag' => 'Hand', 'text' => 'Works with casual and simple looks.', 'price' => '₹2,149', 'img' => 'hand'],
        ],
    ],

    'tote' => [
        'title' => 'Tote Bags',
        'file' => 'tote-bags.php',
        'short' => 'Tote',
        'imageType' => 'tote',
        'desc' => 'Tote bags with open space for shopping, class, and day use.',
        'items' => [
            ['name' => 'Easy Tote Bag', 'tag' => 'Tote', 'text' => 'Wide opening and roomy inside.', 'price' => '₹1,299', 'img' => 'tote'],
            ['name' => 'Daily Market Tote', 'tag' => 'Tote', 'text' => 'Good for light shopping use.', 'price' => '₹1,399', 'img' => 'tote'],
            ['name' => 'Simple Carry Tote', 'tag' => 'Tote', 'text' => 'Easy to hold and easy to pack.', 'price' => '₹1,499', 'img' => 'tote'],
            ['name' => 'Class Day Tote', 'tag' => 'Tote', 'text' => 'Good for notebook and bottle.', 'price' => '₹1,549', 'img' => 'tote'],
            ['name' => 'Open Space Tote', 'tag' => 'Tote', 'text' => 'Made for day trips and errands.', 'price' => '₹1,449', 'img' => 'tote'],
            ['name' => 'Clean Shape Tote', 'tag' => 'Tote', 'text' => 'Simple daily carry with soft straps.', 'price' => '₹1,599', 'img' => 'tote'],
        ],
    ],

    'gym' => [
        'title' => 'Gym Bags',
        'file' => 'gym-bags.php',
        'short' => 'Gym',
        'imageType' => 'gym',
        'desc' => 'Gym bags with room for shoes, bottle, towel, and extra clothes.',
        'items' => [
            ['name' => 'Gym Ready Bag', 'tag' => 'Gym', 'text' => 'Room for shoes and workout wear.', 'price' => '₹1,899', 'img' => 'gym'],
            ['name' => 'Move Fit Duffel', 'tag' => 'Gym', 'text' => 'Good for towel and bottle carry.', 'price' => '₹1,999', 'img' => 'gym'],
            ['name' => 'Workout Day Bag', 'tag' => 'Gym', 'text' => 'Wide zip opening for easy use.', 'price' => '₹2,099', 'img' => 'gym'],
            ['name' => 'Train Carry Bag', 'tag' => 'Gym', 'text' => 'Simple look and strong hold.', 'price' => '₹2,149', 'img' => 'gym'],
            ['name' => 'Active Pack Duffel', 'tag' => 'Gym', 'text' => 'Made for daily gym and sport use.', 'price' => '₹1,949', 'img' => 'gym'],
            ['name' => 'Power Move Bag', 'tag' => 'Gym', 'text' => 'Extra room for clothes and shoes.', 'price' => '₹2,249', 'img' => 'gym'],
        ],
    ],

    'party' => [
        'title' => 'Party Bags',
        'file' => 'party-bags.php',
        'short' => 'Party',
        'imageType' => 'party',
        'desc' => 'Party bags for phone, cards, keys, and small items.',
        'items' => [
            ['name' => 'Night Out Bag', 'tag' => 'Party', 'text' => 'Small size for a simple evening.', 'price' => '₹1,499', 'img' => 'party'],
            ['name' => 'Shine Party Bag', 'tag' => 'Party', 'text' => 'Good for phone and cards.', 'price' => '₹1,599', 'img' => 'party'],
            ['name' => 'Evening Mini Carry', 'tag' => 'Party', 'text' => 'Clean shape with easy hold.', 'price' => '₹1,699', 'img' => 'party'],
            ['name' => 'Dress Up Bag', 'tag' => 'Party', 'text' => 'Small carry for light outings.', 'price' => '₹1,799', 'img' => 'party'],
            ['name' => 'Glow Night Bag', 'tag' => 'Party', 'text' => 'Made for simple party looks.', 'price' => '₹1,649', 'img' => 'party'],
            ['name' => 'Easy Party Carry', 'tag' => 'Party', 'text' => 'Neat size for small basics.', 'price' => '₹1,749', 'img' => 'party'],
        ],
    ],

    'mini' => [
        'title' => 'Mini Bags',
        'file' => 'mini-bags.php',
        'short' => 'Mini',
        'imageType' => 'mini',
        'desc' => 'Mini bags for light carry when you need only the basics.',
        'items' => [
            ['name' => 'Mini Day Bag', 'tag' => 'Mini', 'text' => 'Small carry for daily use.', 'price' => '₹1,099', 'img' => 'mini'],
            ['name' => 'Pocket Carry Bag', 'tag' => 'Mini', 'text' => 'Good for phone and keys.', 'price' => '₹1,149', 'img' => 'mini'],
            ['name' => 'Lite Mini Bag', 'tag' => 'Mini', 'text' => 'Soft size and easy hold.', 'price' => '₹1,199', 'img' => 'mini'],
            ['name' => 'Quick Move Bag', 'tag' => 'Mini', 'text' => 'Made for short trips outside.', 'price' => '₹1,249', 'img' => 'mini'],
            ['name' => 'Tiny Zip Bag', 'tag' => 'Mini', 'text' => 'Simple style and neat shape.', 'price' => '₹1,299', 'img' => 'mini'],
            ['name' => 'Mini Street Bag', 'tag' => 'Mini', 'text' => 'Useful for everyday basics.', 'price' => '₹1,349', 'img' => 'mini'],
        ],
    ],

    'trolley' => [
        'title' => 'Trolley Bags',
        'file' => 'trolley-bags.php',
        'short' => 'Trolley',
        'imageType' => 'trolley',
        'desc' => 'Trolley bags with wheels for smooth travel and easy moving.',
        'items' => [
            ['name' => 'City Trip Trolley', 'tag' => 'Trolley', 'text' => 'Wheels for smooth airport moves.', 'price' => '₹3,499', 'img' => 'trolley'],
            ['name' => 'Travel Roll Bag', 'tag' => 'Trolley', 'text' => 'Strong body for longer trips.', 'price' => '₹3,699', 'img' => 'trolley'],
            ['name' => 'Easy Pull Trolley', 'tag' => 'Trolley', 'text' => 'Good for clothes and travel gear.', 'price' => '₹3,899', 'img' => 'trolley'],
            ['name' => 'Wheel Move Bag', 'tag' => 'Trolley', 'text' => 'Firm handle and wide inside space.', 'price' => '₹3,749', 'img' => 'trolley'],
            ['name' => 'Trip Glide Trolley', 'tag' => 'Trolley', 'text' => 'Simple design with smooth roll.', 'price' => '₹4,099', 'img' => 'trolley'],
            ['name' => 'Holiday Wheel Bag', 'tag' => 'Trolley', 'text' => 'Built for easy moving and packing.', 'price' => '₹4,249', 'img' => 'trolley'],
        ],
    ],
];
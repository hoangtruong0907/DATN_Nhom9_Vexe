<?php

use Carbon\Carbon;


function formatDateTime($dateTimeStr, string $format = 'H:i d-m-Y', $hours = 0, $addDate = 0, $locale = 'en')
{
    try {
        $date = Carbon::parse($dateTimeStr);

        if ($hours != 0) {
            $date->subHours((int)$hours);
        }
        if ($addDate != 0) {
            $date->addDay((int)$addDate);
        }
        $date->locale($locale);
        return $date->translatedFormat($format);
    } catch (\Exception $e) {
        return null;
    }
}

function formatDate($date)
{
    if (strpos($date, ',') !== false) {
        $date = trim(substr($date, strpos($date, ',') + 1));
    }
    return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
}

function timeAgo($dateTimeStr)
{
    Carbon::setLocale('vi');
    $date = Carbon::parse($dateTimeStr);
    return $date->diffForHumans();
}

function getTime($dateTimeStr)
{
    return formatDateTime($dateTimeStr, 'H:i:s');
}

function getDuration($totalMinutes)
{
    $hours = floor($totalMinutes / 60);
    $minutes = $totalMinutes % 60;

    $hoursFormatted = $hours > 0 ? str_pad($hours, 2, '0', STR_PAD_LEFT) . 'h' : '';
    $minutesFormatted = $minutes > 0 ? str_pad($minutes, 2, '0', STR_PAD_LEFT) . "'" : '';
    return trim($hoursFormatted . $minutesFormatted);
}

function getTimeDistance($time, $distance)
{
    list($hours, $minutes) = explode(':', $time);
    $totalMinutes = $hours * 60 + $minutes;

    $newTotalMinutes = $totalMinutes + $distance;
    $newHours = floor($newTotalMinutes / 60) % 24;
    $newMinutes = $newTotalMinutes % 60;

    if ($newMinutes < 0) {
        $newMinutes += 60;
        $newHours = ($newHours - 1 + 24) % 24;
    }
    return sprintf('%02d:%02d', $newHours, $newMinutes);
}

function formatCurrency($number)
{
    return number_format($number, 0, ',', '.') . 'đ';
}

function renderRatingStars($rating)
{
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
    $emptyStars = 5 - $fullStars - $halfStar;
    $starsHtml = '<div class="rating">';
    // Hiển thị sao đầy
    for ($i = 0; $i < $fullStars; $i++) {
        $starsHtml .= '<i class="fa-solid fa-star"></i>';
    }
    // Hiển thị nửa sao nếu có
    if ($halfStar) {
        $starsHtml .= '<i class="fa-solid fa-star-half-stroke"></i>';
    }
    // Hiển thị sao rỗng
    for ($i = 0; $i < $emptyStars; $i++) {
        $starsHtml .= '<i class="fa-regular fa-star"></i>';
    }
    $starsHtml .= '</div>';
    return $starsHtml;
}

function renderSeat($type = "default", $action = "default", $status = "default", $color = "default",  $on = false)
{
    $typeMapping = [
        2 => 'bed',
        3 => 'bed',
        7 => 'couple',
    ];
    $type = $typeMapping[$type] ?? 'default';
    if (!in_array($type, ['default', 'couple', 'bed', 'helm'])) {
        return '';
    }

    $config = [
        'default' => [
            'class' => 'seat-thumbnail seat-thumbnail-hor',
            'width' => 40,
            'height' => 32,
            'viewBox' => '0 0 40 32',
            'rects' => [
                ['x' => 8.75, 'y' => 2.75, 'width' => 22.5, 'height' => 26.5],
                ['x' => 10.25, 'y' => 11.75, 'width' => 14.5, 'height' => 5.5, 'transform' => 'rotate(90 10.25 11.75)'],
                ['x' => 35.25, 'y' => 11.75, 'width' => 14.5, 'height' => 5.5, 'transform' => 'rotate(90 35.25 11.75)'],
                ['x' => 8.75, 'y' => 22.75, 'width' => 22.5, 'height' => 6.5]
            ],
            'paths' => [
                'selected' => 'M20 6.333A6.67 6.67 0 0 0 13.334 13 6.67 6.67 0 0 0 20 19.667 6.67 6.67 0 0 0 26.667 13 6.669 6.669 0 0 0 20 6.333zm-1.333 10L15.333 13l.94-.94 2.394 2.387 5.06-5.06.94.946-6 6z',
                'disabled' => 'M24.96 9.46l-1.42-1.42L20 11.59l-3.54-3.55-1.42 1.42L18.59 13l-3.55 3.54 1.42 1.42L20 14.41l3.54 3.55 1.42-1.42L21.41 13l3.55-3.54z'
            ]
        ],
        'couple' => [
            'class' => 'seat-thumbnail seat-thumbnail-couple',
            'width' => 40,
            'height' => 44,
            'viewBox' => '0 0 50 40',
            'rects' => [
                ['x' => 2.75, 'y' => 2.75, 'width' => 44.5, 'height' => 34.5],
                ['x' => 5.75, 'y' => 27.75, 'width' => 16.5, 'height' => 6.5],
                ['x' => 27.75, 'y' => 27.75, 'width' => 16.5, 'height' => 6.5]
            ],
            'paths' => [
                'selected' => 'M25 8.333A6.67 6.67 0 0 0 18.334 15 6.67 6.67 0 0 0 25 21.667 6.67 6.67 0 0 0 31.667 15 6.669 6.669 0 0 0 25 8.333zm-1.333 10L20.333 15l.94-.94 2.394 2.387 5.06-5.06.94.946-6 6z',
                'disabled' => 'M29.96 11.46l-1.42-1.42L25 13.59l-3.54-3.55-1.42 1.42L23.59 15l-3.55 3.54 1.42 1.42L25 16.41l3.54 3.55 1.42-1.42L26.41 15l3.55-3.54z'
            ]
        ],
        'bed' => [
            'class' => 'seat-thumbnail seat-thumbnail-bed',
            'width' => 32,
            'height' => 40,
            'viewBox' => '0 0 28 40',
            'rects' => [
                ['x' => 2.75, 'y' => 2.75, 'width' => 22.5, 'height' => 34.5],
                ['x' => 5.75, 'y' => 27.75, 'width' => 16.5, 'height' => 6.5]
            ],
            'paths' => [
                'selected' => 'M14 8.333A6.67 6.67 0 0 0 7.333 15 6.67 6.67 0 0 0 14 21.667 6.67 6.67 0 0 0 20.667 15 6.669 6.669 0 0 0 14 8.333zm-1.333 10L9.334 15l.94-.94 2.393 2.387 5.06-5.06.94.946-6 6z',
                'disabled' => 'M18.96 11.46l-1.42-1.42L14 13.59l-3.54-3.55-1.42 1.42L12.59 15l-3.55 3.54 1.42 1.42L14 16.41l3.54 3.55 1.42-1.42L15.41 15l3.55-3.54z'
            ]
        ],
        'helm' => [
            'class' => 'seat-thumbnail-helm',
            'width' => 24,
            'height' => 24,
            'viewBox' => '0 0 24 24',
            'svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.305 24h-.61c-.035-.004-.07-.01-.105-.012a11.783 11.783 0 0 1-2.117-.261 12.027 12.027 0 0 1-6.958-4.394A11.933 11.933 0 0 1 .027 12.78L0 12.411v-.822c.005-.042.013-.084.014-.127a11.845 11.845 0 0 1 1.102-4.508 12.007 12.007 0 0 1 2.847-3.852A11.935 11.935 0 0 1 11.728.003c.947-.022 1.883.07 2.81.27 1.22.265 2.369.71 3.447 1.335a11.991 11.991 0 0 1 3.579 3.164 11.876 11.876 0 0 1 2.073 4.317c.178.712.292 1.434.334 2.168.008.146.02.292.029.439v.609c-.004.03-.011.06-.012.089a11.81 11.81 0 0 1-1.05 4.521 12.02 12.02 0 0 1-1.92 2.979 12.046 12.046 0 0 1-6.395 3.812c-.616.139-1.24.23-1.872.265-.149.008-.297.02-.446.03zm8.799-13.416c-.527-3.976-4.078-7.808-9.1-7.811-5.02-.003-8.583 3.823-9.11 7.809h.09c.64-.035 1.278-.092 1.912-.195.815-.131 1.614-.326 2.378-.639.625-.255 1.239-.54 1.855-.816.82-.368 1.673-.593 2.575-.62a7.123 7.123 0 0 1 1.947.187c.585.146 1.136.382 1.68.634.57.264 1.14.526 1.733.736 1.2.424 2.442.62 3.706.7.11.006.222.01.334.015zm-10.95 10.471v-.094c0-1.437 0-2.873-.002-4.31 0-.141-.011-.284-.035-.423a2.787 2.787 0 0 0-.775-1.495c-.564-.582-1.244-.896-2.067-.892-1.414.007-2.827.002-4.24.002h-.09a9.153 9.153 0 0 0 3.125 5.256 9.15 9.15 0 0 0 4.083 1.956zm3.689.001c1.738-.36 3.25-1.137 4.528-2.355 1.4-1.334 2.287-2.956 2.685-4.855l-.077-.003h-4.362c-.237 0-.47.038-.695.112-.667.22-1.188.635-1.588 1.206a2.673 2.673 0 0 0-.494 1.59c.008 1.4.003 2.801.003 4.202v.103zM12.05 14.22c1.215-.035 2.204-1.083 2.165-2.275-.039-1.223-1.095-2.215-2.29-2.166-1.211.05-2.2 1.108-2.15 2.302.051 1.191 1.108 2.186 2.275 2.139z" fill="#858585"></path></svg>'
        ]
    ];

    $seatClass = $config[$type]['class']
        . ($action === "selected" ? " seat-selected" : ($action === "unselected" ? " seat-unavailable" : ""))
        . ($status !== "default" ? " $status" : " seat-available");

    $styleRec = ($color !== "default") ? 'style="stroke: ' . $color . ';"' : '';

    if ($type === 'helm') {
        return '<div class="' . ($on ? "seat-choose-item " : "") . '">' . $config[$type]['svg'] . '</div>';
    }

    $svg = '<svg width="' . $config[$type]['width'] . '" height="' . $config[$type]['height'] . '" viewBox="' . $config[$type]['viewBox'] . '" fill="none" xmlns="http://www.w3.org/2000/svg">';
    foreach ($config[$type]['rects'] as $rect) {
        $transform = isset($rect['transform']) ? ' transform="' . $rect['transform'] . '"' : '';
        $svg .= '<rect x="' . $rect['x'] . '" y="' . $rect['y'] . '" width="' . $rect['width'] . '" height="' . $rect['height'] . '" rx="2.25" fill="#FFF" stroke="#B8B8B8" stroke-width="1.5" stroke-linejoin="round"' . $transform . ' ' . $styleRec . '></rect>';
    }

    $svg .= '<path class="icon-selected ' . ($action === "selected" ? 'icon-selected-chon' : '') . '" d="' . ($config[$type]['paths']['selected'] ?? '') . '" fill="transparent"></path>';
    $svg .= '<path class="icon-disabled ' . ($action === "unselected" ? 'icon-disabled-2' : '') . '" d="' . ($config[$type]['paths']['disabled'] ?? '') . '" fill="transparent"></path>';
    $svg .= '</svg>';

    return '<div class="' . ($on ? "seat-choose-item " : "") . $seatClass . '">' . $svg . '</div>';
}


function renderRatingBar($rating)
{
    $widthPercentage = ($rating / 5) * 100;

    $progressBarHtml = '
            <div class="progress-bar" role="progressbar" aria-label="Basic example"
                style="width: ' . $widthPercentage . '%"
                aria-valuenow="' . $widthPercentage . '"
                aria-valuemin="0" aria-valuemax="100">
            </div>
    ';
    return $progressBarHtml;
}

function underscoreToStr($str)
{
    switch ($str) {
        case 'image_review_count':
            return 'Có hình ảnh';
            break;
        case 'detail_review':
            return 'Có đánh giá';
            break;
        default:
            return $str . '<i class="fa-solid fa-star ms-1"></i>';
            break;
    }
}

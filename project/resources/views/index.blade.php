<?php
/**
 * @var \App\Models\Config $config
 */
?>
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Усадьба Моховых — База отдыха в Горном Алтае</title>
    <meta name="description"
          content="Усадьба Моховых — база отдыха в Горном Алтае. Уютные домики, баня, трансфер, бронирование. Отличное место для семейного отдыха и уединения с природой.">
    <meta name="keywords"
          content="Алтай, база отдыха, Усадьба Моховых, отдых на Алтае, домики, баня, бронирование, туризм, река Катунь, Аскат, Чемал">
    <meta name="author" content="Усадьба Моховых">
    <meta property="og:title" content="Усадьба Моховых — База отдыха в Горном Алтае">
    <meta property="og:description"
          content="Уютные домики, баня, трансфер и бронирование на базе Усадьба Моховых. Отдых в горах Алтая.">
    <meta property="og:image" content="https://Усадьба Моховых.ru/preview.jpg">
    <meta property="og:url" content="https://Усадьба Моховых.ru">
    <meta name="robots" content="index, follow">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #222;
            background: #f2ebd7;
            transition: background 0.5s ease;
        }

        header, section, footer {
            padding: 40px 20px;
            max-width: 1200px;
            margin: auto;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f2ebd7;
            padding: 0;
            border-bottom: 1px solid #ddd;
            position: sticky;
            top: 0;
            backdrop-filter: blur(10px);
            z-index: 1000;
        }

        .topbar .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            height: 45px;
            object-fit: cover;
            width: 20vw;
        }

        .topbar .logo img {
            height: 45px;
        }

        .topbar nav a {
            margin: 0 12px;
            text-decoration: none;
            color: #222;
            font-weight: 500;
        }

        .topbar .contacts p {
            margin: 0;
            font-size: 0.9rem;
            text-align: right;
        }

        .topbar .socials a {
            margin-left: 8px;
            font-size: 1.2rem;
            color: #222;
            text-decoration: none;
        }

        header.hero {
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0;
        }

        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .hero-slider img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .hero-slider img.active {
            opacity: 1;
        }

        header.hero h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        header.hero p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        header.hero .btns a {
            display: inline-block;
            background: #111;
            color: white;
            padding: 10px 24px;
            margin: 10px;
            border-radius: 8px;
            text-decoration: none;
            border: 1px solid #fff;
            transition: background 0.3s;
        }

        header.hero .btns a:hover {
            background: #444;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
        }

        .gallery img {
            width: 100%;
            max-width: 280px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }

        .map iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 10px;
        }

        .room-selector {
            display: flex;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .room-list {
            width: 30%;
        }

        .room-list ul {
            list-style: none;
            padding: 0;
        }

        .room-list li {
            padding: 10px;
            background: #f3e7cb;
            margin-bottom: 5px;
            cursor: pointer;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .room-list li:hover {
            background: #ddd2b9;
        }

        .room-details {
            width: 70%;
            background: #f3e7cb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-in-out;
        }

        .room-details.active {
            opacity: 1;
            pointer-events: all;
        }

        .room-details img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        form input, form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        form button {
            background: #111;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        form button:hover {
            background: #333;
        }

        footer {
            background: #f2ebd7;
            text-align: center;
            font-size: 0.9rem;
            padding: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            display: block;
            margin: 5% auto;
            max-width: 90%;
            max-height: 80%;
            border-radius: 10px;
        }

        .modal .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal .prev, .modal .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            font-size: 50px;
            font-weight: bold;
            cursor: pointer;
            padding: 10px;
        }

        .modal .prev {
            left: 20px;
        }

        .modal .next {
            right: 20px;
        }
    </style>
    <script>

        let slideIndex = 0;
        window.addEventListener('load', () => {
            const slides = document.querySelectorAll('.hero-slider img');
            setInterval(() => {
                slides[slideIndex].classList.remove('active');
                slideIndex = (slideIndex + 1) % slides.length;
                slides[slideIndex].classList.add('active');
            }, 5000);
        });

        function showRoom(id) {
            document.querySelectorAll('.room-details').forEach(el => {
                el.classList.remove('active')
                el.classList.add('hidden')
            });
            let room = document.getElementById(id);
            room.classList.add('active');
            room.classList.remove('hidden')
        }

        const galleryImages = [
            @foreach($gallery as $image)
                '{{$image->url()}}',
            @endforeach
        ];
        let currentImgIndex = {{$gallery[0]->id}};

        function openModal(id) {
            currentImgIndex = id;
            document.getElementById('modalImg').src = galleryImages[id];
            document.getElementById('photoModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('photoModal').style.display = 'none';
        }

        function changeModal(direction) {
            currentImgIndex = (currentImgIndex + direction + galleryImages.length) % galleryImages.length;
            document.getElementById('modalImg').src = galleryImages[currentImgIndex];
        }

        window.addEventListener('keydown', function (e) {
            if (document.getElementById('photoModal').style.display === 'block') {
                if (e.key === 'ArrowRight') changeModal(1);
                if (e.key === 'ArrowLeft') changeModal(-1);
                if (e.key === 'Escape') closeModal();
            }
        });
    </script>
</head>
<body>
<div class="topbar">
    <div class="logo">
        <img src="{{$logo}}" alt="Усадьба Моховых logo">
        <span><strong>Усадьба Моховых</strong></span>
    </div>
    <nav>
        <a href="#about">О нас</a>
        <a href="#gallery">Фото</a>
        <a href="#location">Геолокация</a>
        <a href="#prices">Цены</a>
        <a href="#booking">Контакты</a>
    </nav>
    <div class="contacts">
        <p>📞 {{$config->phone}}</p>
    </div>
</div>

<header class="hero">
    <div class="hero-slider">
        @foreach($heroSlider as $index => $image)
            <img src="{{$image->url()}}" alt="Hero 1" @if($index === 0) class="active" @endif>
        @endforeach
    </div>
    <h1>Усадьба Моховых</h1>
    <p>Отдохните душой среди гор и рек</p>
    <div class="btns">
        <a href="#booking">Забронировать</a>
        <a href="#gallery">Смотреть фото</a>
    </div>
</header>


<section id="about">
    <h2>О нас</h2>
    <p>{{ $config->about_us }}</p>
</section>

<section id="gallery">
    <h2>Галерея</h2>
    <div class="gallery">
        @foreach($gallery as $index => $image)
            <img src="{{$image->url()}}" alt="" onclick="openModal({{$index}})">
        @endforeach
    </div>
</section>

<div id="photoModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <span class="prev" onclick="changeModal(-1)">&#10094;</span>
    <img class="modal-content" id="modalImg" src="" alt="">
    <span class="next" onclick="changeModal(1)">&#10095;</span>
</div>

<section id="location">
    <h2>Геолокация</h2>
    <p><strong>Адрес:</strong> {{ $config->location }}</p>
    <p><strong>Как добраться:</strong> {{$config->route}}
    </p>
    <div class="map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A13436b1883f4238ce59ba98cb917d4553a32e05f690f78551d7abf57e34c5386&amp;source=constructor" width="500" height="400"></iframe>
    </div>
</section>

<section id="prices">
    <h2>Цены</h2>
    <div class="room-selector">
        <div class="room-list">
            <ul>
                @foreach($rooms as $room)
                    <li onclick="showRoom({{$room->id}})">{{$room->name}}</li>
                @endforeach

            </ul>
        </div>
        @foreach($rooms as $room)
            <div class="room-details hidden" id="{{$room->id}}">
                <h3>{{$room->name}}</h3>
                <img src="{{$room->attachments[0]->url() ?? ''}}" alt="Дом 64 м2">
                <p><strong>Цена:</strong>{{$room->price}}</p>
                <p><strong>Вместимость:</strong>{{$room->capacity}}</p>
                <p>{{$room->description}}</p>
            </div>
        @endforeach
    </div>
</section>

<section id="booking">
    <h2>Контакты и бронирование</h2>
    <p><strong>Телефон:</strong>{{$config->phone}}</p>
</section>

<footer>
    <p>&copy; Усадьба Моховых, 2025</p>
</footer>
</body>
</html>

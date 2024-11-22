<?php
$mainSlides = [
        [
                'id' => 1,
                'image' => 'Images/banner-large1.png'
        ],
        [
                'id' => 2,
                'image' => 'Images/banner-large2.png'
        ]
];

$subSlides = [
        [
                'id' => 1,
                'image' => 'Images/banner-small1.png',
        ],
        [
                'id' => 2,
                'image' => 'Images/banner-small2.png'
        ],
        [
                'id' => 3,
                'image' => 'Images/banner-small3.png'
        ],
        [
                'id' => 4,
                'image' => 'Images/banner-small4.png'
        ],
        [
                'id' => 3,
                'image' => 'Images/banner-small3.png'
        ],
        [
                'id' => 4,
                'image' => 'Images/banner-small4.png'
        ]
];
?>
<body>
        <div class="slider-container">
                <div class="slider" id="mainSlider">
                        <?php foreach ($mainSlides as $slide): ?>
                                <div class="slide">
                                        <img src="<?php echo htmlspecialchars($slide['image']); ?>">
                                </div>
                        <?php endforeach; ?>
                </div>
                <div class="slider-nav">
                        <button onclick="prevSlide('mainSlider')">←</button>
                        <button onclick="nextSlide('mainSlider')">→</button>
                </div>
                <div class="slider-dots" id="mainDots">
                        <?php for ($i = 0; $i < count($mainSlides); $i++): ?>
                                <div class="dot <?php echo $i === 0 ? 'active' : ''; ?>"
                                        onclick="goToSlide('mainSlider', <?php echo $i; ?>)"></div>
                        <?php endfor; ?>
                </div>
        </div>

        <div class="slider-container">
                <div class="double-slider" id="doubleSlider">
                        <?php foreach ($subSlides as $slide): ?>
                                <div class="double-slide">
                                        <img src="<?php echo htmlspecialchars($slide['image']); ?>">
                                </div>
                        <?php endforeach; ?>
                </div>
                <div class="slider-nav">
                        <button onclick="prevSlide('doubleSlider', 2)">←</button>
                        <button onclick="nextSlide('doubleSlider', 2)">→</button>
                </div>
        </div>

        <script>
                const sliderStates = {
                        mainSlider: { current: 0, total: <?php echo count($mainSlides); ?> },
                        doubleSlider: { current: 0, total: <?php echo ceil(count($subSlides) / 2); ?> }
                };
                function updateSlider(sliderId, slideCount = 1) {
                        const slider = document.getElementById(sliderId);
                        const state = sliderStates[sliderId];
                        const slideWidth = (100 / slideCount);
                        slider.style.transform = `translateX(-${state.current * slideWidth}%)`;

                        // Update dots
                        const dotContainer = sliderId === 'mainSlider' ? '#mainDots' : '#doubleDots';
                        const dots = document.querySelectorAll(`${dotContainer} .dot`);
                        dots.forEach((dot, index) => {
                                dot.classList.toggle('active', index === state.current);
                        });
                }

                function nextSlide(sliderId, slideCount = 1) {
                        const state = sliderStates[sliderId];
                        state.current = (state.current + 1) % state.total;
                        updateSlider(sliderId, slideCount);
                }

                function prevSlide(sliderId, slideCount = 1) {
                        const state = sliderStates[sliderId];
                        state.current = (state.current - 1 + state.total) % state.total;
                        updateSlider(sliderId, slideCount);
                }

                function goToSlide(sliderId, index, slideCount = 1) {
                        const state = sliderStates[sliderId];
                        state.current = index;
                        updateSlider(sliderId, slideCount);
                }

                setInterval(() => nextSlide('mainSlider'), 5000);
                setInterval(() => nextSlide('doubleSlider', 2), 5000);

                function handleResize() {
                        const isMobile = window.innerWidth <= 768;
                        const slideCount = isMobile ? 1 : 2;
                        updateSlider('doubleSlider', slideCount);
                }

                window.addEventListener('resize', handleResize);
                handleResize();
        </script>
</body>

</html>
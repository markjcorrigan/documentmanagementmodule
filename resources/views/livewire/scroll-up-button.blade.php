<section class="w-full">
    <button class="scroll-up-btn" aria-label="Scroll to top">
        <svg class="scroll-progress" width="50" height="50" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="45" stroke="#ffffff" stroke-width="5" fill="none"/>
        </svg>
        ↑
    </button>

    @push('scripts')
        <script>
            function initScrollUpButton() {
                const scrollBtn = document.querySelector(".scroll-up-btn");
                if (!scrollBtn) return;

                const circle = scrollBtn.querySelector("circle");
                const radius = circle.r.baseVal.value;
                const circumference = 2 * Math.PI * radius;

                circle.style.strokeDasharray = circumference;
                circle.style.strokeDashoffset = circumference;

                const setProgress = () => {
                    const scrollTop = window.scrollY;
                    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                    const progress = docHeight ? scrollTop / docHeight : 0;
                    circle.style.strokeDashoffset = circumference * (1 - progress);
                };

                const handleScroll = () => {
                    setProgress();
                    if (window.scrollY > 300) scrollBtn.classList.add("show");
                    else scrollBtn.classList.remove("show");
                };

                window.addEventListener("scroll", handleScroll);

                scrollBtn.addEventListener("click", () => {
                    window.scrollTo({ top: 0, behavior: "smooth" });
                });

                setProgress();
            }

            document.addEventListener('livewire:load', () => {
                initScrollUpButton();
            });

            Livewire.hook('message.processed', () => {
                initScrollUpButton();
            });
        </script>
    @endpush

    <style>
        .scroll-up-btn {
            position: fixed;
            bottom: 40px;
            right: 40px;
            background-color: #1a1a1a;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            cursor: pointer;
            opacity: 0;
            transform: scale(0.8);
            pointer-events: none;
            transition: opacity 0.4s ease, transform 0.4s ease;
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-up-btn.show {
            opacity: 1;
            transform: scale(1);
            pointer-events: auto;
        }

        .scroll-up-btn:hover {
            background-color: #333;
            transform: scale(1.1);
        }

        .scroll-up-btn svg.scroll-progress {
            position: absolute;
            top: 0;
            left: 0;
            transform: rotate(-90deg);
            z-index: 0;
        }
    </style>
</section>


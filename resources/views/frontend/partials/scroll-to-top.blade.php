{{-- SCROLL TO TOP BUTTON - Include before closing </body> tag --}}
<div id="scrollToTop" style="
    position: fixed;
    bottom: 24px;
    right: 24px;
    width: 48px;
    height: 48px;
    background-color: #5dade2;
    color: white;
    border-radius: 50%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    opacity: 0;
">
    <!-- Progress circle -->
    <svg style="position: absolute; top: 0; left: 0; width: 48px; height: 48px; transform: rotate(-90deg);" viewBox="0 0 100 100">
        <circle
            cx="50"
            cy="50"
            r="45"
            stroke="rgba(255,255,255,0.3)"
            stroke-width="3"
            fill="none"
        />
        <circle
            id="scrollProgress"
            cx="50"
            cy="50"
            r="45"
            stroke="white"
            stroke-width="3"
            fill="none"
            stroke-dasharray="283"
            stroke-dashoffset="283"
            style="transition: stroke-dashoffset 0.1s ease;"
        />
    </svg>
    <!-- Arrow icon -->
    <i class="fa-solid fa-arrow-up" style="position: relative; z-index: 10; font-size: 14px; transition: transform 0.3s ease;"></i>
</div>

<style>
    #scrollToTop:hover {
        background-color: #4a9fd5 !important;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4) !important;
        transform: translateY(-2px) !important;
    }
    
    #scrollToTop:hover i {
        transform: translateY(-2px) !important;
    }
    
    #scrollToTop.show {
        display: flex !important;
        opacity: 1 !important;
    }
</style>

<script>
// Scroll to top functionality
(function() {
    const scrollBtn = document.getElementById('scrollToTop');
    const progressCircle = document.getElementById('scrollProgress');
    const circumference = 283;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = scrollTop / docHeight;
        const scrollProgress = Math.min(scrollPercent * 100, 100);
        
        // Update progress circle
        const offset = circumference - (scrollProgress / 100) * circumference;
        progressCircle.style.strokeDashoffset = offset;
        
        // Show/hide button
        if (scrollTop > 300) {
            scrollBtn.classList.add('show');
        } else {
            scrollBtn.classList.remove('show');
        }
    });
    
    // Scroll to top on click
    scrollBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
})();
</script>

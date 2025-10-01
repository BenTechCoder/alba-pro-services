export default class CarouselComponent extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.initCarousel();
    }

    initCarousel() {
        const items = this.querySelectorAll('.carousel-item');
        const nextButton = this.querySelector('.carousel-next');
        const prevButton = this.querySelector('.carousel-prev');
        let currentIndex = 0;
        let autoplay = true;

        const updateVisibility = () => {
            items.forEach((item, i) => {  
                item.setAttribute('aria-hidden', i !== currentIndex);
                item.classList.toggle('active', i === currentIndex);
            });
        };

        const showNext = () => {
            currentIndex = (currentIndex + 1) % items.length;
            updateVisibility();
        };

        const showPrev = () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateVisibility();
        };

        const startAutoplay = () => {
            return setInterval(() => {
                if (autoplay) showNext();
            }, 4000); // Hardcoded autoplay interval (4 seconds)
        };

        let interval = startAutoplay();

        // Stop autoplay on interaction
        this.addEventListener('mouseenter', () => {
            autoplay = false;
            clearInterval(interval);
        });

        // this.addEventListener('mouseleave', () => {
        //     autoplay = true;
        //     interval = startAutoplay();
        // });

        // Add keyboard navigation
        const handleKeydown = (e) => {
            if (e.key === 'ArrowRight') {
                showNext();
                autoplay = false; // Stop autoplay on manual interaction
                clearInterval(interval);
            }
            if (e.key === 'ArrowLeft') {
                showPrev();
                autoplay = false; // Stop autoplay on manual interaction
                clearInterval(interval);
            }
        };

        this.addEventListener('focus', () => {
            this.addEventListener('keydown', handleKeydown);
        });

        this.addEventListener('blur', () => {
            this.removeEventListener('keydown', handleKeydown);
        });

        // Add button navigation
        nextButton?.addEventListener('click', () => {
            showNext();
            autoplay = false; // Stop autoplay on manual interaction
            clearInterval(interval);
        });

        prevButton?.addEventListener('click', () => {
            showPrev();
            autoplay = false; // Stop autoplay on manual interaction
            clearInterval(interval);
        });

        // Initialize visibility
        updateVisibility();
    }
}
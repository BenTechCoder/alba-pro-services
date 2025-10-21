/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
import BurgerMenu from './components/nav';
import CarouselComponent from './components/carousel';
import createDialogs from './components/gallery';
import shareBtn from './components/share';
import { Observer } from 'tailwindcss-intersect';


document.querySelectorAll('.btn-share').forEach(
(item) => item.addEventListener('click', () => shareBtn(item))
)

if ('customElements' in window) {
	customElements.define('burger-menu', BurgerMenu);
	customElements.define('carousel-component', CarouselComponent);
}

createDialogs('.gallery-item');

Observer.start();

// Reel layout

(function () {
	const className = 'reel';
	const reels = Array.from(document.querySelectorAll(`.${className}`));
	const toggleOverflowClass = (elem) => {
		elem.classList.toggle(
			'overflowing',
			elem.scrollWidth > elem.clientWidth
		);
	};

	for (let reel of reels) {
		if ('ResizeObserver' in window) {
			new ResizeObserver((entries) => {
				toggleOverflowClass(entries[0].target);
			}).observe(reel);
		}

		if ('MutationObserver' in window) {
			new MutationObserver((entries) => {
				toggleOverflowClass(entries[0].target);
			}).observe(reel, { childList: true });
		}
	}
})();
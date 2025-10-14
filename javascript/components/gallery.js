// Special thanks to https://polypane.app/blog/building-a-lightbox-with-the-dialog-element/

export default function createDialogs(selector) {
	if (!selector) {
		return console.error('Missing selector argument');
	}
	const gallery = document.querySelector('.gallery');
	const galleryItems = Array.from(document.querySelectorAll(selector));
	const dialog = document.querySelector('.lightbox');
	const dialogInterior = dialog.querySelector('.lightbox-controls');
	const controls = dialog.querySelectorAll('.lightbox-controls__interior > *');
	const title = dialog.querySelector(
		'form .lightbox-controls > .lightbox-alt'
	);
	const [exitBtn, fullScreenBtn, forwardBtn, backwardsBtn] =
		controls;
	let startingIndex = 0;

	function updateDialog(index) {
		// set title
		title.textContent = galleryItems[index].querySelector(
			'.gallery-item-title'
		).textContent;

		// remove any previously inserted preview to avoid accumulating clones
		const previousPreview = dialog.querySelector('[data-lightbox-preview]');
		if (previousPreview) previousPreview.remove();

		// clone selected image and insert before the control area
		let image = galleryItems[index].querySelector('img');
		if (!image)
			return console.warn('No image found for gallery item', index);
		const clone = image.cloneNode(true);
		clone.removeAttribute('id');
		clone.setAttribute('data-lightbox-preview', String(index));
		dialogInterior.before(clone);
	}

	function nextImage() {
		const nextIndex = startingIndex + 1;
		const nextItem = nextIndex >= galleryItems.length ? 0 : nextIndex;
		startingIndex = nextItem;
		updateDialog(nextItem);
	}

	function previousImage() {
		const prevIndex = startingIndex - 1;
		const prevItem = prevIndex < 0 ? galleryItems.length - 1 : prevIndex;
		startingIndex = prevItem;
		updateDialog(prevItem);
	}

	function fullScreenImage() {
		let image = galleryItems[startingIndex].querySelector('img');
		if (!document.fullscreenElement) {
			// If the document is not in full screen mode
			// make the video full screen
			image.requestFullscreen();
		} else {
			// Otherwise exit the full screen
			image.exitFullscreen?.();
		}
	}

	forwardBtn.addEventListener('click', nextImage);
	backwardsBtn.addEventListener('click', previousImage);
	fullScreenBtn.addEventListener('click', fullScreenImage);

	function createDialog(img, index) {
		const button = img.querySelector('.lightbox-button');
		button.addEventListener('click', () => {
			// set the current index and update the dialog preview
			startingIndex = index;
			updateDialog(index);
			dialog.showModal();
			// ensure dialog can receive keyboard events
			dialog.focus();
		});

		dialog.addEventListener('click', (event) => {
			if (event.target === dialog) return dialog.close();
		});

		// keyboard navigation while dialog is open
		dialog.addEventListener('keydown', (e) => {
			switch (e.key) {
				case 'ArrowRight':
					e.preventDefault();
					nextImage();
					break;
				case 'ArrowLeft':
					e.preventDefault();
					previousImage();
					break;
				case 'Escape':
					dialog.close();
					break;
			}
		});

		// clean up preview when dialog closes
		dialog.addEventListener('close', () => {
			const previousPreview = dialog.querySelector(
				'[data-lightbox-preview]'
			);
			if (previousPreview) previousPreview.remove();
		});
	}

	galleryItems.forEach((img, index) => createDialog(img, index));
}

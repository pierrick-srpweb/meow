import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

// Initialiser PhotoSwipe pour toutes les galeries
document.addEventListener('DOMContentLoaded', () => {
    const galleryElement = document.getElementById('gallery-chat');

    if (galleryElement) {
        const lightbox = new PhotoSwipeLightbox({
            gallery: '#gallery-chat',
            children: 'a',
            showHideAnimationType: 'fade',
            pswpModule: () => import('photoswipe')
        });

        lightbox.init();
    }
});

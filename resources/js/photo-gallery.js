let lightboxInstance = null;

function initGallery() {
    const galleryElement = document.getElementById('gallery-chat');

    if (!galleryElement) {
        return;
    }

    if (lightboxInstance) {
        lightboxInstance.destroy();
        lightboxInstance = null;
    }

    import('photoswipe/lightbox').then(({ default: PhotoSwipeLightbox }) => {
        import('photoswipe/style.css');

        lightboxInstance = new PhotoSwipeLightbox({
            gallery: '#gallery-chat',
            children: 'a',
            showHideAnimationType: 'fade',
            pswpModule: () => import('photoswipe')
        });

        lightboxInstance.init();
    });
}

document.addEventListener('DOMContentLoaded', initGallery);
document.addEventListener('livewire:navigated', initGallery);

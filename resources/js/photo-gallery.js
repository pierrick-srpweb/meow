function initGallery() {
    const galleryElement = document.getElementById('gallery-chat');

    if (!galleryElement) {
        return;
    }

    import('photoswipe/lightbox').then(({ default: PhotoSwipeLightbox }) => {
        import('photoswipe/style.css');

        const lightbox = new PhotoSwipeLightbox({
            gallery: '#gallery-chat',
            children: 'a',
            showHideAnimationType: 'fade',
            pswpModule: () => import('photoswipe')
        });

        lightbox.init();
    });
}

document.addEventListener('DOMContentLoaded', initGallery);
document.addEventListener('livewire:navigated', initGallery);

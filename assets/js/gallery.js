document.addEventListener("DOMContentLoaded", function () {
    const galleryItems = document.querySelectorAll(".gallery-item img");
    const lightbox = document.createElement("div");
    lightbox.id = "lightbox";
    document.body.appendChild(lightbox);

    let currentIndex = 0;

    function showImage(index) {
        const imgSrc = galleryItems[index].src;
        lightbox.innerHTML = `
            <div class="lightbox-content">
                <button class="lightbox-close">&times;</button>
                <img src="${imgSrc}" alt="" class="lightbox-image">
                <button class="lightbox-prev">&#10094;</button>
                <button class="lightbox-next">&#10095;</button>
            </div>
        `;
        lightbox.classList.add("active");
        currentIndex = index;

        lightbox.querySelector(".lightbox-close").onclick = closeLightbox;
        lightbox.querySelector(".lightbox-prev").onclick = showPrev;
        lightbox.querySelector(".lightbox-next").onclick = showNext;

        document.addEventListener("keydown", handleKeyPress);
    }

    function closeLightbox() {
        lightbox.classList.remove("active");
        document.removeEventListener("keydown", handleKeyPress);
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
        showImage(currentIndex);
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % galleryItems.length;
        showImage(currentIndex);
    }

    function handleKeyPress(e) {
        if (!lightbox.classList.contains("active")) return;

        switch (e.key) {
            case "ArrowLeft":
                showPrev();
                break;
            case "ArrowRight":
                showNext();
                break;
            case "Escape":
                closeLightbox();
                break;
        }
    }

    galleryItems.forEach((img, index) => {
        img.addEventListener("click", () => {
            showImage(index);
        });
    });
});

const slider = document.getElementById("slider");
const slides = document.querySelectorAll(".slide");
const prevBtn = document.getElementById("prev");
const nextBtn = document.getElementById("next");
let index = 0;
let interval;

function showSlide(i) {
    index = (i + slides.length) % slides.length;
    slider.style.transform = `translateX(-${index * 100}%)`;
}

function nextSlide() { showSlide(index + 1); }
function prevSlide() { showSlide(index - 1); }

function startAutoSlide() {
    interval = setInterval(nextSlide, 3000);
}

function stopAutoSlide() {
    clearInterval(interval);
}

nextBtn.addEventListener("click", () => {
    nextSlide();
    stopAutoSlide();
    startAutoSlide();
});

prevBtn.addEventListener("click", () => {
    prevSlide();
    stopAutoSlide();
    startAutoSlide();
});

document.getElementById("slider-container").addEventListener("mouseover", stopAutoSlide);
document.getElementById("slider-container").addEventListener("mouseleave", startAutoSlide);

startAutoSlide();
document.addEventListener("DOMContentLoaded", function () {
  const slider = document.getElementById("slider");
  const prevButton = document.getElementById("prevButton");
  const nextButton = document.getElementById("nextButton");

  const articles = slider.querySelectorAll(".card__article");
  const numArticles = articles.length;
  const visibleArticles = 3; // Jumlah kartu yang ditampilkan pada awalnya
  let currentIndex = 0;

  // Menampilkan kartu awal
  showInitialCards();

  // Tambahkan event listener untuk tombol next
  nextButton.addEventListener("click", nextSlide);

  // Tambahkan event listener untuk tombol prev
  prevButton.addEventListener("click", prevSlide);

  function showInitialCards() {
    for (let i = 0; i < visibleArticles; i++) {
      slider.appendChild(articles[i].cloneNode(true));
    }
  }

  function showSlide() {
    slider.innerHTML = ""; // Bersihkan slider

    // Tampilkan kartu dari indeks saat ini hingga indeks + visibleArticles
    for (let i = currentIndex; i < currentIndex + visibleArticles; i++) {
      const articleIndex = i % numArticles; // Menggunakan modulo untuk memastikan pembungkusan sirkular
      slider.appendChild(articles[articleIndex].cloneNode(true));
    }
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % numArticles;
    showSlide();
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + numArticles) % numArticles;
    showSlide();
  }

  // Tambahkan interval untuk menggeser slide secara otomatis setiap 3 detik
  setInterval(nextSlide, 3000); // Change slide every 3 seconds
});

function navbarDropdown() {
    // Mengambil elemen dengan kelas "nav-mobile" yang akan diubah tampilannya
    var navItems = document.querySelector(".nav-mobile");
    
    // Pengecekan awal pada media query
    // Jika lebar layar kurang dari atau sama dengan 675px,
    // maka cek dan atur tampilan elemen "nav-mobile"
    if (window.innerWidth <= 675) {
        // Jika elemen "nav-mobile" sedang ditampilkan (tampilannya adalah "flex"),
        // maka sembunyikan elemen tersebut (atur tampilannya menjadi "none")
        if (navItems.style.display === "flex") {
            navItems.style.display = "none";
        } else {
            // Jika elemen "nav-mobile" sedang disembunyikan (tampilannya adalah "none"),
            // maka tampilkan elemen tersebut (atur tampilannya menjadi "flex")
            navItems.style.display = "flex";
        }
    }
}
    
// Menambahkan listener untuk menangani perubahan pada media query (ukuran layar)
window.addEventListener('resize', function () {
    // Jika lebar layar lebih besar dari 675px,
    // maka sembunyikan elemen "nav-mobile"
    if (window.innerWidth > 675) {
        // Mengambil kembali elemen "nav-mobile"
        var navItems = document.querySelector(".nav-mobile");
        // Mengatur tampilan elemen "nav-mobile" menjadi "none"
        navItems.style.display = "none";
    }
});

// Memanggil fungsi navbarDropdown saat halaman pertama kali dimuat
navbarDropdown();

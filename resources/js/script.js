// Untuk Navbar
window.addEventListener('scroll', function () {
    const navbar = this.document.getElementById('navbarUtama');
    // kalok di scroll
    if (this.window.scrollY > 50) {
        navbar.style.backgroundColor = 'transparent';
        navbar.style.color = '#343131';
        navbar.classList.remove('navbar-dark');
        navbar.classList.add('navbar-light');
    } else {
        // jika tidak discroll
        navbar.style.backgroundColor = '#343131';
        navbar.classList.remove('navbar-light');
        navbar.classList.add('navbar-dark');
        navbar.style.color = '';
    }
})

document.addEventListener("DOMContentLoaded", function () {
    const toggler = document.querySelector(".navbar-toggler");
    const navbarCollapse = document.querySelector("#navbarSupportedContent");

    toggler.addEventListener("click", function () {
        const isExpanded = toggler.getAttribute("aria-expanded") === "true";
        toggler.setAttribute("aria-expanded", !isExpanded);
        navbarCollapse.classList.toggle("show");
    });

    // Menutup navbar ketika klik di luar
    document.addEventListener("click", function (event) {
        if (!navbarCollapse.contains(event.target) && !toggler.contains(event.target)) {
            navbarCollapse.classList.remove("show");
            toggler.setAttribute("aria-expanded", "false");
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("dark-mode-toggle"); // Ambil tombol toggle
    const body = document.body;

    // Pastikan tombol ada sebelum menambahkan event listener
    if (!toggleButton) {
        console.error("Tombol dark mode tidak ditemukan!");
        return;
    }

    // Cek localStorage untuk mengetahui apakah dark mode sudah diaktifkan sebelumnya
    let isDarkMode = localStorage.getItem("darkMode") === "enabled";

    if (isDarkMode) {
        body.classList.add("dark-mode");
        toggleButton.textContent = "Light Mode"; // Ganti teks tombol
    }

    console.log("Dark mode sebelumnya:", isDarkMode ? "Aktif" : "Nonaktif");

    toggleButton.addEventListener("click", function () {
        isDarkMode = !isDarkMode;
        body.classList.toggle("dark-mode", isDarkMode);

        // Simpan status dark mode di localStorage
        localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");

        // Ubah teks tombol sesuai mode
        toggleButton.textContent = isDarkMode ? "Light Mode" : "Dark Mode";

        console.log("Dark mode status setelah toggle:", isDarkMode ? "Aktif" : "Nonaktif");
    });
});


document.addEventListener("DOMContentLoaded", function () {
    // Update Tahun Otomatis
    document.getElementById("year").textContent = new Date().getFullYear();

    // Mode Gelap & Mode Terang di Footer
    const body = document.body;
    const footer = document.querySelector("footer");
    const socialIcons = document.querySelectorAll(".social-link");
    const footerText = document.querySelector(".footer-text");

    function updateFooterTheme() {
        if (body.classList.contains("dark-mode")) {
            footer.style.backgroundColor = "#101820"; // Warna dark mode
            footer.classList.remove("bg-light", "text-dark");
            footer.classList.add("text-light");

            // Ubah warna ikon sosial media agar putih
            socialIcons.forEach(icon => {
                icon.classList.remove("btn-outline-dark");
                icon.classList.add("btn-outline-light");
            });

            // Ubah warna teks footer jadi putih
            footerText.classList.add("text-light");
        } else {
            footer.style.backgroundColor = ""; // Kembalikan ke default Bootstrap
            footer.classList.remove("text-light");
            footer.classList.add("bg-light", "text-dark");

            // Kembalikan warna ikon sosial media ke hitam
            socialIcons.forEach(icon => {
                icon.classList.remove("btn-outline-light");
                icon.classList.add("btn-outline-dark");
            });

            // Kembalikan warna teks footer jadi hitam
            footerText.classList.remove("text-light");
        }
    }

    updateFooterTheme();

    document.getElementById("dark-mode-toggle").addEventListener("click", function () {
        setTimeout(updateFooterTheme, 100);
    });
});






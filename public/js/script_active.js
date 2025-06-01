document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll("nav ul li a");
    const currentPage = window.location.pathname.split("/").pop();
    const savedPage = localStorage.getItem('activePage');

    function activateLink(link) {
        navLinks.forEach(navLink => {
            if (navLink.classList.contains('active')) {
                navLink.classList.remove('active');
                navLink.classList.add('shrinking');

                // Удаление класса shrinking после анимации
                setTimeout(() => {
                    navLink.classList.remove('shrinking');
                }, 600);
            }
        });

        link.classList.add('active');
        localStorage.setItem('activePage', link.getAttribute('href'));
    }

    // Проверка активной страницы
    navLinks.forEach(link => {
        const href = link.getAttribute("href");

        if (href === currentPage || href === savedPage) {
            activateLink(link);
        }

        // Обработчик клика
        link.addEventListener("click", function (e) {
            e.preventDefault(); // Предотвращаем мгновенный переход
            const clickedLink = this;

            // Проверка: если ссылка уже активна, переход сразу
            if (clickedLink.classList.contains('active')) {
                window.location.href = clickedLink.getAttribute('href');
                return;
            }

            activateLink(clickedLink);

            // Переход только после завершения анимации
            setTimeout(() => {
                window.location.href = clickedLink.getAttribute('href');
            }, 600); // Время соответствует анимации
        });
    });
});

const header = document.querySelector('header');
let lastScrollY = window.scrollY;

wwindow.addEventListener('scroll', () => {
    if (window.innerWidth < 451) return; // Если ширина экрана меньше 450px, ничего не делаем

    const currentScrollY = window.scrollY;

    if (currentScrollY > lastScrollY) {
        header.style.padding = '5px 50px';
    } else {
        header.style.padding = '20px 50px';
    }

    lastScrollY = currentScrollY;
});
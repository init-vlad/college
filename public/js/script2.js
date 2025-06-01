// Функция для анимации чисел
function animateNumber(id, endValue, duration) {
    let startValue = 0;
    let step = endValue / (duration / 50); // Каждые 50 миллисекунд увеличиваем на step
    let elem = document.getElementById(id);

    let interval = setInterval(() => {
        startValue += step;
        if (startValue >= endValue) {
            startValue = endValue;
            clearInterval(interval); // Останавливаем анимацию, когда значение достигло цели
        }
        elem.textContent = Math.round(startValue); // Обновляем текст элемента
    }, 50);
}

// Запуск анимации после загрузки страницы
window.addEventListener('load', () => {
    animateNumber('students-count', 1050, 3000);
    animateNumber('teachers-count', 56, 3000);
    animateNumber('years-count', 15, 3000);
    animateNumber('specialties-count', 4, 3000);
    animateNumber('org-count', 4, 3000);
});

// Открытие модального окна
function openModal() {
    const modal = document.getElementById('modal');
    modal.classList.remove('hidden');
}

// Закрытие модального окна
function closeModal() {
    const modal = document.getElementById('modal');
    modal.classList.add('hidden');
}

// Обработка отправки формы модального окна
const modalForm = document.querySelector('#modal form');
modalForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем перезагрузку страницы

    const formData = new FormData(modalForm);
    const name = formData.get('name');
    const school = formData.get('school');
    const phone = formData.get('phone');

    alert(`Спасибо за заявку, ${name}! Мы свяжемся с вами в ближайшее время.`);
    closeModal();
});

// Обработка отправки контактной формы
const contactForm = document.querySelector('.contact-form form');
contactForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(contactForm);
    const name = formData.get('name');
    const phone = formData.get('phone');

    alert(`Спасибо, ${name}! Мы свяжемся с вами по указанному номеру: ${phone}.`);
    contactForm.reset();
});


// ===== Модальное окно входа =====

// Modern Modal System
function openAuthModal() {
    const modal = document.getElementById('authModal');
    modal.classList.add('show');
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeAuthModal() {
    const modal = document.getElementById('authModal');
    modal.classList.remove('show');
    document.body.style.overflow = ''; // Restore scrolling
}

// Close modal when clicking outside
document.getElementById('authModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAuthModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAuthModal();
    }
});

// Form submission with modern handling
const authForm = document.querySelector('#authModal form');
if (authForm) {
    authForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(authForm);
        const login = formData.get('login');
        const password = formData.get('password');
        
        if (!login || !password) {
            showNotification('Пожалуйста, заполните все поля', 'error');
            return;
        }

        // Show loading state
        const submitBtn = authForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Вход...';
        submitBtn.disabled = true;

        // Send form data to API
        fetch('api/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(`Добро пожаловать, ${data.full_name}!`, 'success');
                closeAuthModal();
                
                // Redirect based on role
                setTimeout(() => {
                    switch(data.role) {
                        case 'admin':
                            window.location.href = 'admin.html';
                            break;
                        case 'teacher':
                            window.location.href = 'teacher.html';
                            break;
                        case 'student':
                            window.location.href = 'student.html';
                            break;
                        default:
                            window.location.reload();
                    }
                }, 1500);
            } else {
                showNotification(data.message || 'Ошибка входа', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Произошла ошибка. Попробуйте еще раз.', 'error');
        })
        .finally(() => {
            // Restore button state
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });
}

// Modern notification system
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notif => notif.remove());

    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-icon">
                ${type === 'success' ? '✅' : type === 'error' ? '❌' : 'ℹ️'}
            </span>
            <span class="notification-message">${message}</span>
        </div>
    `;

    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 10000;
        background: ${type === 'success' ? 'hsl(var(--primary))' : type === 'error' ? 'hsl(var(--destructive))' : 'hsl(var(--secondary))'};
        color: ${type === 'success' ? 'hsl(var(--primary-foreground))' : type === 'error' ? 'hsl(var(--destructive-foreground))' : 'hsl(var(--secondary-foreground))'};
        padding: var(--space-md) var(--space-lg);
        border-radius: var(--radius);
        box-shadow: var(--shadow-lg);
        transform: translateX(100%);
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 400px;
        font-weight: 500;
    `;

    notification.querySelector('.notification-content').style.cssText = `
        display: flex;
        align-items: center;
        gap: var(--space-sm);
    `;

    document.body.appendChild(notification);

    // Animate in
    requestAnimationFrame(() => {
        notification.style.transform = 'translateX(0)';
    });

    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
    }, 5000);

    // Click to dismiss
    notification.addEventListener('click', () => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
    });
}

// Mobile menu functionality
const burgerMenu = document.querySelector('.burger-menu');
const nav = document.querySelector('nav');

if (burgerMenu && nav) {
    burgerMenu.addEventListener('click', function() {
        nav.classList.toggle('show');
        burgerMenu.classList.toggle('active');
        
        // Animate burger lines
        const lines = burgerMenu.querySelectorAll('div');
        if (burgerMenu.classList.contains('active')) {
            lines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
            lines[1].style.opacity = '0';
            lines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
        } else {
            lines[0].style.transform = 'none';
            lines[1].style.opacity = '1';
            lines[2].style.transform = 'none';
        }
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all animated elements
document.querySelectorAll('.animate-fade-in, .animate-slide-up, .card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// Header background on scroll
let lastScrollTop = 0;
const header = document.querySelector('header');

window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > 100) {
        header.style.background = 'rgba(255, 255, 255, 0.95)';
        header.style.boxShadow = 'var(--shadow-md)';
    } else {
        header.style.background = 'rgba(255, 255, 255, 0.8)';
        header.style.boxShadow = 'none';
    }
    
    lastScrollTop = scrollTop;
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Add loading animation to page
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.5s ease';
    
    requestAnimationFrame(() => {
        document.body.style.opacity = '1';
    });
});


// MOI CODE 


document.addEventListener("DOMContentLoaded", () => {
    // 1. Себетке қосу түймешіктеріне әсер беру
    const buyButtons = document.querySelectorAll(".btn-buy");
    buyButtons.forEach(button => {
        button.addEventListener("click", () => {
            alert("Тауар сәтті себетке қосылды! 🌸");
        });
    });

    // 2. Кіру формасын тексеру (Валидация мысалы)
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const email = document.getElementById("email").value;
            alert(`Қош келдіңіз, ${email}! Жүйеге сәтті кірдіңіз.`);
        });
    }
});
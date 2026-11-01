<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гүл Дүкені - Кіру</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">🌸 ГүлМаркет</div>
        <nav>
            <a href="index.php">Басты бет</a>
            <a href="catalog.php">Каталог</a>
            <a href="login.php" class="active">Кіру / Тіркелу</a>
        </nav>
    </header>

    <main class="form-container">
        <div class="form-box">
            <h2>Жүйеге кіру</h2>
            <form id="loginForm">
                <div class="input-group">
                    <label for="email">Электронды пошта:</label>
                    <input type="email" id="email" required placeholder="name@example.com">
                </div>
                <div class="input-group">
                    <label for="password">Құпиясөз:</label>
                    <input type="password" id="password" required placeholder="••••••••">
                </div>
                <button type="submit" class="btn">Кіру</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Шағын онлайн гүл дүкені[cite: 1].</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
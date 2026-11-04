<?php include 'header.php'; ?>

<main class="form-container">
    <div class="form-box">
        <h2>Жүйеге кіру</h2>
        <form method="POST">
            <div class="input-group">
                <label for="email">Электронды пошта:</label>
                <input type="email" id="email" name="email" required placeholder="example@mail.kz">
            </div>
            <div class="input-group">
                <label for="password">Құпиясөз:</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn" style="width: 100%;">Кіру</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
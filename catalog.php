<?php include 'header.php'; ?>

<div class="container">
    <h2>Гүлдер каталогы және тапсырыс беру</h2>

    <?php
    // Форма жіберілген кезде сервер арқылы өңдеу ($_POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $flower = htmlspecialchars($_POST['flower_name']);
        $name = htmlspecialchars($_POST['client_name']);
        $phone = htmlspecialchars($_POST['client_phone']);

        if (!empty($flower) && !empty($name) && !empty($phone)) {
            echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 20px 0;'>Құрметті <b>$name</b>, сіздің <b>$flower</b> тауарына жасаған тапсырысыңыз қабылданды! Біз сізге $phone нөмірі арқылы хабарласамыз. 🌸</div>";
        } else {
            echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 20px 0;'>Барлық өрістерді толтыру міндетті!</div>";
        }
    }
    ?>

    <div class="product-grid">
        <div class="product-card">
            <h3>Қызыл раушан (15 дана)</h3>
            <p class="desc">15 000 ₸</p>
            <form method="POST">
                <input type="hidden" name="flower_name" value="Қызыл раушан (15 дана)">
                <div style="margin-bottom: 10px;">
                    <input type="text" name="client_name" placeholder="Атыңыз" required style="width: 100%; padding: 8px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <input type="text" name="client_phone" placeholder="Телефон нөмірі" required style="width: 100%; padding: 8px;">
                </div>
                <button type="submit" class="btn-buy">Тапсырыс беру</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
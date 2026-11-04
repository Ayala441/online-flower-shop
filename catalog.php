<?php include 'header.php'; ?>

<div class="container">
    <h2>Гүлдер каталогы</h2>

    <!-- Іздеу жолағы -->
    <div style="margin: 25px 0; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <form method="GET" style="display: flex; justify-content: center; gap: 10px;">
            <input type="text" name="search" placeholder="Қалаған гүліңізді іздеңіз (Мысалы: Раушан немесе Түймедақ)..." 
                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                   style="padding: 10px 15px; width: 350px; border: 1px solid #ddd; border-radius: 5px; outline: none;">
            <button type="submit" class="btn" style="padding: 10px 20px;">Іздеу</button>
        </form>
    </div>

    <?php
    // Тапсырыс қабылданған кезде шығатын хабарлама ($_POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $flower = htmlspecialchars($_POST['flower_name']);
        $name = htmlspecialchars($_POST['client_name']);
        $phone = htmlspecialchars($_POST['client_phone']);

        if (!empty($flower) && !empty($name) && !empty($phone)) {
            echo "<div class='alert-success'>Құрметті <b>$name</b>, сіздің <b>$flower</b> тауарына жасаған тапсырысыңыз сәтті қабылданды! Біз сізге жақын арада $phone нөмірі арқылы хабарласамыз. 🌸</div>";
        } else {
            echo "<div class='alert-error'>Барлық өрістерді толтыру міндетті!</div>";
        }
    }

    // $_GET арқылы іздеу сөзін алу
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $searchLower = mb_strtolower($search, 'UTF-8');

    // Қай өнімдер көрсетілетінін анықтау шарттары
    $showAll = ($search === '');
    $showRose = ($searchLower !== '' && (str_contains($searchLower, 'раушан') || str_contains($searchLower, 'қызыл')));
    $showDaisy = ($searchLower !== '' && (str_contains($searchLower, 'түймедақ') || str_contains($searchLower, 'ақ')));
    ?>

    <div class="product-grid">
        <!-- 1-ші өнім: Қызыл раушан -->
        <?php if ($showAll || $showRose): ?>
        <div class="product-card">
            <h3>Қызыл раушан (15 дана)</h3>
            <p class="desc">15 000 ₸</p>
            <form method="POST">
                <input type="hidden" name="flower_name" value="Қызыл раушан (15 дана)">
                <div class="input-group" style="margin-bottom: 10px;">
                    <input type="text" name="client_name" placeholder="Атыңыз" required style="width: 100%; padding: 8px;">
                </div>
                <div class="input-group" style="margin-bottom: 10px;">
                    <input type="text" name="client_phone" placeholder="Телефон нөмірі" required style="width: 100%; padding: 8px;">
                </div>
                <button type="submit" class="btn-buy">Тапсырыс беру</button>
            </form>
        </div>
        <?php endif; ?>

        <!-- 2-ші өнім: Ақ түймедақтар -->
        <?php if ($showAll || $showDaisy): ?>
        <div class="product-card">
            <h3>Ақ түймедақтар жинағы (10 дана)</h3>
            <p class="desc">10 000 ₸</p>
            <form method="POST">
                <input type="hidden" name="flower_name" value="Ақ түймедақтар жинағы (10 дана)">
                <div class="input-group" style="margin-bottom: 10px;">
                    <input type="text" name="client_name" placeholder="Атыңыз" required style="width: 100%; padding: 8px;">
                </div>
                <div class="input-group" style="margin-bottom: 10px;">
                    <input type="text" name="client_phone" placeholder="Телефон нөмірі" required style="width: 100%; padding: 8px;">
                </div>
                <button type="submit" class="btn-buy">Тапсырыс беру</button>
            </form>
        </div>
        <?php endif; ?>
    </div>

    <?php 
    // Егер іздеген гүл табылмай қалса ескерту шығару
    if (!$showAll && !$showRose && !$showDaisy) {
        echo "<p style='text-align: center; color: #721c24; margin-top: 30px; font-size: 16px;'>Кешіріңіз, <b>'" . htmlspecialchars($search) . "'</b> бойынша ешқандай гүл табылмады.</p>";
    }
    ?>
</div>

<?php include 'footer.php'; ?>
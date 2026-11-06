<?php include 'header.php'; ?>

<div class="container" style="max-width: 1100px; margin: 20px auto; padding: 0 20px;">
    <h2 style="text-align: center; color: #ad1457; margin-bottom: 20px;">Гүлдер каталогы және тапсырыс беру</h2>

    <!-- Іздеу жолағы ($_GET) -->
    <div style="margin: 20px 0; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); text-align: center;">
        <form method="GET" style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
            <input type="text" name="search" placeholder="Қалаған гүліңізді іздеңіз (Раушан, Түймедақ, Пион)..." 
                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                   style="padding: 10px 15px; width: 350px; border: 1px solid #ddd; border-radius: 5px; outline: none;">
            <button type="submit" class="btn" style="background: #ad1457; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold;">Іздеу</button>
        </form>
    </div>

    <?php
    // Тапсырысты серверде өңдеу ($_POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $flower = htmlspecialchars($_POST['flower_name']);
        $name = htmlspecialchars($_POST['client_name']);
        $phone = htmlspecialchars($_POST['client_phone']);

        if (!empty($flower) && !empty($name) && !empty($phone)) {
            echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;'>Құрметті <b>$name</b>, сіздің <b>$flower</b> тауарына жасаған тапсырысыңыз сәтті қабылданды! Біз сізге жақын арада $phone нөмірі арқылы хабарласамыз. 🌸</div>";
        } else {
            echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;'>Барлық өрістерді толтыру міндетті!</div>";
        }
    }

    // Іздеу сүзгісі
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $searchLower = mb_strtolower($search, 'UTF-8');

    $showAll = ($search === '');
    $showRose = ($searchLower !== '' && (str_contains($searchLower, 'раушан') || str_contains($searchLower, 'қызыл')));
    $showDaisy = ($searchLower !== '' && (str_contains($searchLower, 'түймедақ') || str_contains($searchLower, 'ақ')));
    $showPeony = ($searchLower !== '' && (str_contains($searchLower, 'пион') || str_contains($searchLower, 'меерекелік')));
    ?>

    <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        
        <!-- 1-ші өнім -->
        <?php if ($showAll || $showRose): ?>
        <div class="product-card" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); text-align: center;">
            <h3 style="color: #ad1457; margin-bottom: 10px;">Қызыл раушан (15 дана)</h3>
            <p class="desc" style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 15px;">15 000 ₸</p>
            <form method="POST">
                <input type="hidden" name="flower_name" value="Қызыл раушан (15 дана)">
                <div style="margin-bottom: 10px;">
                    <input type="text" name="client_name" placeholder="Атыңыз" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="text" name="client_phone" placeholder="Телефон нөмірі" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <button type="submit" style="background: #e91e63; color: white; border: none; padding: 10px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold;">Тапсырыс беру</button>
            </form>
        </div>
        <?php endif; ?>

        <!-- 2-ші өнім -->
        <?php if ($showAll || $showDaisy): ?>
        <div class="product-card" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); text-align: center;">
            <h3 style="color: #ad1457; margin-bottom: 10px;">Ақ түймедақтар жинағы (10 дана)</h3>
            <p class="desc" style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 15px;">10 000 ₸</p>
            <form method="POST">
                <input type="hidden" name="flower_name" value="Ақ түймедақтар жинағы (10 дана)">
                <div style="margin-bottom: 10px;">
                    <input type="text" name="client_name" placeholder="Атыңыз" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="text" name="client_phone" placeholder="Телефон нөмірі" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <button type="submit" style="background: #e91e63; color: white; border: none; padding: 10px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold;">Тапсырыс беру</button>
            </form>
        </div>
        <?php endif; ?>

        <!-- 3-ші өнім (Жаңа қосылған пиондар) -->
        <?php if ($showAll || $showPeony): ?>
        <div class="product-card" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); text-align: center;">
            <h3 style="color: #ad1457; margin-bottom: 10px;">Мерекелік пиондар (7 дана)</h3>
            <p class="desc" style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 15px;">22 000 ₸</p>
            <form method="POST">
                <input type="hidden" name="flower_name" value="Мерекелік пиондар (7 дана)">
                <div style="margin-bottom: 10px;">
                    <input type="text" name="client_name" placeholder="Атыңыз" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="text" name="client_phone" placeholder="Телефон нөмірі" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <button type="submit" style="background: #e91e63; color: white; border: none; padding: 10px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold;">Тапсырыс беру</button>
            </form>
        </div>
        <?php endif; ?>

    </div>

    <?php 
    if (!$showAll && !$showRose && !$showDaisy && !$showPeony) {
        echo "<p style='text-align: center; color: #721c24; margin-top: 30px; font-size: 16px;'>Кешіріңіз, <b>'" . htmlspecialchars($search) . "'</b> бойынша ешқандай гүл табылмады.</p>";
    }
    ?>
</div>

<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<div class="container" style="max-width: 1200px; margin: 20px auto; padding: 0 20px;">
    <h2 style="text-align: center; color: #ad1457; margin-bottom: 10px;">🌸 Гүлдер каталогы</h2>
    <p style="text-align: center; color: #666; margin-bottom: 25px;">Өзіңізге ұнаған әдемі гүл шоғын таңдап, жылдам тапсырыс беріңіз</p>

    <!-- Іздеу жолағы ($_GET) -->
    <div style="margin: 20px 0; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(233,30,99,0.05); text-align: center;">
        <form method="GET" style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
            <input type="text" name="search" placeholder="Гүл атауы бойынша іздеу (Раушан, Пион, Түймедақ, Қызғалдақ...)" 
                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                   style="padding: 10px 15px; width: 350px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
            <button type="submit" class="btn" style="background: #ad1457; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-weight: bold;">Іздеу</button>
        </form>
    </div>

    <?php
    // Тапсырысты серверде өңдеу ($_POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $flower = htmlspecialchars($_POST['flower_name']);
        $name = htmlspecialchars($_POST['client_name']);
        $phone = htmlspecialchars($_POST['client_phone']);

        if (!empty($flower) && !empty($name) && !empty($phone)) {
            echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;'>Құрметті <b>$name</b>, сіздің <b>$flower</b> тауарына жасаған тапсырысыңыз сәтті қабылданды! Жақын арада $phone нөмірі арқылы хабарласамыз. 🤍</div>";
        } else {
            echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;'>Барлық өрістерді толтыру міндетті!</div>";
        }
    }

    // Іздеу сүзгісі
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $searchLower = mb_strtolower($search, 'UTF-8');

    // Локалды images/ папкасындағы суреттер арқылы 8 түрлі букет
    $flowers = [
        [
            "name" => "Қызыл раушан шоғы (15 дана)",
            "price" => "15 000 ₸",
            "img" => "images/roza.jpg",
            "keywords" => ["раушан", "қызыл", "розы"]
        ],
        [
            "name" => "Ақ түймедақтар букеті (10 дана)",
            "price" => "10 000 ₸",
            "img" => "images/tuymedak.jpg",
            "keywords" => ["түймедақ", "ақ", "ромашки"]
        ],
        [
            "name" => "Мерекелік пиондар букеті (7 дана)",
            "price" => "22 000 ₸",
            "img" => "images/pion.jpg",
            "keywords" => ["пион", "мерекелік", "пионы"]
        ],
        [
            "name" => "Нәзік қызғалдақтар (11 дана)",
            "price" => "12 000 ₸",
            "img" => "images/qyzgaldak.jpg",
            "keywords" => ["қызғалдақ", "тюльпаны"]
        ],
        [
            "name" => "Ақ раушан гүл шоғы (21 дана)",
            "price" => "20 000 ₸",
            "img" => "images/white_roza.jpg",
            "keywords" => ["раушан", "ақ"]
        ],
        [
            "name" => "Микс жазғы гүлдер букеті",
            "price" => "17 500 ₸",
            "img" => "images/mix.jpg",
            "keywords" => ["микс", "жазғы", "аула"]
        ],
        [
            "name" => "Премиум гортензия букеті",
            "price" => "25 000 ₸",
            "img" => "images/gortenziya.jpg",
            "keywords" => ["гортензия", "премиум"]
        ],
        [
            "name" => "Қызғылт қалампырлар шоғы",
            "price" => "9 500 ₸",
            "img" => "images/kalampyr.jpg",
            "keywords" => ["қалампыр", "қызғылт"]
        ]
    ];

    $foundCount = 0;
    ?>

    <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
        <?php foreach ($flowers as $f): 
            $match = true;
            if ($search !== '') {
                $match = false;
                foreach ($f['keywords'] as $kw) {
                    if (str_contains($searchLower, $kw) || str_contains($kw, $searchLower)) {
                        $match = true;
                        break;
                    }
                }
            }

            if ($match):
                $foundCount++;
        ?>
        <div class="product-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <img src="<?php echo $f['img']; ?>" alt="<?php echo $f['name']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 15px;">
                    <h3 style="color: #ad1457; font-size: 16px; margin-bottom: 8px;"><?php echo $f['name']; ?></h3>
                    <p style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 15px;"><?php echo $f['price']; ?></p>
                </div>
            </div>
            
            <div style="padding: 0 15px 15px 15px;">
                <form method="POST">
                    <input type="hidden" name="flower_name" value="<?php echo $f['name']; ?>">
                    <div style="margin-bottom: 8px;">
                        <input type="text" name="client_name" placeholder="Атыңыз" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; outline: none;">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <input type="text" name="client_phone" placeholder="Телефон нөміріңіз" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; outline: none;">
                    </div>
                    <button type="submit" style="background: #e91e63; color: white; border: none; padding: 10px; width: 100%; border-radius: 6px; cursor: pointer; font-weight: bold; transition: background 0.3s;">Тапсырыс беру</button>
                </form>
            </div>
        </div>
        <?php endif; endforeach; ?>
    </div>

    <?php if ($foundCount === 0): ?>
        <p style="text-align: center; color: #721c24; margin-top: 40px; font-size: 16px;">Кешіріңіз, <b>'<?php echo htmlspecialchars($search); ?>'</b> бойынша ешқандай гүл табылмады.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>

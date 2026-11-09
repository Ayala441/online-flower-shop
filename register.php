<?php
session_start();
require_once 'db.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Барлық өрістерді толтыру міндетті!";
    } elseif ($password !== $confirm_password) {
        $error = "Құпия сөздер сәйкес келмейді!";
    } else {
        // Поштаның бұрын тіркелгенін тексеру
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $error = "Бұл электрондық пошта арқылы бұрын тіркеліп қойған!";
        } else {
            // Парольді қауіпсіз шифрлау (hash)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Дерекқорға сақтау
            $insertStmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($insertStmt->execute([$name, $email, $hashedPassword])) {
                $success = "Тіркелу сәтті өтті! Енді кіру бетінен кіре аласыз.";
            } else {
                $error = "Қате орын алды, қайта көріңіз.";
            }
        }
    }
}
?>

<?php include 'header.php'; ?>

<div class="container" style="max-width: 450px; margin: 40px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(233,30,99,0.08);">
    <h2 style="text-align: center; color: #ad1457; margin-bottom: 5px;">Тіркелу</h2>
    <p style="text-align: center; color: #777; font-size: 14px; margin-bottom: 25px;">Жаңа аккаунт ашыңыз</p>

    <?php if (!empty($error)): ?>
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 14px;"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 14px;"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div style="margin-bottom: 12px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Аты-жөніңіз</label>
            <input type="text" name="name" placeholder="Аяла" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <div style="margin-bottom: 12px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Электрондық пошта</label>
            <input type="email" name="email" placeholder="mail@example.com" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <div style="margin-bottom: 12px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Құпия сөз</label>
            <input type="password" name="password" placeholder="••••••••" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Құпия сөзді қайталаңыз</label>
            <input type="password" name="confirm_password" placeholder="••••••••" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <button type="submit" style="width: 100%; background: #e91e63; color: white; border: none; padding: 12px; border-radius: 25px; font-weight: bold; cursor: pointer;">Тіркелу</button>
    </form>

    <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #666;">
        Аккаунтыңыз бар ма? <a href="login.php" style="color: #e91e63; text-decoration: none; font-weight: bold;">Кіру</a>
    </p>
</div>

<?php include 'footer.php'; ?>
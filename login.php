<?php
session_start();
require_once 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Барлық өрістерді толтырыңыз!";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Құпия сөзді тексеру
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            
            header("Location: profile.php"); // Кірген соң бағытталатын бет
            exit();
        } else {
            $error = "Электрондық пошта или құпия сөз қате!";
        }
    }
}
?>

<?php include 'header.php'; ?>

<div class="container" style="max-width: 450px; margin: 50px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(233,30,99,0.08);">
    <h2 style="text-align: center; color: #ad1457; margin-bottom: 5px;">Кіру</h2>
    <p style="text-align: center; color: #777; font-size: 14px; margin-bottom: 25px;">Жеке кабинетіңізге кіріңіз</p>

    <?php if (!empty($error)): ?>
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 14px;"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Электрондық пошта</label>
            <input type="email" name="email" placeholder="mail@example.com" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Құпия сөз</label>
            <input type="password" name="password" placeholder="••••••••" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <button type="submit" style="width: 100%; background: #e91e63; color: white; border: none; padding: 12px; border-radius: 25px; font-weight: bold; cursor: pointer;">Кіру</button>
    </form>

    <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #666;">
        Аккаунтыңыз жоқ па? <a href="register.php" style="color: #e91e63; text-decoration: none; font-weight: bold;">Тіркелу</a>
    </p>
</div>

<?php include 'footer.php'; ?>
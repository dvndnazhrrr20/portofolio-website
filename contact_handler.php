<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil dan bersihkan data input
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // 2. Validasi data
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Jika ada error, kembali ke halaman utama dengan pesan error
        header("Location: index.php?status=error");
        exit;
    }

    // 3. Konfigurasi Email
    $recipient = "emailanda@example.com"; // GANTI DENGAN EMAIL ANDA
    $subject = "Pesan Baru dari Portofolio dari $name";
    $email_content = "Nama: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Pesan:\n$message\n";
    $email_headers = "From: $name <$email>";

    // 4. Kirim Email
    // mail() mungkin tidak berfungsi di localhost tanpa konfigurasi server email.
    // Saat di-hosting online, ini biasanya akan berfungsi.
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Jika berhasil, kembali ke halaman utama dengan pesan sukses
        header("Location: index.php?status=success#contact");
    } else {
        // Jika gagal, kembali dengan pesan error
        header("Location: index.php?status=error#contact");
    }

} else {
    // Jika file diakses langsung
    header("Location: index.php");
}
?>
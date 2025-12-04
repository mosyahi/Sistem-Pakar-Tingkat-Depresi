<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f7f7f7; }
        .logo { display: block; margin: 0 auto; }
        h1 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; }
        td { padding: 10px; }
        strong { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kritik dan Saran</h1>
        <table>
            <tr><td>Nama Lengkap</td><td>: <?= htmlspecialchars($name) ?></td></tr>
            <tr><td>Email</td><td>: <?= htmlspecialchars($email) ?></td></tr>
        </table>
        <p><strong>Judul Pesan:</strong></p>
        <p><?= htmlspecialchars($subject) ?></p>
        <p><strong>Isi Pesan:</strong></p>
        <p><?= nl2br(htmlspecialchars($message)) ?></p>
    </div>
</body>
</html>

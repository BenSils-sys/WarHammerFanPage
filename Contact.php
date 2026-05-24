<?php

$required_fields = ['fullName', 'emailAddress', 'subject', 'message'];
$errors = [];
$data   = [];

foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        $errors[$field] = true;
    } else {
        $data[$field] = htmlspecialchars(trim($_POST[$field]), ENT_QUOTES, 'UTF-8');
    }
}

if (!empty($data['message']) && strlen($data['message']) < 20) {
    $errors['message'] = true;
}

if (!empty($data['emailAddress']) && !filter_var($data['emailAddress'], FILTER_VALIDATE_EMAIL)) {
    $errors['emailAddress'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warhammer 40K — Contact Response</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="StyleWH.css">
    <style>
        .response-box {
            background: #101b2d;
            border: 1px solid #ffb703;
            border-radius: 10px;
            padding: 2.5rem;
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        .response-box h2 {
            font-family: 'Cinzel', serif;
            color: #ffb703;
            letter-spacing: 2px;
            margin-bottom: 1.5rem;
        }
        .response-box .detail-label {
            color: #ffb703;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
        }
        .response-box .detail-value {
            color: #ffffff;
            background: #1a2638;
            border-left: 3px solid #ffb703;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .error-box {
            background: #1a0a0a;
            border: 1px solid #dc3545;
            border-radius: 10px;
            padding: 2.5rem;
            margin-top: 3rem;
        }
        .error-box h2 {
            font-family: 'Cinzel', serif;
            color: #dc3545;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark custom-nav sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">WARHAMMER 40K</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="FactionsWH.html">Factions</a></li>
                    <li class="nav-item"><a class="nav-link" href="VideosWH.html">Videos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

<?php if (!empty($errors)): ?>

        <div class="error-box">
            <h2>⚠ Transmission Incomplete</h2>
            <p class="mt-3" style="color:#c9d1d9;">
                The Administratum could not process your request. The following fields require attention:
            </p>
            <ul class="mt-2" style="color:#f87171;">
                <?php if (!empty($errors['fullName'])): ?>
                    <li>Full Name is required.</li>
                <?php endif; ?>
                <?php if (!empty($errors['emailAddress'])): ?>
                    <li>A valid Email Address is required.</li>
                <?php endif; ?>
                <?php if (!empty($errors['subject'])): ?>
                    <li>Subject is required.</li>
                <?php endif; ?>
                <?php if (!empty($errors['message'])): ?>
                    <li>Message is required and must be at least 20 characters long.</li>
                <?php endif; ?>
            </ul>
            <a href="index.html" class="btn btn-warning mt-3">← Return to the Form</a>
        </div>

<?php else: ?>

        <div class="response-box">
            <h2>✔ Transmission Received</h2>
            <p style="color:#c9d1d9; margin-bottom:1.5rem;">
                Greetings, <strong style="color:#ffb703;"><?= $data['fullName'] ?></strong>.
                Your message has been recorded by the Administratum and forwarded to the relevant authorities.
                The Emperor thanks you for your loyalty.
            </p>

            <p class="detail-label">Full Name</p>
            <div class="detail-value"><?= $data['fullName'] ?></div>

            <p class="detail-label">Email Address</p>
            <div class="detail-value"><?= $data['emailAddress'] ?></div>

            <p class="detail-label">Subject</p>
            <div class="detail-value"><?= $data['subject'] ?></div>

            <p class="detail-label">Message</p>
            <div class="detail-value" style="white-space:pre-wrap;"><?= $data['message'] ?></div>

            <a href="index.html" class="btn btn-warning mt-3">← Return to the Imperium</a>
        </div>

<?php endif; ?>

    </div>

    <footer class="footer text-center">
        <span class="footer-brand">WARHAMMER 40K FAN SITE</span>
        <p>Web Development Fundamentals | A.Y. 2025–2026</p>
        <p class="mt-1"><a href="https://github.com" target="_blank">GitHub Pages</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
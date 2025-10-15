<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
function nice_datetime(): string { return date('j F Y, h:i A'); }

$amount_raw = isset($_GET['FloatAmount']) ? (float) $_GET['FloatAmount'] : 0;
$name       = get_donor_name();
$amount_txt = get_donor_amount();
$ref_id     = shortcode_donor_ref_id();
$type       = get_donation_type($amount_raw);
$date_txt   = nice_datetime();

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pledge Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body>

  <header class="container py-3">
    <nav class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center gap-2">
        <img
          src="https://donate.makna.org.my/wp-content/uploads/2025/06/Logo-transparent_white-859x1024.png"
          class="brand-logo"
          alt="MAKNA Logo">
        <span class="brand-name">MAKNA</span>
      </div>
      <button class="btn btn-outline-light btn-sm d-md-none" type="button" aria-label="Open menu">Menu</button>
    </nav>
  </header>

  <main class="container pb-5">
    <section class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-7 text-center">

        <h1 class="hero-hi mb-2">HI <?php echo htmlspecialchars(strtoupper($name), ENT_QUOTES, 'UTF-8'); ?>,</h1>
        <h2 class="hero-thanks display-6 mb-4">From Our Hearts,<br>Thank You</h2>

        <p class="text-uppercase small fw-semibold mb-3" style="opacity:.8;">Pledge Confirmation</p>

        <div class="card-soft p-3 p-md-4 mb-4 text-start">
          <div class="meta-row">
            <div class="meta-title">Amount:</div>
            <div class="text-end">
              <?php
                $amount_line = $amount_txt;
                echo htmlspecialchars($amount_line, ENT_QUOTES, 'UTF-8');
              ?>
            </div>
          </div>

          <div class="divider"></div>

          <div class="meta-row">
            <div class="meta-title">Reference ID:</div>
            <div class="text-end"><?php echo htmlspecialchars($ref_id, ENT_QUOTES, 'UTF-8'); ?></div>
          </div>

          <div class="divider"></div>

          <div class="meta-row">
            <div class="meta-title">Date :</div>
            <div class="text-end"><?php echo htmlspecialchars($date_txt, ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>

        <span class="badge-type mb-4"><?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?></span>

        <p class="lead-copy mb-3">Your continuous support brings strength to those in their most vulnerable moments.</p>
        <p class="lead-copy mb-4">With your help, we can reach more lives, offer more care, and spark more hope.</p>
        <p class="lead-copy mb-4">
          Thank you for choosing to walk this journey with us. Your kindness truly matters.<br>– The MAKNA Team –
        </p>

        <div class="d-grid gap-2 d-sm-flex justify-content-center">
          <a class="btn btn-outline-pink px-4" href="#" role="button">Hey, How’d You Find Us?</a>
          <a class="btn btn-primary-pink px-4" href="#" role="button">Discover MAKNA</a>
        </div>

      </div>
    </section>
  </main>

  <footer class="container text-center py-4" style="opacity:.7;">
    <small>&copy; <?php echo date('Y'); ?> MAKNA</small>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>

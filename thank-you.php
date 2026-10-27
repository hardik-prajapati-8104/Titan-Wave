<?php
$pageTitle = 'Thank You | TITAN WAVE';
$pageDesc = 'Your enquiry has been submitted successfully. The TITAN WAVE team will be in touch.';
include_once('elements/header.php');
?>
<main id="main">
    <section class="section alt" style="min-height:58vh;display:flex;align-items:center">
        <div class="container">
            <div style="max-width:680px;margin:0 auto;padding:clamp(32px,6vw,64px) 28px;text-align:center;background:#fff;border-radius:12px;box-shadow:0 12px 40px rgba(0,0,0,.08);border-top:4px solid #e50914">
                <div aria-hidden="true" style="width:66px;height:66px;line-height:66px;margin:0 auto 20px;border-radius:50%;background:#eaf7ef;color:#198754;font-size:36px;font-weight:700">&#10003;</div>
                <span class="eyebrow">Message Received</span>
                <h1 style="margin:12px 0">Thank You!</h1>
                <p style="max-width:500px;margin:0 auto 26px">Your enquiry has been submitted successfully. The TITAN WAVE team will review your message and get back to you as soon as possible.</p>
                <a href="index.php" class="btn btn-gold">Back to Home</a>
            </div>
        </div>
    </section>
</main>
<?php include_once('elements/footer.php'); ?>

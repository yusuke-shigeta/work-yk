<?php get_header(); ?>

<main id="page-contact" class="main">

  <?php
  $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = "お問い合わせ";
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <form action="" method="post">
    <label for="name">名前:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">メールアドレス:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">メッセージ:</label>
    <textarea id="message" name="message" required></textarea>

    <input type="submit" name="submit" value="送信">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = "dnw.webx@gmail.com"; // 送信先のメールアドレスに変更してください
    $subject = "お問い合わせフォームからのメッセージ";
    $headers = "From: $email";

    $body = "名前: $name\nメールアドレス: $email\nメッセージ:\n$message";

    if (mail($to, $subject, $body, $headers)) {
      echo '<p>メッセージが送信されました。</p>';
    } else {
      echo '<p>メッセージの送信に失敗しました。</p>';
    }
  }
  ?>

</main>

<?php get_footer(); ?>
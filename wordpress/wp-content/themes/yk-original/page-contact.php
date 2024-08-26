<?php get_header(); ?>

<main id="page-contact" class="main">

  <?php
  $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = "お問い合わせ";
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <form action="" method="post">
    <label for="name">名前:</label>
    <input type="text" id="name" name="user_name" required>

    <label for="email">メールアドレス:</label>
    <input type="email" id="email" name="user_email" required>

    <label for="message">メッセージ:</label>
    <textarea id="message" name="user_message" required></textarea>

    <input type="submit" name="submit" value="送信">
  </form>

  <?php var_dump($_SERVER['REQUEST_URI']); ?>
  <?php var_dump(esc_url($_SERVER['REQUEST_URI'])); ?>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_text_field($_POST['user_name']);
    $email = sanitize_email($_POST['user_email']);
    $message = sanitize_textarea_field($_POST['user_message']);

    $to = "dnw.webx@gmail.com"; // 送信先のメールアドレスに変更してください
    $subject = "お問い合わせフォームからのメッセージ";
    $headers = "From: 株式会社YK管理者向け <dnw.webx@gmail.com>\r\n";
    $headers .= "Reply-To: dnw.webx@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    $body = "名前: $name\nメールアドレス: $email\nメッセージ:\n$message";

    if (wp_mail($to, $subject, $body, $headers)) {
      echo '<p>メッセージが送信されました。</p>';

      $user_subject = "お問い合わせありがとうございます";
      $user_body = "お問い合わせありがとうございます。\n以下の内容でお問い合わせを受け付けました。\n\n" . $body;
      $user_headers = "From: dnw.webx@gmail.com\r\n"; // 送信元のメールアドレスに変更してください
      $user_headers .= "Reply-To: dnw.webx@gmail.com\r\n";
      $user_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
      $user_headers .= "MIME-Version: 1.0\r\n";

      wp_mail($email, $user_subject, $user_body, $user_headers);
    } else {
      echo '<p>メッセージの送信に失敗しました。</p>';
      error_log("Mail failed to send to $to with subject $subject");
      // デバッグ用にエラーメッセージを表示
      echo '<p>エラーメッセージ: ' . error_get_last()['message'] . '</p>';
    }
  } else {
    error_log("Form not submitted"); // デバッグ用ログ
  }
  ?>

</main>
<?php phpinfo(); ?>

<?php get_footer(); ?>
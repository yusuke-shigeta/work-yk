<?php get_header(); ?>

<main id="page-contact" class="main">

  <?php
  $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = "お問い合わせ";
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <form action="" method="post">
    <label for="user_name">名前:</label>
    <input type="text" id="user_name" name="user_name" required>

    <label for="user_email">メールアドレス:</label>
    <input type="email" id="user_email" name="user_email" required>

    <label for="user_message">メッセージ:</label>
    <textarea id="user_message" name="user_message" required></textarea>

    <label for="contact_submit">
      <input id="contact_submit" type="submit" name="submit" value="送信">
    </label>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_text_field($_POST['user_name']);
    $email = sanitize_email($_POST['user_email']);
    $message = sanitize_textarea_field($_POST['user_message']);

    $to_admin = "dnw.webx@gmail.com"; // 送信先のメールアドレスに変更してください
    $subject_admin = "お問い合わせフォームからのメッセージ";
    $headers_admin = "From: 株式会社YK管理者向け <dnw.webx@gmail.com>\r\n";
    $headers_admin .= "Reply-To: dnw.webx@gmail.com\r\n";
    $headers_admin .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers_admin .= "MIME-Version: 1.0\r\n";

    $body_admin = "名前: $name\nメールアドレス: $email\nメッセージ:\n$message";

    if (wp_mail($to_admin, $subject_admin, $body_admin, $headers_admin)) {
      echo '<p>メッセージが送信されました。</p>';

      $subject_user = "お問い合わせありがとうございます";
      $body_user = "お問い合わせありがとうございます。\n以下の内容でお問い合わせを受け付けました。\n\n" . $body;
      $headers_user = "From: 株式会社YKユーザー向け <dnw.webx@gmail.com>\r\n"; // 送信元のメールアドレスに変更してください
      $headers_user .= "Reply-To: $email\r\n";
      $headers_user .= "Content-Type: text/plain; charset=UTF-8\r\n";
      $headers_user .= "MIME-Version: 1.0\r\n";

      wp_mail($email, $subject_user, $body_user, $headers_user);
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

<?php get_footer(); ?>
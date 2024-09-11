<?php get_header(); ?>

<main id="page-contact" class="main">

  <?php
  // $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = "お問い合わせ";
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <section class="sec">
    <div class="inner inner-sec">
      <form class="form" action="" method="post">
        <ul class="form-list">

          <li class="form-item">
            <?php
            $details = [
              'detail1' => '問い合わせ内容1',
              'detail2' => '問い合わせ内容2',
              'detail3' => '問い合わせ内容3',
            ];
            foreach ($details as $name => $label) :
            ?>
              <label class="label" for="<?php echo $name; ?>">
                <?php echo $label; ?>
                <input id="<?php echo $name; ?>" class="input-checkbox" type="checkbox" name="details[]" value="<?php echo $name; ?>">
              </label>
            <?php endforeach; ?>
          </li>

          <li class="form-item">
            <label class="label" for="user-company">
              会社名
              <input id="user-company" class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <label class="label" for="user-name">
              お名前
              <input id="user-name" class="input-text" type="text" name="user_name" required>
            </label>
          </li>

          <li class="form-item">
            <label class="label" for="user-tel">
              電話番号
              <input id="user-tel" class="input-text" type="number" name="user_tel">
            </label>
          </li>

          <li class="form-item">
            <label class="label" for="user-email">
              メールアドレス
              <input id="user-email" class="input-text" type="email" name="user_email" required>
            </label>
          </li>

          <li class="form-item">
            <label class="label" for="user-message">
              メッセージ
              <textarea id="user-message" class="input-textarea" name="user_message"></textarea>
            </label>
          </li>

          <li class="form-item">
            <label class="label" for="submit_contact">
              送信する
              <input id="submit_contact" type="submit" name="submit" value="送信">
            </label>
          </li>

        </ul>
      </form>
    </div>
  </section>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ユーザーが入力した情報を取得
    // 必須
    $name = sanitize_text_field($_POST['user_name']);
    $email = sanitize_email($_POST['user_email']);
    // 任意
    $detail = isset($_POST['details']) ? implode(', ', array_map('sanitize_text_field', $_POST['details'])) : 'なし';
    $company = isset($_POST['user_company']) ? sanitize_text_field($_POST['user_company']) : 'なし';
    $tel = isset($_POST['user_tel']) ? sanitize_text_field($_POST['user_tel']) : 'なし';
    $message = isset($_POST['user_message']) ? sanitize_text_field($_POST['user_message']) : 'なし';;

    $to_admin = "dnw.webx@gmail.com"; // 送信先のメールアドレスに変更してください
    $subject_admin = "お問い合わせフォームからのメッセージ";
    $headers_admin = "From: 株式会社YK管理者向け <dnw.webx@gmail.com>\r\n";
    $headers_admin .= "Reply-To: dnw.webx@gmail.com\r\n";
    $headers_admin .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers_admin .= "MIME-Version: 1.0\r\n";

    $body_admin = <<<EOD
    メールが届きました。

    名前: $name
    会社名: $company
    電話番号: $tel
    メールアドレス: $email
    お問い合わせ内容: $detail
    メッセージ: $message
    EOD;

    if (wp_mail($to_admin, $subject_admin, $body_admin, $headers_admin)) {
      echo '<p>メッセージが送信されました。</p>';

      $subject_user = "お問い合わせありがとうございます";
      $headers_user = "From: 株式会社YKユーザー向け <dnw.webx@gmail.com>\r\n"; // 送信元のメールアドレスに変更してください
      $headers_user .= "Reply-To: $email\r\n";
      $headers_user .= "Content-Type: text/plain; charset=UTF-8\r\n";
      $headers_user .= "MIME-Version: 1.0\r\n";

      $body_user = <<<EOD
      $name 様 
      お問い合わせありがとうございます。

      名前: $name
      会社名: $company
      電話番号: $tel
      メールアドレス: $email
      お問い合わせ内容: $detail
      メッセージ: $message
      EOD;

      wp_mail($email, $subject_user, $body_user, $headers_user);
    } else {
      echo '<p>メッセージの送信に失敗しました。</p>';
      error_log("Mail failed to send to $to with subject $subject");
      echo '<p>エラーメッセージ: ' . error_get_last()['message'] . '</p>';
    }
  } else {
    error_log("Form not submitted");
  }
  ?>

</main>

<?php get_footer(); ?>
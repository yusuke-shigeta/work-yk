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
            <h3>お名前</h3>
            <label class="label">
              姓
              <input class="input-text" type="text" name="user_name_first" required>
            </label>
            <label class="label">
              名
              <input class="input-text" type="text" name="user_name_last" required>
            </label>
          </li>

          <li class="form-item">
            <h3>お名前（フリガナ）</h3>
            <label class="label">
              セイ
              <input class="input-text" type="text" name="user_name_first_ruby" required>
            </label>
            <label class="label">
              メイ
              <input class="input-text" type="text" name="user_name_last_ruby" required>
            </label>
          </li>

          <li class="form-item">
            <h3 class="hide">工事を行いたい建物の住所</h3>
            <label class="label">
              工事を行いたい建物の住所
              <!-- todo, エリアを記入 -->
              <input class="input-text" type="text" name="user_building_address" required>
            </label>
          </li>

          <li class="form-item">
            <h3 class="hide">現在お住まいのご住所必須</h3>
            <label>
              工事を行いたい建物の住所と同上
              <input type="checkbox">
            </label>
            <label class="label">
              現在お住まいのご住所必須
              <input class="input-text" type="text" name="user_address" required>
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
            <?php
            $details = [
              'detail1' => '相談内容',
              'detail2' => '相談内容2',
              'detail3' => '相談内容3',
            ];
            foreach ($details as $name => $label) :
            ?>
              <label class="label">
                <?php echo $label; ?>
                <input class="input-checkbox" type="checkbox" name="details[]" value="<?php echo $name; ?>">
              </label>
            <?php endforeach; ?>
          </li>

          <li class="form-item">
            <h3>リノベーションを検討されている建物の種別</h3>
            <?php
            $building_type = [
              'building_type1' => '建物の種別',
              'building_type2' => '建物の種別2',
              'building_type3' => '建物の種別3',
            ];
            foreach ($building_type as $name => $label) :
            ?>
              <label class="label" for="<?php echo $name; ?>">
                <?php echo $label; ?>
                <input id="<?php echo $name; ?>" class="input-checkbox" type="checkbox" name="building_type[]" value="<?php echo $name; ?>">
              </label>
            <?php endforeach; ?>
            <label class="label">
              <input class="input-text" type="text" name="user_building_type">
            </label>
          </li>

          <li class="form-item">
            <h3>建物の現況</h3>
            <label class="label">
              建物の現況
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>工事完了ご希望時期</h3>
            <label class="label">
              工事完了ご希望時期
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>工事完了後のお引越しご希望日程※お急ぎの場合や決まった日付のある場合</h3>
            <label class="label">
              工事完了後のお引越しご希望日程<br>
              ※お急ぎの場合や決まった日付のある場合
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>物件のお引き渡し時期※中古物件を購入される場合</h3>
            <label class="label">
              物件のお引き渡し時期<br>
              ※中古物件を購入される場合
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>リノベーションのご予算</h3>
            <label class="label">
              リノベーションのご予算
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>お図面の有無（設計図、不動産会社の間取り図等）</h3>
            <label class="label">
              お図面の有無（設計図、不動産会社の間取り図等）
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>水廻り設備で交換をご希望されるもの</h3>
            <label class="label">
              水廻り設備で交換をご希望されるもの
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>当社をどこで知りましたか？</h3>
            <label class="label">
              当社をどこで知りましたか？<br>
              （複数選択可能）
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>気に入った事例があれば教えてください</h3>
            <label class="label">
              気に入った事例があれば教えてください<br>
              （複数選択可能）
              <input class="input-text" type="text" name="user_company">
            </label>
          </li>

          <li class="form-item">
            <h3>その他ご相談したいこと気になることなど</h3>
            <label class="label">
              その他ご相談したいこと気になることなどはこちらにご記入お願いいたします。
              <input class="input-text" type="text" name="user_company">
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
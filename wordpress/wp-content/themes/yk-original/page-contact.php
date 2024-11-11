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

        <section class="form-sec">
          <h2 class="form-sec-title">連絡先情報</h2>
          <ul class="form-sec-list">

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">お名前</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    姓
                    <input class="input-text" type="text" name="user_name_first" required>
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    名
                    <input class="input-text" type="text" name="user_name_last" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">フリガナ</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    セイ
                    <input class="input-text" type="text" name="user_name_first" required>
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    メイ
                    <input class="input-text" type="text" name="user_name_last" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="hide form-sec-item-title">電話番号</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    電話番号
                    <input class="input-text" type="text" name="user_name_first" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="hide form-sec-item-title">メールアドレス</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    メールアドレス
                    <input class="input-text" type="text" name="user_name_first" required>
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="form-sec">
          <h2 class="form-sec-title">住所関連</h2>
          <ul class="form-sec-list">

            <li class="form-sec-item">
              <h3 class="hide form-sec-item-title">工事を行いたい建物の住所</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    工事を行いたい建物の住所
                    <!-- todo, エリアを記入 -->
                    <input class="input-text" type="text" name="user_building_address" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="hide form-sec-item-title">現在お住まいのご住所</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    現在お住まいのご住所
                    <input class="input-text" type="text" name="user_address" required>
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="form-sec">
          <h2 class="form-sec-title">ご相談内容</h2>
          <ul class="form-sec-list">

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">ご相談内容</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <select name="" id="">
                      <option value="相談内容1">相談内容1</option>
                      <option value="相談内容2">相談内容2</option>
                      <option value="相談内容3">相談内容3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">リノベーションを検討されている建物の種別</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <select name="" id="">
                      <option value="建物の種別1">建物の種別1</option>
                      <option value="建物の種別2">建物の種別2</option>
                      <option value="建物の種別3">建物の種別3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">建物の現況</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    築年数（年）
                    <input class="input-text" type="text" name="user_company" required>
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    延べ床面積（㎡）
                    <input class="input-text" type="text" name="user_company" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">工事完了ご希望時期</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <select name="" id="">
                      <option value="工事完了ご希望時期1">工事完了ご希望時期1</option>
                      <option value="工事完了ご希望時期2">工事完了ご希望時期2</option>
                      <option value="工事完了ご希望時期3">工事完了ご希望時期3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">工事完了後のお引越しご希望日程※お急ぎの場合や決まった日付のある場合</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <input class="input-text" type="date" name="user_company">
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">物件のお引き渡し時期※中古物件を購入される場合</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <input class="input-text" type="date" name="user_company">
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">リノベーションのご予算</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <select name="" id="">
                      <option value="リノベーションのご予算1">リノベーションのご予算1</option>
                      <option value="リノベーションのご予算2">リノベーションのご予算2</option>
                      <option value="リノベーションのご予算3">リノベーションのご予算3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">お図面の有無（設計図、不動産会社の間取り図等）</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    有
                    <input class="input-radio" type="radio" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    無
                    <input class="input-radio" type="radio" name="user_company">
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">水廻り設備で交換をご希望されるもの</h3>
              <p class="form-sec-item-text">（複数選択可）</p>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    キッチン
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    トイレ
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    洗面
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    お風呂
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="form-sec">
          <h2 class="form-sec-title">その他</h2>
          <ul class="form-sec-list">
            <li class="form-sec-item">
              <h3 class="form-sec-item-title">当社をどこで知りましたか？</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    インターネット検索（Google、Yahoo!など）
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    住宅情報サイト（SUUMO、HOME'S、リノベりすなど）
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    Instagram
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    Facebook
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    Pinterest
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    YouTube
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    雑誌
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    店舗を見て
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    知人からのご紹介
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    ご紹介者のお名前
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    その他
                    <input class="input-checkbox" type="checkbox" name="user_company">
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">気に入った事例があれば教えてください</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <input class="input-text" type="text" name="user_company">
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item">
              <h3 class="form-sec-item-title">その他ご相談したいこと気になることなど</h3>
              <ul class="form-sec-item-list">
                <li class="form-sec-item-item">
                  <label class="label form-item-label">
                    <textarea name="" id=""></textarea>
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="">
          <label class="label form-item-label" for="submit_contact">
            送信する
            <input id="submit_contact" type="submit" name="submit" value="送信">
          </label>
        </section>

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
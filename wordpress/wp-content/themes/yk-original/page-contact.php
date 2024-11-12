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

            <li class="form-sec-item user-name">
              <h3 class="form-sec-item-title">お名前</h3>
              <ul class="form-sec-item-list form-sec-item-list-row">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    姓
                    <input class="input input-text" type="text" name="user_name_first" required>
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    名
                    <input class="input input-text" type="text" name="user_name_last" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-name-ruby">
              <h3 class="form-sec-item-title">フリガナ</h3>
              <ul class="form-sec-item-list form-sec-item-list-row">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    セイ
                    <input class="input input-text" type="text" name="user_name_first_ruby" required>
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    メイ
                    <input class="input input-text" type="text" name="user_name_last_ruby" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-tel">
              <h3 class="hide form-sec-item-title">電話番号</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    電話番号
                    <input class="input input-text" type="text" name="user_tel" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-email">
              <h3 class="hide form-sec-item-title">メールアドレス</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    メールアドレス
                    <input class="input input-text" type="text" name="user_email" required>
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="form-sec">
          <h2 class="form-sec-title">住所関連</h2>
          <ul class="form-sec-list">

            <li class="form-sec-item user-building-address">
              <h3 class="hide form-sec-item-title">工事を行いたい建物の住所</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    工事を行いたい建物の住所
                    <!-- todo, エリアを記入 -->
                    <input class="input input-text" type="text" name="user_building_address" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-address">
              <h3 class="hide form-sec-item-title">現在お住まいのご住所</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    現在お住まいのご住所
                    <input class="input input-text" type="text" name="user_address" required>
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="form-sec">
          <h2 class="form-sec-title">ご相談内容</h2>
          <ul class="form-sec-list">

            <li class="form-sec-item user-inquiry">
              <h3 class="hide form-sec-item-title">ご相談内容</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-select">
                    ご相談内容
                    <select class="select" name="user_inquiry" id="" required>
                      <option value="相談内容1">相談内容1</option>
                      <option value="相談内容2">相談内容2</option>
                      <option value="相談内容3">相談内容3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-building-type">
              <h3 class="hide form-sec-item-title">リノベーションを検討されている建物の種別</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-select">
                    リノベーションを検討されている建物の種別
                    <select class="select" name="user_building_type" id="" required>
                      <option value="建物の種別1">建物の種別1</option>
                      <option value="建物の種別2">建物の種別2</option>
                      <option value="建物の種別3">建物の種別3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-building-condition">
              <h3 class="form-sec-item-title">建物の現況</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    築年数（年）
                    <input class="input input-text" type="text" name="user_building_condition_year" required>
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    延べ床面積（㎡）
                    <input class="input input-text" type="text" name="user_building_condition_area" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-constructionCompletion">
              <h3 class="hide form-sec-item-title">c</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-select">
                    リノベーションを検討されている建物の種別
                    <select class="select" name="user_constructionCompletion" id="" required>
                      <option value="建物の種別1">建物の種別1</option>
                      <option value="建物の種別2">建物の種別2</option>
                      <option value="建物の種別3">建物の種別3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-movingPeriod">
              <h3 class="form-sec-item-title">工事完了後のお引越しご希望日程</h3>
              <p class="form-sec-item-text">※お急ぎの場合や決まった日付のある場合</p>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    <input class="input input-text" type="date" name="user_movingPeriod" required>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-propertyDelivery">
              <h3 class="form-sec-item-title">物件のお引き渡し時期</h3>
              <p class="form-sec-item-text">※中古物件を購入される場合</p>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    <input class="input input-text" type="date" name="user_propertyDelivery">
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-budget">
              <h3 class="form-sec-item-title">リノベーションのご予算</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-select">
                    <select class="select" name="user_budget" id="" required>
                      <option value="リノベーションのご予算1">リノベーションのご予算1</option>
                      <option value="リノベーションのご予算2">リノベーションのご予算2</option>
                      <option value="リノベーションのご予算3">リノベーションのご予算3</option>
                    </select>
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-drawing">
              <h3 class="form-sec-item-title">お図面の有無（設計図、不動産会社の間取り図等）</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-radio">
                    <input class="input input-radio" type="radio" name="user_drawing">
                    有
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-radio">
                    <input class="input input-radio" type="radio" name="user_drawing">
                    無
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-waterEquipment">
              <h3 class="form-sec-item-title">水廻り設備で交換をご希望されるもの</h3>
              <p class="form-sec-item-text">（複数選択可）</p>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment">
                    キッチン
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment">
                    トイレ
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment">
                    洗面
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment">
                    お風呂
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="form-sec">
          <h2 class="form-sec-title">その他</h2>
          <ul class="form-sec-list">

            <li class="form-sec-item user-opportunity">
              <h3 class="form-sec-item-title">当社をどこで知りましたか？</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    インターネット検索（Google、Yahoo!など）
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    住宅情報サイト（SUUMO、HOME'S、リノベりすなど）
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    Instagram
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    Facebook
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    Pinterest
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    YouTube
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    雑誌
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    店舗を見て
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    知人からのご紹介
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    ご紹介者のお名前
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity">
                    その他
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-example">
              <h3 class="form-sec-item-title">気に入った事例があれば教えてください</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-input-text">
                    <input class="input input-text" type="text" name="user_example">
                  </label>
                </li>
              </ul>
            </li>

            <li class="form-sec-item user-otherRequests">
              <h3 class="form-sec-item-title">その他ご相談したいこと気になることなど</h3>
              <ul class="form-sec-item-list form-sec-item-list-column">
                <li class="form-sec-item-item">
                  <label class="label label-textarea">
                    <textarea class="textarea" name="user_otherRequests"></textarea>
                  </label>
                </li>
              </ul>
            </li>

          </ul>
        </section>

        <section class="form-sec">
          <label class="label label-input-submit">
            <input class="input-submit" type="submit" name="submit_contact" value="送信する">
          </label>
        </section>

      </form>
    </div>
  </section>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // input-text:
    $user_name_first = sanitize_text_field($_POST['user_name_first']);
    $user_name_last = sanitize_text_field($_POST['user_name_last']);
    $user_name_first_ruby = sanitize_text_field($_POST['user_name_first_ruby']);
    $user_name_last_ruby = sanitize_text_field($_POST['user_name_last_ruby']);
    $user_tel = sanitize_text_field($_POST['user_tel']);
    $user_email = sanitize_email($_POST['user_email']);
    $user_building_address = sanitize_text_field($_POST['user_building_address']);
    $user_address = sanitize_text_field($_POST['user_address']);
    $user_building_condition_year = sanitize_text_field($_POST['user_building_condition_year']);
    $user_building_condition_area = sanitize_text_field($_POST['user_building_condition_area']);
    $user_constructionCompletion = sanitize_text_field($_POST['user_constructionCompletion']);
    $user_example = sanitize_text_field($_POST['user_example']);
    // input-text;

    // input-time:
    $user_movingPeriod = sanitize_text_field($_POST['user_movingPeriod']);
    $user_propertyDelivery = sanitize_text_field($_POST['user_propertyDelivery']);
    // input-time;

    // input-radio:
    $user_drawing = sanitize_text_field($_POST['user_drawing']);
    // input-radio;

    // input-checkbox:
    $user_waterEquipment = isset($_POST['user_waterEquipment']) ? array_map('sanitize_text_field', $_POST['user_waterEquipment']) : [];
    $user_opportunity = isset($_POST['user_opportunity']) ? array_map('sanitize_text_field', $_POST['user_opportunity']) : [];
    // input-checkbox;

    // select:
    $user_inquiry = sanitize_text_field($_POST['user_inquiry']);
    $user_building_type = sanitize_text_field($_POST['user_building_type']);
    $user_budget = sanitize_text_field($_POST['user_budget']);
    // select;

    // textarea:
    $user_otherRequests = sanitize_text_field($_POST['user_otherRequests']);
    // textarea;

    // 任意

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
  }
  ?>

  <?php if (wp_mail($to_admin, $subject_admin, $body_admin, $headers_admin)): ?>

    <?php
    // 送信成功を伝えるポップアップ
    ?>
    <div class="popup popup-success">
      <p>メッセージが送信されました。</p>
      <p>担当者からの連絡をお待ちください。</p>
    </div>

    <?php
    $subject_user = "お問い合わせありがとうございます";
    $headers_user = "From: 株式会社YKユーザー向け <dnw.webx@gmail.com>\r\n"; // 送信元のメールアドレスに変更してください
    $headers_user .= "Reply-To: $email\r\n";
    $headers_user .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers_user .= "MIME-Version: 1.0\r\n";

    $body_user = <<<EOD
    様
    お問い合わせありがとうございます。

    名前: 
    会社名: 
    電話番号: 
    メールアドレス: 
    お問い合わせ内容: 
    メッセージ: 
    EOD;

    wp_mail($email, $subject_user, $body_user, $headers_user);
    ?>
  <?php else: ?>
    <?php
    echo '<p>メッセージの送信に失敗しました。</p>';
    error_log("Mail failed to send to $to with subject $subject_user");
    echo '<p>エラーメッセージ: ' . error_get_last()['message'] . '</p>';
    error_log("Form not submitted");
    ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
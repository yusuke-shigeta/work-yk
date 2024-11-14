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
                      <option value="" disabled selected>選択してください</option>
                      <option value="今の住まいをリノベーション">今の住まいをリノベーション</option>
                      <option value="中古購入してリノベーション（既に物件が決まっている）">中古購入してリノベーション（既に物件が決まっている）</option>
                      <option value="中古購入してリノベーション（購入検討中）">中古購入してリノベーション（購入検討中）</option>
                      <option value="ご実家・親族の住まいを受け継いでリノベーション">ご実家・親族の住まいを受け継いでリノベーション</option>
                      <option value="建て替えかリノベーションを検討中">建て替えかリノベーションを検討中</option>
                      <option value="部分的なリフォーム・リノベーション">部分的なリフォーム・リノベーション</option>
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
                      <option value="" disabled selected>選択してください</option>
                      <option value="マンション">マンション</option>
                      <option value="戸建（在来木造）">戸建（在来木造）</option>
                      <option value="戸建（2×4工法）">戸建（2×4工法）</option>
                      <option value="戸建（プレハブ）">戸建（プレハブ）</option>
                      <option value="戸建（鉄骨造）">戸建（鉄骨造）</option>
                      <option value="戸建（鉄筋コンクリート造）">戸建（鉄筋コンクリート造）</option>
                      <option value="戸建（構造不明）">戸建（構造不明）</option>
                      <option value="ビル・店舗">ビル・店舗</option>
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
                      <option value="" disabled selected>選択してください</option>
                      <option value="100～200万円">100～200万円</option>
                      <option value="200～300万円">200～300万円</option>
                      <option value="300～500万円">300～500万円</option>
                      <option value="500～700万円">500～700万円</option>
                      <option value="700～1000万円">700～1000万円</option>
                      <option value="1000～1500万円">1000～1500万円</option>
                      <option value="1500万円以上">1500万円以上</option>
                      <option value="未定">未定</option>
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
                    <input class="input input-radio" type="radio" name="user_drawing" value="有">
                    有
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-radio">
                    <input class="input input-radio" type="radio" name="user_drawing" value="無" checked>
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
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment[]" value="キッチン">
                    キッチン
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment[]" value="トイレ">
                    トイレ
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment[]" value="洗面">
                    洗面
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_waterEquipment[]" value="お風呂">
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
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="インターネット検索（Google、Yahoo!など）">
                    インターネット検索（Google、Yahoo!など）
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="住宅情報サイト（SUUMO、HOME'S、リノベりすなど）">
                    住宅情報サイト（SUUMO、HOME'S）
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="Instagram">
                    Instagram
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="Facebook">
                    Facebook
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="Pinterest">
                    Pinterest
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="YouTube">
                    YouTube
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="雑誌">
                    雑誌
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="店舗を見て">
                    店舗を見て
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="知人からのご紹介">
                    知人からのご紹介
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="ご紹介者のお名前">
                    ご紹介者のお名前
                  </label>
                </li>
                <li class="form-sec-item-item">
                  <label class="label label-input-checkbox">
                    <input class="input input-checkbox" type="checkbox" name="user_opportunity[]" value="その他">
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

        <section class="form-sec form-sec-submit">
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
    $user_name_first = !empty($_POST['user_name_first']) ? sanitize_text_field($_POST['user_name_first']) : '';
    $user_name_last = !empty($_POST['user_name_last']) ? sanitize_text_field($_POST['user_name_last']) : '';
    $user_name_first_ruby = !empty($_POST['user_name_first_ruby']) ? sanitize_text_field($_POST['user_name_first_ruby']) : '';
    $user_name_last_ruby = !empty($_POST['user_name_last_ruby']) ? sanitize_text_field($_POST['user_name_last_ruby']) : '';
    $user_tel = !empty($_POST['user_tel']) ? sanitize_text_field($_POST['user_tel']) : '';
    $user_email = !empty($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
    $user_building_address = !empty($_POST['user_building_address']) ? sanitize_text_field($_POST['user_building_address']) : '';
    $user_address = !empty($_POST['user_address']) ? sanitize_text_field($_POST['user_address']) : '';
    $user_building_condition_year = !empty($_POST['user_building_condition_year']) ? sanitize_text_field($_POST['user_building_condition_year']) : '';
    $user_building_condition_area = !empty($_POST['user_building_condition_area']) ? sanitize_text_field($_POST['user_building_condition_area']) : '';
    $user_constructionCompletion = !empty($_POST['user_constructionCompletion']) ? sanitize_text_field($_POST['user_constructionCompletion']) : '';
    $user_example = !empty($_POST['user_example']) ? sanitize_text_field($_POST['user_example']) : '';
    // input-text;

    // input-time:
    $user_movingPeriod = !empty($_POST['user_movingPeriod']) ? sanitize_text_field($_POST['user_movingPeriod']) : '';
    $user_propertyDelivery = !empty($_POST['user_propertyDelivery']) ? sanitize_text_field($_POST['user_propertyDelivery']) : '';
    // input-time;

    // input-radio:
    $user_drawing = !empty($_POST['user_drawing']) ? sanitize_text_field($_POST['user_drawing']) : '';
    // input-radio;

    // input-checkbox:
    $user_waterEquipment = isset($_POST['user_waterEquipment']) ? implode(', ', array_map('sanitize_text_field', $_POST['user_waterEquipment'])) : '';
    $user_opportunity = isset($_POST['user_opportunity']) ? implode(', ', array_map('sanitize_text_field', $_POST['user_opportunity'])) : '';
    // input-checkbox;

    // select:
    $user_inquiry = !empty($_POST['user_inquiry']) ? sanitize_text_field($_POST['user_inquiry']) : '';
    $user_building_type = !empty($_POST['user_building_type']) ? sanitize_text_field($_POST['user_building_type']) : '';
    $user_budget = !empty($_POST['user_budget']) ? sanitize_text_field($_POST['user_budget']) : '';
    // select;

    // textarea:
    $user_otherRequests = !empty($_POST['user_otherRequests']) ? sanitize_text_field($_POST['user_otherRequests']) : '';
    // textarea;

    $root_url = get_site_url();
    $parsed_url = parse_url($root_url);
    $clean_url = $parsed_url['host'];

    $to_admin = "info@yk-rm.co.jp"; // 送信先のメールアドレスに変更してください
    $subject_admin = "お問い合わせフォームからのメッセージ";
    $headers_admin = "From: 株式会社YK管理者向け <info@yk-rm.co.jp>\r\n";
    $headers_admin .= "Reply-To: info@yk-rm.co.jp\r\n";
    $headers_admin .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers_admin .= "MIME-Version: 1.0\r\n";

    if ($clean_url != 'yk-rm.co.jp') {
      $headers_admin .= "Bcc: dnw.webx@gmail.com\r\n";
    }

    $body_admin = <<<EOD
    お客様からメールが届きました。
    ご対応お願いいたします。

    基本情報
    お名前:
    $user_name_first $user_name_last

    お名前（フリガナ）:
    $user_name_first_ruby $user_name_last_ruby

    電話番号:
    $user_tel

    メールアドレス:
    $user_email


    住所関連
    工事を行いたい建物の住所:
    $user_building_address

    現在お住まいのご住所:
    $user_address


    ご相談内容
    ご相談内容:
    $user_inquiry

    リノベーションを検討されている建物の種別:
    $user_building_type

    建物の現況:
    築 $user_building_condition_year 年, 延べ床面積（㎡） $user_building_condition_area

    工事完了ご希望時期:
    $user_constructionCompletion

    工事完了後のお引越しご希望日程:
    $user_movingPeriod
    
    中古物件を購入される場合物件のお引き渡し時期:
    $user_propertyDelivery

    リノベーションのご予算:
    $user_budget

    お図面の有無（設計図、不動産会社の間取り図等）:
    $user_drawing

    水廻り設備で交換をご希望されるもの:
    $user_waterEquipment


    その他
    当社をどこで知りましたか？:
    $user_opportunity

    気に入った事例があれば教えてください:
    $user_example

    その他ご相談したいこと気になることなどこちらにご記入ください:
    $user_otherRequests

    EOD;

    if (wp_mail($to_admin, $subject_admin, $body_admin, $headers_admin)) {

      // 送信成功ポップアップ
      echo '<div class="modal modal-success">';
      echo '<div id="popup" class="popup popup-success">';
      echo '<p class="popup-text popup-success-text">メッセージが送信されました。</p>';
      echo '<p class="popup-text popup-success-text">担当者からの連絡をお待ちください。</p>';
      echo '<a class="btn btn-color-gray popup-button pupup-button-success" href="' . home_url() . '">トップページへ戻る</a>';
      echo '</div>';

      $subject_user = "$user_name_first 様 お問い合わせありがとうございます";
      $headers_user = "From: 株式会社YKユーザー向け <info@yk-rm.co.jp>\r\n"; // 送信元のメールアドレスに変更してください
      $headers_user .= "Reply-To: $user_email\r\n";
      $headers_user .= "Content-Type: text/plain; charset=UTF-8\r\n";
      $headers_user .= "MIME-Version: 1.0\r\n";

      $body_user = <<<EOD
      $user_name_first 様
      この度はお問い合わせありがとうございます。
      担当者から連絡差し上げますので、しばらくお待ちいただくようお願いいたします。
      ご質問やご要望がございましたら、いつでもお気軽にご連絡ください。

      基本情報
      お名前:
      $user_name_first $user_name_last

      お名前（フリガナ）:
      $user_name_first_ruby $user_name_last_ruby

      電話番号:
      $user_tel

      メールアドレス:
      $user_email


      住所関連
      工事を行いたい建物の住所:
      $user_building_address

      現在お住まいのご住所:
      $user_address


      ご相談内容
      ご相談内容:
      $user_inquiry

      リノベーションを検討されている建物の種別:
      $user_building_type

      建物の現況:
      築 $user_building_condition_year 年, 延べ床面積（㎡） $user_building_condition_area

      工事完了ご希望時期:
      $user_constructionCompletion

      工事完了後のお引越しご希望日程:
      $user_movingPeriod

      中古物件を購入される場合物件のお引き渡し時期:
      $user_propertyDelivery

      リノベーションのご予算:
      $user_budget

      お図面の有無（設計図、不動産会社の間取り図等）:
      $user_drawing

      水廻り設備で交換をご希望されるもの:
      $user_waterEquipment


      その他
      当社をどこで知りましたか？:
      $user_opportunity

      気に入った事例があれば教えてください:
      $user_example

      その他ご相談したいこと気になることなどこちらにご記入ください:
      $user_otherRequests

      EOD;

      wp_mail($user_email, $subject_user, $body_user, $headers_user);
    } else {
      echo '<div class="modal modal-error">';
      echo '<div id="popup" class="popup popup-error">';
      echo '<p class="popup-text popup-error-text">メッセージの送信に失敗しました。</p>';
      echo '<p class="popup-text popup-error-text">お手数ですが、担当者に直接ご連絡お願いいたします。</p>';
      echo '<a class="popup-text popup-error-text popup-text-tel" href="tel:0367958733">電話番号: 0367958733</p>';
      echo '<a class="btn btn-color-gray popup-button pupup-button-error" href="' . home_url() . '">トップページへ戻る</a>';
      echo '</div>';
    }
  } else {
    error_log("Form not submitted");
  }
  ?>

</main>

<?php get_footer(); ?>
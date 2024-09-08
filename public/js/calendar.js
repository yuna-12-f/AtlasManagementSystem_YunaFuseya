$(function () {
    // 編集ボタン(class="js-modal-open")が押されたら発火
    $('.js-modal-open').on('click', function () {
        // モーダルの中身(class="js-modal")の表示
        $('.js-modal').fadeIn();
        // 押されたボタンから投稿内容を取得し変数へ格納
        var cancelDay = $(this).attr('cancelDay');
        // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
        var cancelPart = $(this).attr('cancelPart');

        // リモ部を数値に変換
        var partNumber;
        if (cancelPart === 'リモ1部') {
            partNumber = 1;
        } else if (cancelPart === 'リモ2部') {
            partNumber = 2;
        } else if (cancelPart === 'リモ3部') {
            partNumber = 3;
        }

        // 取得した投稿内容をモーダルの中身へ渡す
        $('.modal_day').text('予約日：' + cancelDay);
        // 取得した投稿のidをモーダルの中身へ渡す
        $('.modal_part').text('予約時間：' + cancelPart);

        // モーダル内のinput要素に値を設定
        $('input[name="cancelDay"]').val(cancelDay);  // hidden input の value に予約日を設定
        $('input[name="partNumber"]').val(partNumber);  // hidden input の value に予約時間を設定

        return false;
    });

    // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
    $('.js-modal-close').on('click', function () {
        // モーダルの中身(class="js-modal")を非表示
        $('.js-modal').fadeOut();
        return false;
    });
});

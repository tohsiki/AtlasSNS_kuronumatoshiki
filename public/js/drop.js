let accordionDetails = '.js-details';
let accordionSummary = '.js-details-summary';
let accordionContent = '.js-details-content';
let speed = 500;

$(accordionSummary).each(function() {
  $(this).on("click", function(event) {
    // summaryにis-activeクラスを切り替え
    $(this).toggleClass("is-active");
    // デフォルトの挙動を無効化
    event.preventDefault();

    if ($(this).parent($(accordionDetails)).attr("open")) {
      // アコーディオンを閉じるときの処理
      $(this).nextAll($(accordionContent)).slideUp(speed, function() {
        // アニメーションの完了後にopen属性を取り除く
        $(this).parent($(accordionDetails)).removeAttr("open");
        // display:none;を消して、ページ内検索にヒットするようにする
        $(this).show();
      });
    } else {
      // アコーディオンを開くときの処理
      $(accordionSummary).not($(this)).removeClass("is-active");
      $(accordionContent).not($(this).nextAll($(accordionContent))).slideUp(speed, function() {
        // アニメーションの完了後、すでに開いているアコーディオンのopen属性を取り除く
        $(this).parent($(accordionDetails)).removeAttr("open");
        $(this).show();
      });
      // クリックしたアコーディオンを開く
      $(this).parent($(accordionDetails)).attr("open", "true");
      $(this).nextAll($(accordionContent)).hide().slideDown(speed);
    }
  })
});

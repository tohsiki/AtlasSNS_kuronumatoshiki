$(function() {
    $(".menu-item").click(function() {
        var menuSub = $(".menuSub", this);
        if (menuSub.is(":visible")) {
            menuSub.slideUp();
            $(".menuSub_item").removeClass("active");
        } else {
            $(".menuSub").slideDown();
            $(".menuSub_item").removeClass("active");
            $(".menuSub_item", this).addClass("active");
        }
    });
});

$(function () {
  $('.menu-trigger').click(function () {
    //ハンバーガーボタン（.menu-trigger）をタップすると、
    $(this).toggleClass('active');
    //タップしたハンバーガーボタン（.menu-trigger）に（.active）を追加・削除する。
    if ($(this).hasClass('active')) {
      //もし、ハンバーガーボタン（.menu-trigger）に（.active）があれば、
      $('.g-navi').addClass('active');
      //(.g-navi)にも（.active）を追加する。
    } else {
      //それ以外の場合は、
      $('.g-navi').removeClass('active');
      //(.g-navi)にある（.active）を削除する。
    }
  });
  $('.nav-wrapper ul li a').click(function () {
    //各メニューリンク（.nav-wrapper ul li a）をタップすると、
    $('.menu-trigger').removeClass('active');
    //ハンバーガーボタン（.menu-trigger）にある（.active）を削除する。
    $('.g-navi').removeClass('active');
    //(.g-navi)にある（.active）も削除する。
  });
});

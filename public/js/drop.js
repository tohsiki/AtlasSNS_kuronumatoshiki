// // 動かす用
$(function () {
  $('.menu-trigger').click(function () {
    //ハンバーガーボタン（.menu-trigger）をタップすると、
    $(this).toggleClass('active');
    //タップしたハンバーガーボタン（.menu-trigger）に（.active）を追加する
    if ($(this).hasClass('active')) {
      //もし、ハンバーガーボタン（.menu-trigger）に（.active）があれば、
     $(".menuSub").slideDown();
    } else {
      //それ以外の場合は、
       $(".menuSub").slideUp();

    }
});
});

// $(function () {
//   $('.menu-trigger').click(function () {
//     // If the menu-trigger has the class 'active', remove it; otherwise, add 'active'.
//     $(this).toggleClass('active');

//     var menuSub = $(".menuSub", this);
//     // If menu-trigger has 'active', show menuSub; otherwise, hide it.
//     if ($(this).hasClass('active')) {
//       menuSub.show();
//     } else {
//       menuSub.hide();
//     }
//   });
// });


// // コピー用
// $(function () {
//   $('.menu-trigger').click(function () {
//     //ハンバーガーボタン（.menu-trigger）をタップすると、
//     $(this).toggleClass('active');
//     //タップしたハンバーガーボタン（.menu-trigger）に（.active）を追加する
//     if ($(this).hasClass('active')) {
//       //もし、ハンバーガーボタン（.menu-trigger）に（.active）があれば、
//       $('.g-navi').addClass('active');
//       //(.g-navi)にも（.active）を追加する。
//     } else {
//       //それ以外の場合は、
//       $('.g-navi').removeClass('active');
//       //(.g-navi)にある（.active）を削除する。
//     }
//   });

//   $('.nav-wrapper ul li a').click(function () {
//     //各メニューリンク（.nav-wrapper ul li a）をタップすると、
//     $('.menu-trigger').removeClass('active');
//     //ハンバーガーボタン（.menu-trigger）にある（.active）を削除する。
//     $('.g-navi').removeClass('active');
//     //(.g-navi)にある（.active）も削除する。
//   });
// });

// $(function() {
//   $(".menu-trigger").click(function () {

//     $(this).toggleClass('active');
//     var menuSub = $(".menuSub", this);

//     if (menuSub.is(":visible")) {

//       $(".menuSub").slideUp();
//       $(".menuSub_item").addClass("active");
//       $(".menuSub_item", this).removeClass("active");
//       $('.menu-trigger').removeClass('active');

//     } else {

//       $(".menuSub").slideDown();
//       $(".menuSub_item").removeClass("active");
//       $(".menuSub_item", this).addClass("active");
//       $('.menu-trigger').addClass('active');
//     }
//   });
// });

// 1. 変数menuSubを定義し、この要素内からクラス名が"menuSub"の要素を取得します。
// 2. もしmenuSubが表示されている場合は、slideUp()メソッドを用いて非表示にします。
// 3. "menuSub_item"クラスを持つ要素から"active"クラスを削除します。
// 4. 'menu-trigger'クラスを持つ要素に"active"クラスを追加します。
// 5. そうでない場合は、"menuSub"要素をslideDown()メソッドを用いて表示します。
// 6. "menuSub_item"クラスを持つ要素から"active"クラスを削除します。
// 7. この要素内から"menuSub_item"クラスを持つ要素に"active"クラスを追加します。
// 8. 'menu-trigger'クラスを持つ要素から"active"クラスを削除します。

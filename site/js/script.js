function popupImage() {
  var popup = document.getElementById('js-popup');
  if(!popup) return;

  var blackBg = document.getElementById('js-black-bg');
  var closeBtn = document.getElementById('js-close-btn');
  var showBtn = document.getElementById('js-show-popup');

  closePopUp(blackBg);
  closePopUp(closeBtn);
  closePopUp(showBtn);
  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup.classList.toggle('is-show');
    });
  }
}
popupImage();

function popupImage2() {
  var popup2 = document.getElementById('js-popup2');
  if(!popup2) return;

  var blackBg2 = document.getElementById('js-black-bg2');
  var closeBtn2 = document.getElementById('js-close-btn2');
  var showBtn2 = document.getElementById('js-show-popup2');

  closePopUp(blackBg2);
  closePopUp(closeBtn2);
  closePopUp(showBtn2);
  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup2.classList.toggle('is-show');
    });
  }
}
popupImage2();

$(".modal__button").click(function() {
  $('#loginModal').modal('show');
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
});

$(".toggle-password").click(function () {
    // iconの切り替え
    $(this).toggleClass("mdi-eye mdi-eye-off");

    // 入力フォームの取得
    let input = $(this).parent().prev("input");
    // type切替
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});


function popupImageNews() {
  var popup = document.getElementById('js-popup-news');
  if(!popup) return;

  var blackBg = document.getElementById('js-black-bg');
  var closeBtn = document.getElementById('js-close-btn');
  var showBtn = document.getElementById('js-show-popup-news');

  closePopUp(blackBg);
  closePopUp(closeBtn);
  closePopUp(showBtn);
  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup.classList.toggle('is-show');
    });
  }
}
popupImageNews();

function popupImageNews2() {
  var popup = document.getElementById('js-popup-news2');
  if(!popup) return;

  var blackBg = document.getElementById('js-black-bg2');
  var closeBtn = document.getElementById('js-close-btn2');
  var showBtn = document.getElementById('js-show-popup-news2');

  closePopUp(blackBg);
  closePopUp(closeBtn);
  closePopUp(showBtn);
  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup.classList.toggle('is-show');
    });
  }
}
popupImageNews2();

function popupImageNews3() {
  var popup = document.getElementById('js-popup-news3');
  if(!popup) return;

  var blackBg = document.getElementById('js-black-bg3');
  var closeBtn = document.getElementById('js-close-btn3');
  var showBtn = document.getElementById('js-show-popup-news3');

  closePopUp(blackBg);
  closePopUp(closeBtn);
  closePopUp(showBtn);
  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup.classList.toggle('is-show');
    });
  }
}
popupImageNews3();

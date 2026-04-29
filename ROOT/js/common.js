"use strict";
$(document).ready(function() {
  
  //*공통 스크립트  - 헤더, 사이드바, 푸터 인클루드*/
  $("header").load("header.html");
  $(".header-nonmem").load("header-nonmem.html");
  $("footer").load("footer.html");

  
  //*sorting 설정*/
  $(".sortingArrow i").click(function(){
    $(this).toggleClass("turningA");
    return false;
  });
  
  //*input file 커스텀*/
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  
  // 다이나믹배너 - 배너 이름 글자수 제한 기능
  $(".b-name").on('keyup', function() {

    var content = $(this).val();

    //text count
    if (content.length == 0 || content == "") {
      $('.text-length-cnt').text('0');
    } else {
      $('.text-length-cnt').text(content.length);
    }
    //text maxlength
    /*if (content.length > 30) {
      $(this).val($(this).val().substring(0, 30));
      alert('글자수는 40자까지 입력 가능합니다.');
    }*/
  });
  
  // 다이나믹배너 - 배너 이름 글자수 제한 기능
  $(".form-title").on('keyup', function() {

    var content = $(this).val();
    //text count
    if (content.length == 0 || content == "") {
      $('.t2>.text-length-cnt').text('0');
    } else {
      $('.t2>.text-length-cnt').text(content.length);
    }
  });
  
  // 다이나믹배너 - 배너 이름 글자수 제한 기능
  $(".form-q").on('keyup', function() {

    var content = $(this).val();
    //text count
    if (content.length == 0 || content == "") {
      $('.t3>.text-length-cnt').text('0');
    } else {
      $('.t3>.text-length-cnt').text(content.length);
    }

  });
      
  
  
  //$(".category-mid>button").toggleClass("active");
  /* 업로드된 파일 "..." 표시를 위함 */
  /*var length = 43; // 표시할 글자수 기준
  var str = $(".custom-file-input").val();
  if (str.length > length) {  
    str= str.substr(0, length-2) + '...';
  }*/
  
  /*$('.custom-file-label').each(function(){
    var lentgh = 43; //글자수
    $(this).each(function(){
      if($(this).text().length >= length){
        $(this).text($(this).text().substr(0,length)+'...');
      }
    });
  });
  */
  
});
/* 업로드된 파일 "..." 표시를 위함 */
/*var length = 43; // 표시할 글자수 기준
  var str = $(".custom-file-input").text();
  if (str.length > length) {  
    str= str.substr(0, length-2) + '...';
  }*/
/*const boxTit = Array.from(document.querySelectorAll('.custom-file-label')); 
  const box = [];

  const textSlice = function(tits, lengths){
      tits.forEach((el, idx) => {
          const tix = el.textContent;
          const memberPart = tix.slice(0, lengths);
          const t = memberPart.concat('...');
          box.push(t);

          tits[idx].innerHTML = box[idx];
      });
  };

  textSlice(boxTit, 43);*/
/*  let fileLength = 43; // 표시할 글자수 기준
  let str = $(".custom-file-label").text();
  if (str.fileLength > fileLength) {
      str = str.substr(0, fileLength - 2) + '...';
  }*/
    //console.log(str);



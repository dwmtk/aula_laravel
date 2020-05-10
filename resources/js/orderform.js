$(function() {
  // 初期表示を非表示にする
  $(".parking_onoff").hide();
  $('input[name="parking_onoff_check"]').change(function() {
      if ( $('input[name="parking_onoff_check"]').prop('checked') ){
          // 表示する
          $(".parking_onoff").show();
          $("#parking").prop('disabled', true);
          $('#parking').prop("selectedIndex", 0);
          $(".parking_badge_onoff").hide();
      }
      else
      {
          // 非表示にする
          $(".parking_onoff").hide();
          $("#parking").prop('disabled', false);
          $(".parking_badge_onoff").show();
      }
  });
});
$(function() {
  $('#mycar').change(function() {
      var size = $('#mycar option:selected').attr('class');
      var sizes = size.split(",");
      var length = Number(sizes[0]);
      var height = Number(sizes[1]);
      var width = Number(sizes[2]);
      var price = (height*width*2 + height*length*2 + length*width) *100;
      var final_price = price - {{ Auth::user()->tsuke_pay }};
      if(final_price < 0){
          final_price = 0;
      };
      $(".price").text("￥" + price.toLocaleString());
      $(".final_price").text("￥" + final_price.toLocaleString());
  });
});
$(function() {
  // 初期表示を非表示にする
  $(".mycar_onoff").hide();
  $('input[name="mycar_onoff_check"]').change(function() {
      if ( $('input[name="mycar_onoff_check"]').prop('checked') ){
          // 表示する
          $(".mycar_onoff").show();
          $("#mycar").prop('disabled', true);
          $("#car_maker").prop('disabled', false);
          $('#mycar').prop("selectedIndex", 0);
          $(".mycar_badge_onoff").hide();
          $(".price").text("￥0");
          $(".final_price").text("￥0");
      }
      else
      {
          // 非表示にする
          $(".mycar_onoff").hide();
          $("#mycar").prop('disabled', false);
          $("#car_maker").prop('disabled', true);
          $("#car_name").prop('disabled', true);
          $("#car_age").prop('disabled', true);
          $(".mycar_badge_onoff").show();
          $(".price").text("￥0");
          $(".final_price").text("￥0");
      }
  });
});
$(function() {
  $('#car_maker').change(function() {
      $(".price").text("￥0");
      $(".final_price").text("￥0");
  });
  $('#car_name').change(function() {
      $(".price").text("￥0");
      $(".final_price").text("￥0");
  });
});
$(function() {
  $('#car_age').change(function() {
      var size = $('#car_age option:selected').val();
      var sizes = size.split(",");
      var length = Number(sizes[0]);
      var height = Number(sizes[1]);
      var width = Number(sizes[2]);
      var price = (height*width*2 + height*length*2 + length*width) *100;
      var final_price = price - {{ Auth::user()->tsuke_pay }};
      if(final_price < 0){
          final_price = 0;
      };
      $(".price").text("￥" + price.toLocaleString());
      $(".final_price").text("￥" + final_price.toLocaleString());
  });
});
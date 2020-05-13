$(function() {
	$('select[name="car_maker"]').on('change', evt => {
		$('select[name="car_name"]').prop("selectedIndex", 0);
		$('select[name="car_name"]').prop('disabled', false);

    let val = $('select[name="car_maker"]').val();
    // 全て退避
    $('select[name="car_name"]').find('option').each((idx, elem) => {

			$('#hidden_area').prepend(elem);
		});
		// 該当する車名を戻す
    $('#hidden_area').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){
				// 選択してくださいを一番上に持ってくるための記述
				return;
			}
			if($(elem).attr("class").indexOf(val) != -1){
				// オプションをcar_nameへ移動
				$('select[name="car_name"]').prepend(elem);
			} 
		});
		// 選択してくださいを戻す
		$('#hidden_area').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){
				// 選択してくださいを一番上に持ってくるための記述
				$('select[name="car_name"]').prepend(elem);
			}
		});
		// メーカーが選択されたら、年式を選択してくださいに変更する
		$('#hidden_area2').find('option').each((idx, elem) => {
			
			if($(elem).hasClass('default')){

				$('select[name="car_age"]').prepend(elem);
			}
		});
		$('select[name="car_age"]').prop("selectedIndex", 0);
		$('select[name="car_age"]').prop('disabled', true);

	});


	$('select[name="car_name"]').on('change', evt => {
		$('select[name="car_age"]').prop("selectedIndex", 0);
		$('select[name="car_age"]').prop('disabled', false);
    let val = $('select[name="car_name"]').val();
    // 全て退避
    $('select[name="car_age"]').find('option').each((idx, elem) => {
      $('#hidden_area2').prepend(elem);
		});
		// 該当年式を戻す
    $('#hidden_area2').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){
				// 選択してくださいを一番上に持ってくるための記述
				return;
			}
			if($(elem).attr("class").indexOf(val) != -1){
					// オプションをselect2へ移動
					$('select[name="car_age"]').prepend(elem);
			}
		});
		// 選択してくださいを戻す
		$('#hidden_area2').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){
				// 選択してくださいを一番上に持ってくるための記述
				$('select[name="car_age"]').prepend(elem);
			}
		});
	});



	// // ???[?J?[????X????????
	// $('select[name="car_maker"]').change(function() {

	//     // ???K?w??v?f???????l???X????B
	//     $('select[name="car_name"]').prop("selectedIndex", 0);
	//     $('select[name="car_age"]').prop("selectedIndex", 0);
	    
	//     // 1?????K?w??v?f???X????X????B
	//     $('select[name="car_name"]').prop('disabled', false);
	    
	//     // 2?????K?w??v?f???X?s????X????B
	//     $('select[name="car_age"]').prop('disabled', true);
	    
	//     // ?I?????????郁?[?J?[??N???X?????擾
	//     var makerName = $('select[name="car_maker"] option:selected').val();
	    
	//     // ?????v?f?????擾
	//     var count = $('select[name="car_name"]').children().length;

	//     // ?????v?f?????Afor?????
	//     for (var i=0; i<count; i++) {
	        
	//         var carName = $('select[name="car_name"] option:eq(' + i + ')');

	//         if(carName.attr("class") === makerName) {
	// 						// ?I?????????[?J?[??????N???X??????????
	// 						// carName.css('display','');
	// 						if (carName.parent().find("span") !== NULL){
	// 							carName.unwrap();
	// 						}

	//             // ?????v?f??\??
	//             // carName.show();
	//         }else {
	// 						// ?I?????????[?J?[??N???X???????????
	// 						// carName.css({'display':'none'});
	// 						if (carName.parent().find("span") == NULL){
	// 							carName.wrap('<span class="selector-hide">');
	// 						}
	//             // ?????v?f???\??
	//             // carName.hide();
	//         }
	//     }
	    
	// })
	// // ???????X????????
	// $('select[name="car_name"]').change(function() {

	//     // ???K?w??v?f???????l???X????B
	//     $('select[name="car_age"]').prop("selectedIndex", 0);

	//     // 1?????K?w??v?f???X????X????B
	//     $('select[name="car_age"]').prop('disabled', false);

	//     // ?I??????????????N???X?????擾
	//     var carName = $('select[name="car_name"] option:selected').val();
	    
	//     // ?N????v?f?????擾
	//     var count = $('select[name="car_age"]').children().length;

	//     // ?N????v?f?????Afor?????
	//     for (var i=0; i<count; i++) {
	        
	//         var carAge = $('select[name="car_age"] option:eq(' + i + ')');

	//         if(carAge.attr("class") === carName) {
	// 						// ?I??????????????N???X??????????
	// 						// carAge.css('display','');
	//             carAge.unwrap();
	//             // ?s?s??v?f??\??
	//             // carAge.show();
	//         }else {
	// 						// ?I??????????N???X???????????
	// 						// carAge.css({'display':'none'});
	//             carAge.wrap('<span class="selector-hide">');
	//             // ?s?s??v?f???\??
	//             // carAge.hide();
	//         }
	//     }
	    
	// })
})
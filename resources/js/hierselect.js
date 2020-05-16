// $(function(){
// 	$('#hidden_area').append( $('select[name="car_name"] option').clone() );
// 	$('#hidden_area2').append( $('select[name="car_age"] option').clone() );
// 	});

$(function(){
	$('select[name="car_maker"]').on('change', evt => {
		$('#hidden_area').append( $('select[name="car_name"] option').clone() );
		$("select[name='car_name'] option").remove();

		let val = $('select[name="car_maker"]').val();

		$('#hidden_area').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){

				$('select[name="car_name"]').append(elem).clone();

				return false;
			}
		});
		$('#hidden_area').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){
				return;
			}
			if($(elem).attr("class").indexOf(val) != -1){

				$('select[name="car_name"]').append(elem).clone();
			}
		});

		$('select[name="car_name"]').prop("selectedIndex", 0);
		$('select[name="car_name"]').prop('disabled', false);
		$('select[name="car_age"]').prop("selectedIndex", 0);
		$('select[name="car_age"]').prop('disabled', true);
	});


	$('select[name="car_name"]').on('change', evt => {
		$('#hidden_area2').append( $('select[name="car_age"] option').clone() );
		$("select[name='car_age'] option").remove();

		let val = $('select[name="car_name"]').val();

		$('#hidden_area2').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){

				$('select[name="car_age"]').append(elem).clone();

				return false;
			}
		});
		$('#hidden_area2').find('option').each((idx, elem) => {
			if($(elem).hasClass('default')){
				return;
			}
			if($(elem).attr("class").indexOf(val) != -1){

				$('select[name="car_age"]').append(elem).clone();
			}
		});
		$('select[name="car_age"]').prop("selectedIndex", 0);
		$('select[name="car_age"]').prop('disabled', false);
	});
});

// $(function() {
// 	$('select[name="car_maker"]').on('change', evt => {

// 		let val = $('select[name="car_maker"]').val();
//     // ?ｿｽS?ｿｽﾄ退費ｿｽ
//     $('select[name="car_name"]').find('option').each((idx, elem) => {
// 			$('#hidden_area').prepend(elem);
// 		});
// 		// ?ｿｽY?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾔ厄ｿｽ?ｿｽ?ｿｽﾟゑｿｽ
//     $('#hidden_area').find('option').each((idx, elem) => {
// 			if($(elem).hasClass('default')){
// 				// ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾔ擾ｿｽﾉ趣ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ驍ｽ?ｿｽﾟの記?ｿｽq
// 				return;
// 			}
// 			if($(elem).attr("class").indexOf(val) != -1){
// 				// ?ｿｽI?ｿｽv?ｿｽV?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽcar_name?ｿｽﾖ移難ｿｽ
// 				$('select[name="car_name"]').prepend(elem);
// 			} 
// 		});
// 		// ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾟゑｿｽ
// 		$('#hidden_area').find('option').each((idx, elem) => {
// 			if($(elem).hasClass('default')){
// 				// ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾔ擾ｿｽﾉ趣ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ驍ｽ?ｿｽﾟの記?ｿｽq
// 				$('select[name="car_name"]').prepend(elem);
// 			}
// 		});
// 		// ?ｿｽ?ｿｽ?ｿｽ[?ｿｽJ?ｿｽ[?ｿｽ?ｿｽ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ黷ｽ?ｿｽ?ｿｽA?ｿｽN?ｿｽ?ｿｽ?ｿｽ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾉ変更?ｿｽ?ｿｽ?ｿｽ?ｿｽ
// 		$('#hidden_area2').find('option').each((idx, elem) => {
			
// 			if($(elem).hasClass('default')){

// 				$('select[name="car_age"]').prepend(elem);
// 			}
// 		});
// 		$('select[name="car_age"]').prop("selectedIndex", 0);
// 		$('select[name="car_age"]').prop('disabled', true);
// 		$('select[name="car_name"]').prop("selectedIndex", 0);
// 		$('select[name="car_name"]').prop('disabled', false);
// 	});


// 	$('select[name="car_name"]').on('change', evt => {
// 		$('select[name="car_age"]').prop("selectedIndex", 0);
// 		$('select[name="car_age"]').prop('disabled', false);
//     let val = $('select[name="car_name"]').val();
//     // ?ｿｽS?ｿｽﾄ退費ｿｽ
//     $('select[name="car_age"]').find('option').each((idx, elem) => {
//       $('#hidden_area2').prepend(elem);
// 		});
// 		// ?ｿｽY?ｿｽ?ｿｽ?ｿｽN?ｿｽ?ｿｽ?ｿｽ?ｿｽﾟゑｿｽ
//     $('#hidden_area2').find('option').each((idx, elem) => {
// 			if($(elem).hasClass('default')){
// 				// ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾔ擾ｿｽﾉ趣ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ驍ｽ?ｿｽﾟの記?ｿｽq
// 				return;
// 			}
// 			if($(elem).attr("class").indexOf(val) != -1){
// 					// ?ｿｽI?ｿｽv?ｿｽV?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽselect2?ｿｽﾖ移難ｿｽ
// 					$('select[name="car_age"]').prepend(elem);
// 			}
// 		});
// 		// ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾟゑｿｽ
// 		$('#hidden_area2').find('option').each((idx, elem) => {
// 			if($(elem).hasClass('default')){
// 				// ?ｿｽI?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽ?ｿｽﾔ擾ｿｽﾉ趣ｿｽ?ｿｽ?ｿｽ?ｿｽﾄゑｿｽ?ｿｽ驍ｽ?ｿｽﾟの記?ｿｽq
// 				$('select[name="car_age"]').prepend(elem);
// 			}
// 		});
// 	});
// });
// -----------------------------------------------------------
// 	// ???[?J?[????X????????
// 	$('select[name="car_maker"]').change(function() {

// 	    // ???K?w??v?f???????l???X????B
// 	    $('select[name="car_name"]').prop("selectedIndex", 0);
// 	    $('select[name="car_age"]').prop("selectedIndex", 0);
// 	    // 1?????K?w??v?f???X????X????B
// 	    $('select[name="car_name"]').prop('disabled', false);
// 	    // 2?????K?w??v?f???X?s????X????B
// 	    $('select[name="car_age"]').prop('disabled', true);
// 	    // ?I??????????ｿｽ?ｿｽ?[?J?[??N???X??????ｿｽ?ｿｽ
// 	    var makerName = $('select[name="car_maker"] option:selected').val();
// 	    // ?????v?f??????ｿｽ?ｿｽ
// 	    var count = $('select[name="car_name"]').children().length;
// 	    // ?????v?f?????Afor?????
// 	    for (var i=0; i<count; i++) {
// 	        var carName = $('select[name="car_name"] option:eq(' + i + ')');
// 					if(carName.hasClass('default')){
// 						continue;
// 					}
// 	        if(carName.attr("class") === makerName) {
// 							// ?I?????????[?J?[??????N???X??????????
// 							// carName.css('display','');
// 							if (carName.parent().find("span")){
// 								carName.unwrap();
// 							}

// 	            // ?????v?f??\??
// 	            // carName.show();
// 	        }else {
// 							// ?I?????????[?J?[??N???X???????????
// 							// carName.css({'display':'none'});
// 							if (carName.parent().find("span") == NULL){
// 								carName.wrap('<span class="selector-hide">');
// 							}
// 	            // ?????v?f???\??
// 	            // carName.hide();
// 	        }
// 	    }
// 	})	

// 	// // ???????X????????
// 	$('select[name="car_name"]').change(function() {

// 	    // ???K?w??v?f???????l???X????B
// 	    $('select[name="car_age"]').prop("selectedIndex", 0);

// 	    // 1?????K?w??v?f???X????X????B
// 	    $('select[name="car_age"]').prop('disabled', false);

// 	    // ?I??????????????N???X??????ｿｽ?ｿｽ
// 	    var carName = $('select[name="car_name"] option:selected').val();
	    
// 	    // ?N????v?f??????ｿｽ?ｿｽ
// 	    var count = $('select[name="car_age"]').children().length;

// 	    // ?N????v?f?????Afor?????
// 	    for (var i=0; i<count; i++) {
	        
// 	        var carAge = $('select[name="car_age"] option:eq(' + i + ')');

// 	        if(carAge.attr("class") === carName) {
// 							// ?I??????????????N???X??????????
// 							// carAge.css('display','');
// 	            carAge.unwrap();
// 	            // ?s?s??v?f??\??
// 	            // carAge.show();
// 	        }else {
// 							// ?I??????????N???X???????????
// 							// carAge.css({'display':'none'});
// 	            carAge.wrap('<span class="selector-hide">');
// 	            // ?s?s??v?f???\??
// 	            // carAge.hide();
// 	        }
// 	    }
// 	})
// })


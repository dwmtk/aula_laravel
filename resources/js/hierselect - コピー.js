$(function() {

    // メーカーが変更されたら発動
    $('select[name="maker"]').change(function() {

        // 下階層の要素を--選択してください--に変更する。
        $('select[name="name"]').val("default");
        $('select[name="age"]').val("default");
        
        // 1個下の階層の要素を変更可に変更する。
        $('select[name="name"]').prop('disabled', false);
        
        // 2個下の階層の要素を変更不可に変更する。
        $('select[name="age"]').prop('disabled', true);
        
        // 選択されているメーカーのクラス名を取得
        var makerName = $('select[name="maker"] option:selected').val();
        
        // 車名の要素数を取得
        var count = $('select[name="name"]').children().length;

        // 車名の要素数分、for文で回す
        for (var i=0; i<count; i++) {
            
            var carName = $('select[name="name"] option:eq(' + i + ')');

            if(carName.attr("class") === makerName) {
                // 選択したメーカーと同じクラス名だった場合
                
                // 車名の要素を表示
                carName.show();
            }else {
                // 選択したメーカーとクラス名が違った場合
                
                // 車名の要素を非表示
                carName.hide();
            }
        }
        
    })
    // 車名が変更されたら発動
    $('select[name="name"]').change(function() {

        // 下階層の要素を--選択してください--に変更する。
        $('select[name="age"]').val("default");

        // 1個下の階層の要素を変更可に変更する。
        $('select[name="age"]').prop('disabled', false);

        // 選択されている車名のクラス名を取得
        var carName = $('select[name="name"] option:selected').val();
        
        // 年式の要素数を取得
        var count = $('select[name="age"]').children().length;

        // 年式の要素数分、for文で回す
        for (var i=0; i<count; i++) {
            
            var carAge = $('select[name="age"] option:eq(' + i + ')');

            if(carAge.attr("class") === carName) {
                // 選択した車種と同じクラス名だった場合
                
                // 都市の要素を表示
                carAge.show();
            }else {
                // 選択した国とクラス名が違った場合
                
                // 都市の要素を非表示
                carAge.hide();
            }
        }
        
    })
})

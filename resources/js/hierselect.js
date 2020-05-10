$(function() {

	// ���[�J�[���ύX���ꂽ�甭��
	$('select[name="car_maker"]').change(function() {

	    // ���K�w�̗v�f�������l�ɕύX����B
	    $('select[name="car_name"]').prop("selectedIndex", 0);
	    $('select[name="car_age"]').prop("selectedIndex", 0);
	    
	    // 1���̊K�w�̗v�f��ύX�ɕύX����B
	    $('select[name="car_name"]').prop('disabled', false);
	    
	    // 2���̊K�w�̗v�f��ύX�s�ɕύX����B
	    $('select[name="car_age"]').prop('disabled', true);
	    
	    // �I������Ă��郁�[�J�[�̃N���X�����擾
	    var makerName = $('select[name="car_maker"] option:selected').val();
	    
	    // �Ԗ��̗v�f�����擾
	    var count = $('select[name="car_name"]').children().length;

	    // �Ԗ��̗v�f�����Afor���ŉ�
	    for (var i=0; i<count; i++) {
	        
	        var carName = $('select[name="car_name"] option:eq(' + i + ')');

	        if(carName.attr("class") === makerName) {
	            // �I���������[�J�[�Ɠ����N���X���������ꍇ
	            
	            // �Ԗ��̗v�f��\��
	            carName.show();
	        }else {
	            // �I���������[�J�[�ƃN���X����������ꍇ
	            
	            // �Ԗ��̗v�f���\��
	            carName.hide();
	        }
	    }
	    
	})
	// �Ԗ����ύX���ꂽ�甭��
	$('select[name="car_name"]').change(function() {

	    // ���K�w�̗v�f�������l�ɕύX����B
	    $('select[name="car_age"]').prop("selectedIndex", 0);

	    // 1���̊K�w�̗v�f��ύX�ɕύX����B
	    $('select[name="car_age"]').prop('disabled', false);

	    // �I������Ă���Ԗ��̃N���X�����擾
	    var carName = $('select[name="car_name"] option:selected').val();
	    
	    // �N���̗v�f�����擾
	    var count = $('select[name="car_age"]').children().length;

	    // �N���̗v�f�����Afor���ŉ�
	    for (var i=0; i<count; i++) {
	        
	        var carAge = $('select[name="car_age"] option:eq(' + i + ')');

	        if(carAge.attr("class") === carName) {
	            // �I�������Ԏ�Ɠ����N���X���������ꍇ
	            
	            // �s�s�̗v�f��\��
	            carAge.show();
	        }else {
	            // �I���������ƃN���X����������ꍇ
	            
	            // �s�s�̗v�f���\��
	            carAge.hide();
	        }
	    }
	    
	})
})
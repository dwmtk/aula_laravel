$(function() {

    // ���[�J�[���ύX���ꂽ�甭��
    $('select[name="maker"]').change(function() {

        // ���K�w�̗v�f��--�I�����Ă�������--�ɕύX����B
        $('select[name="name"]').val("default");
        $('select[name="age"]').val("default");
        
        // 1���̊K�w�̗v�f��ύX�ɕύX����B
        $('select[name="name"]').prop('disabled', false);
        
        // 2���̊K�w�̗v�f��ύX�s�ɕύX����B
        $('select[name="age"]').prop('disabled', true);
        
        // �I������Ă��郁�[�J�[�̃N���X�����擾
        var makerName = $('select[name="maker"] option:selected').val();
        
        // �Ԗ��̗v�f�����擾
        var count = $('select[name="name"]').children().length;

        // �Ԗ��̗v�f�����Afor���ŉ�
        for (var i=0; i<count; i++) {
            
            var carName = $('select[name="name"] option:eq(' + i + ')');

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
    $('select[name="name"]').change(function() {

        // ���K�w�̗v�f��--�I�����Ă�������--�ɕύX����B
        $('select[name="age"]').val("default");

        // 1���̊K�w�̗v�f��ύX�ɕύX����B
        $('select[name="age"]').prop('disabled', false);

        // �I������Ă���Ԗ��̃N���X�����擾
        var carName = $('select[name="name"] option:selected').val();
        
        // �N���̗v�f�����擾
        var count = $('select[name="age"]').children().length;

        // �N���̗v�f�����Afor���ŉ�
        for (var i=0; i<count; i++) {
            
            var carAge = $('select[name="age"] option:eq(' + i + ')');

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

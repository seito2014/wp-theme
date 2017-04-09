<style>
    .contact-form .error {
        display: inline-block;
        margin-top: 5px;
        color: #ff5299;
    }
</style>
<input id="js-privacy-policy-link" type="hidden" value="<?php echo site_url(NAV_7_ID); ?>">
<script>
    var $detailArea = $('#js-contact-detail');
    var tagData = {
        input: {
            type: 'submit',
            name: 'submitConfirm',
            text: '確認画面へ',
            value: 'confirm'
        },
        back: {
            type: 'submit',
            name: 'submitBack',
            text: '修正する',
            value: 'back'
        },
        send: {
            type: 'submit',
            name: 'send',
            text: 'これで送る！',
            value: 'send'
        }
    };
    var template = _.template;
    var templateSettings = _.templateSettings;
    templateSettings.interpolate = /\{\{=([\s\S]+?)\}\}/g;

    function designTags(clear, output, input, data) {
        var compile = template(document.getElementById(input).innerHTML);
        if(clear === true){
            $('#' + output).html('');
        }
        $('#' + output).append(compile(data));
    }

    function hideInputArea(){
        $detailArea.find('.contact-form-list').hide();
        $detailArea.find('.contact-form-privacy').hide();
    }

    function init(){

        //input
        if($detailArea.length === 0){
            designTags(true, 'js-buttons', 'js-template', tagData.input);
            $('#js-privacy-policy').attr('href', $('#js-privacy-policy-link').val());
        }
        //confirm
        else if($detailArea.length === 1) {
            designTags(true, 'js-buttons', 'js-template', tagData.back);
            designTags(false, 'js-buttons', 'js-template', tagData.send);
            $formItem = $detailArea.find('.contact-form-item');
            formItemLength = $formItem.length;
            var formTitle = {};
            var counter = 0;
            while(counter < formItemLength){
                formData = {
                    label: $formItem.eq(counter).find('label').html(),
                    answer: $formItem.eq(counter).find('input').val()
                };

                designTags(false, 'js-answer', 'js-template-list', formData);
                counter+=1;
            }
            hideInputArea();
        }
    }

    window.onload = init();
</script>
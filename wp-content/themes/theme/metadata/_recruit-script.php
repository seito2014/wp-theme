<style>
    .l-recruit-forms .error {
        display: inline-block;
        margin-top: 5px;
        color: #ff5299;
    }
</style>
<input id="js-privacy-policy-link" type="hidden" value="<?php echo site_url(NAV_7_ID); ?>">
<script>
    var BASE_URL = $('#js-base-url').val();
    var $detailArea = $('#js-recruit-confirm');
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
            text: '送信する',
            value: 'send'
        }
    };
    var template = _.template;
    var templateSettings = _.templateSettings;
    templateSettings.interpolate = /\{\{=([\s\S]+?)\}\}/g;

    var $form = $('#js-forms-parent');
    var $formItem = $form.find('.js-forms-item');
    var $formItemArrow = $formItem.find('.js-chat-entry-arrow');
    var $formImgItem = $form.find('.js-chat-entry-icon');
    var $img = '<img src="' + BASE_URL + '/assets/images/chat/icon-logo.jpg" alt="株式会社えふなな">';

    function setClass(){
        $('form').addClass('h-adr');
    }
    function setArrow(){
        var compile = template(document.getElementById('js-template-chat-arrow').innerHTML);
        $formItemArrow.append(compile());
    }
    function setImg(){
        $formImgItem.html($img);
    }
    setImg();
    setArrow();
    setClass();

    function designTags(clear, output, input, data) {
        var compile = template(document.getElementById(input).innerHTML);
        if(clear === true){
            $('#' + output).html('');
        }
        $('#' + output).append(compile(data));
    }

    function hideInputArea(){
        $('#js-recruit-form').hide();
    }

    function init(){
//
        //input
        if($detailArea.length === 0){
            designTags(true, 'js-check', 'js-template', tagData.input);
            $('#js-privacy-policy').attr('href', $('#js-privacy-policy-link').val());
        }
        //confirm
        else if($detailArea.length === 1) {
            designTags(false, 'js-button-back', 'js-template', tagData.back);
            designTags(false, 'js-button-next', 'js-template', tagData.send);

            var confirmData = {
                name: $form.find('input[name^="name"]').val(),
                kana: $form.find('input[name^="kana"]').val(),
                birthYear: $form.find('input[name^="birth-year"]').val(),
                birthMonth: $form.find('input[name^="birth-month"]').val(),
                birthDay: $form.find('input[name^="birth-day"]').val(),
                phone: $form.find('input[name^="phone"]').val(),
                email: $form.find('input[name^="email"]').val(),
                upload: $form.find('input[name^="upload"]').val(),
                zip: $form.find('input[name^="zip"]').val(),
                address: $form.find('input[name^="address"]').val(),
                education: $form.find('input[name^="education"]').val(),
                snsFacebook: $form.find('input[name^="sns-facebook"]').val(),
                snsInstagram: $form.find('input[name^="sns-instagram"]').val(),
                snsTwitter: $form.find('input[name^="sns-twitter"]').val(),
                snsGithub: $form.find('input[name^="sns-github"]').val(),
                snsOther: $form.find('input[name^="sns-other"]').val(),
                skill: $form.find('input[name^="skill"]').val(),
                personality: $form.find('input[name^="personality"]').val(),
                passion: $form.find('input[name^="passion"]').val(),
                role: $form.find('input[name^="role"]').val(),
                work: $form.find('input[name^="work"]').val(),
                workPlace: $form.find('input[name^="work-place"]').val(),
                finalMessage: $form.find('input[name^="final-message"]').val()
            };

            designTags(false, 'js-recruit-output', 'js-template-list', confirmData);
            hideInputArea();
        }
    }

    window.onload = init();
</script>
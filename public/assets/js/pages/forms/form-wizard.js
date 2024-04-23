$(function () {

    jQuery.validator.addMethod("greaterThan",
function(value, element, params) {

    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
    }

    return isNaN(value) && isNaN($(params).val())
        || (Number(value) > Number($(params).val()));
},'Must be greater than {0}.');
    //Horizontal form basic
    $('#wizard_horizontal').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }
    });
    //Vertical form basic
    $('#wizard_vertical').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        // transitionEffect: 'slideLeft',
        stepsOrientation: 'vertical',
        titleTemplate: '<span class=""></span> #title#',
        loadingTemplate: '<span class="spinner"></span> #text#',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }

    });
    // $('#wizard_vertical').removeClass("number");
    //Advanced form with validation
    var today = new Date();
    var form = $('#wizard_with_validation').show();
    form.steps({
        headerTag: 'h2',
        bodyTag: 'section',
        // transitionEffect: 'slideLeft',
        stepsOrientation: 'vertical',
        titleTemplate: '<span></span> #title#',
        loadingTemplate: '<span class="spinner"></span> #text#',
       // saveState:true,

        onInit: function (event, currentIndex) {
            //Set tab width
    

            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
            var tabCount = $tab.length;
            $tab.css('width', (100 / 1) + '%');
           // console.log(event);
            //set button waves effect
            setButtonWavesEffect(event);
           // $('#wizard_with_validation-t-1').hide();
            // $('#wizard_with_validation-t-6').hide();
            //form.steps('remove', 6);
            //form.steps('remove', 1);
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex > newIndex) { return true; }

            if (currentIndex < newIndex) {
                form.find('.body:eq(' + newIndex + ') label.error').remove();
                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }
            form.validate().settings.ignore = ':disabled,:hidden';
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ':disabled';
            console.log(form.validate());
            return form.valid();
        },
        onFinished: function (event, currentIndex) {


           // alert("Good job!", "Submitted!", "success");
           console.log(form.serializeArray());
                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure ?',
                    type: 'red',
                    typeAnimated: true,
                    columnClass: 'col-md-6 col-md-offset-3',
                    alignMiddle	:true,
                    confirmButtonColor: '#2C3D87',
                    confirm:function () {
                        form.submit();

                         return true;
                     },
                     cancel:function () {
                         return true;
                     }
                });
        }
    });

    form.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');

        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
       rules:{

       },
        messages: {
           
          }
    });
});

function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
}

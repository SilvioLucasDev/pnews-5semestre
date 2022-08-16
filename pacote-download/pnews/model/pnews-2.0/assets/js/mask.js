$(window).on("load", function(){

    /***************************************/
    //  MÁSCARA PARA INPUTS 
    // var maskForm = function () {

        $('.input-mask-cep').mask('00000-000');
        $('.input-mask-cpf').mask('000.000.000-00');
        $('.input-mask-rg').mask('00.000.000-0');
        $('.input-mask-cv').mask('00/0000');
        $('.input-mask-date').mask('00/00/0000');
        $('.inputMask_horario').mask('00:00');
        $('.input-mask-money').mask('#.##0,00#.##0,00', { reverse: true });
        $('.inputMask_porcent').mask('##0%', { reverse: true });

        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

        $('.inputMask_tel').mask(SPMaskBehavior, spOptions);
 });
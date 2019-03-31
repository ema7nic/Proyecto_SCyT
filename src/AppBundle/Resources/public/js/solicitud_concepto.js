
var $collectionHolder;
var sum = 0;

//var $addTagLink = $('<input class="btn btn-secondary add_tag_link" value="Agregar" />');

jQuery(document).ready(function () {
    $collectionHolder = $('div.conceptoImporte');
    $addTagLink = $('input.add_tag_link');
    var l = 0;

    $collectionHolder.find('div.quitar').each(function () {
        addTagFormDeleteLinkFor($(this), l);
        l++;
    });

    var k = $collectionHolder.find('select').length;

    $collectionHolder.data('index', k);

    $("#appbundle_solicitud_importeTotal").val(0)
    sum = parseInt($("#appbundle_solicitud_importeTotal").val());

    for ($i = 0; $i < k; $i++) {
        sumConceptosCargados($i);
    }

    $addTagLink.on('click', function (e) {
        e.preventDefault();
        addTagForm($collectionHolder, $addTagLink);
    });



});

function sumConceptosCargados($i) {
    const conceptos_selector = "#appbundle_solicitud_conceptos_" + $i + "_monto";
    const total_selector = "#appbundle_solicitud_importeTotal";
    let anterior = parseInt(conceptos_selector).val();

    $(conceptos_selector).on('input', function () {
        var j = parseInt($(conceptos_selector).val());

        if (!isNaN(j)) {
            sum += j;
            sum -= anterior;
            $(total_selector).val(sum);
            anterior = j;
        } else {
            if (!isNaN(sum)) {
                sum -= anterior;
                $(total_selector).val(sum);
                anterior = 0;
            }
        }
    });

}

function addTagForm($collectionHolder, $newLinkLi) {
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var i = index;
    var newForm = prototype;
    var anterior = 0;

    const conceptos_selector = "#appbundle_solicitud_conceptos_" + index + "_monto";

    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);

    var $newFormLi = $('<div class="quitar' + i + ' mb-2"></div>').append(newForm);
    $newLinkLi.before($newFormLi);

    addTagFormDeleteLink($newFormLi, index);
    $(conceptos_selector).focus();

    $(conceptos_selector).on('input', function () {
        var j = parseInt($(conceptos_selector).val());
        if (!isNaN(j)) {
            sum += j;
            sum -= anterior;
            parseInt($("#appbundle_solicitud_importeTotal").val(sum));
            anterior = j;
        } else {
            if (!isNaN(sum)) {
                sum -= anterior;
                parseInt($("#appbundle_solicitud_importeTotal").val(sum));
                anterior = 0;
            }
        }

    });
}

function addTagFormDeleteLink($tagFormLi, $index) {
    var $removeFormA = $('<div><input class="btn btn-secondary delete_Concepto_link' + $index + '" value="Quitar" /></div>');
    $tagFormLi.find('#appbundle_solicitud_conceptos_' + $index).append($removeFormA);
    $('div.quitar' + $index).find('#appbundle_solicitud_conceptos_' + $index).find('div').addClass('col');
    $('div.quitar' + $index).find('#appbundle_solicitud_conceptos_' + $index).addClass('row');
    $removeFormA.on('click', function (e) {
        var j = parseInt($('#appbundle_solicitud_conceptos_' + $index + '_monto').val());

        if (!isNaN(j)) {
            sum -= j;
            $("#appbundle_solicitud_importeTotal").val(sum);
        }
        e.preventDefault();
        $tagFormLi.remove();
    });
}

function addTagFormDeleteLinkFor($tagFormLi, $index) {
    var $removeFormA = $('<div class="col"><input class="btn btn-secondary delete_concepto_link" value="Quitar" /></div>');
    $tagFormLi.find('div.row').append($removeFormA); 
    $removeFormA.on('click', function (e) {
        var j = parseInt($('#appbundle_solicitud_conceptos_' + $index + '_monto').val());
        if (!isNaN(j)) {
            sum -= j;
            $("#appbundle_solicitud_importeTotal").val(sum);
        }
        e.preventDefault();
        $tagFormLi.remove();
    });
}
            
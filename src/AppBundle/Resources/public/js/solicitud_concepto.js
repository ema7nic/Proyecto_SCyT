
var $collectionHolder;
//var $addTagLink = $('<input class="btn btn-secondary add_tag_link" value="Agregar" />');

jQuery(document).ready(function () {
    $collectionHolder = $('div.conceptoImporte');
    $addTagLink = $('input.add_tag_link');

    $collectionHolder.find('div.quitar').each(function () {
        addTagFormDeleteLinkFor($(this));
    });

    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagLink.on('click', function (e) {
        e.preventDefault();

        addTagForm($collectionHolder, $addTagLink);
    });
});

function addTagForm($collectionHolder, $newLinkLi) {
    var prototype = $collectionHolder.data('prototype');

    var index = $collectionHolder.data('index');
    var i = index;

    var newForm = prototype;

    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);

    var $newFormLi = $('<div class="quitar' + i + ' mb-2"></div>').append(newForm);
    $newLinkLi.before($newFormLi);

    addTagFormDeleteLink($newFormLi, index);
}

function addTagFormDeleteLink($tagFormLi, index) {
    var $removeFormA = $('<div><input class="btn btn-secondary delete_Concepto_link" value="Quitar" /></div>');
    $tagFormLi.find('#appbundle_solicitud_conceptos_' + index).append($removeFormA);
    $('div.quitar' + index).find('#appbundle_solicitud_conceptos_' + index).find('div').addClass('col');
    $('div.quitar' + index).find('#appbundle_solicitud_conceptos_' + index).addClass('row');

    $removeFormA.on('click', function (e) {
        e.preventDefault();
        $tagFormLi.remove();
    });
}

function addTagFormDeleteLinkFor($tagFormLi) {
    var $removeFormA = $('<div class="col"><input class="btn btn-secondary delete_concepto_link" value="Quitar" /></div>');
    $tagFormLi.find('div.row').append($removeFormA);
    $removeFormA.on('click', function (e) {
        e.preventDefault();
        $tagFormLi.remove();
    });
}
            
require('./bootstrap');
require('./adminlte');
require('trumbowyg/dist/trumbowyg.min');

import icons from "trumbowyg/dist/ui/icons.svg";
import "trumbowyg/dist/ui/trumbowyg.min.css";
import swal from 'sweetalert2';

$.trumbowyg.svgPath = icons;

$(document).ready(function () {
    $('#product-description').trumbowyg();
    $('.delete-form').on('submit',function (e) {
        e.preventDefault();
        const {value: formValues} = swal({
            title: '¿Está seguro?',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Eliminar',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            preConfirm: () => {
                // console.log(e);
                e.target.submit();
            }
        })
    });
});

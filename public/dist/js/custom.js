/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// ROUTE PARAM
let routeParam = function(url, id = undefined) {
    if(id == undefined){
        return url;
    }else{
        return url.replace(':id', id);
    }
}

// CUSTOM FILE INPUT
let customFileInput = function (event) {
    let file = document.getElementById(event.target.id).files[0],
        imagePreview = document.getElementById(event.target.id + '_preview'),
        imageLabel = event.target.nextElementSibling;

    imageLabel.innerText = file.name;

    if (imagePreview != undefined) {
        imagePreview.src = URL.createObjectURL(file);
        imagePreview.onLoad = function () {
            URL.revokeObjectURL(imagePreview.src)
        }
    }
}

// STRING EMPTY AND NULL
function stringEmptyAndNull(data){
    if(data === null || data.trim() === ""){
        return '-'
    }else{
        return data;
    }
}

// CONVERT RUPIAH
const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
    }).format(number);
}

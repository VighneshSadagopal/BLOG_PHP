function loadcreate() {
    document.getElementById("createpost").classList.add('show');

}

const close = document.getElementById('close');

close.addEventListener('click', () => {
    document.getElementById("createpost").classList.remove('show');
    document.getElementById("videowrap").classList.remove('show');


});
const addphoto = document.getElementById('addphoto');

addphoto.addEventListener('click', () => {

    document.getElementById("videowrap").classList.add('show');
    document.getElementById("createpost").classList.add('show');

});
const files = document.getElementById("files");

files.addEventListener('click', () => {
    document.getElementById("createpost").classList.add('show');
    filebtn();
});
const images = document.getElementById("images");

images.addEventListener('click', () => {
    document.getElementById("createpost").classList.add('show');
    filebtn();
});
'use strict';

const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const snap = document.getElementById("snap");
const upload = document.getElementById("upload");
const submit = document.getElementById("submit");
const errorMsgelement = document.getElementById("snaperror");
const file = document.querySelector("#filebtn");
const photo = document.getElementById("photo");

const constraints = {
    video: {
        width: 1280,
        height: 720
    }
};
async function init() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
    } catch (e) {
        errorMsgelement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
    }
}

function handleSuccess(stream) {
    window.stream = stream;
    video.srcObject = stream;
}
init();
var context = canvas.getContext('2d');
snap.addEventListener("click", function(e) {

    e.preventDefault();

    context.drawImage(video, 0, 0, 640, 480);
    var dataurl = canvas.toDataURL();
    $("#photo").val(dataurl);

});
$(document).ready(function(e) {

    upload.addEventListener("click", function() {
        $.ajax({
            url: "../function/formfunction.php",
            type: "post",
            data: {
                'photo': $("#photo").val()
            },
            success: function(res) {

                alert('form was submitted');

            }
        });

    });
});




function filebtn() {
    file.click();
}
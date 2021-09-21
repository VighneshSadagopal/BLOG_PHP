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
const errorMsgelement = document.getElementById("snaperror");
const file = document.querySelector("#filebtn");


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
snap.addEventListener("click", function() {
    context.drawImage(video, 0, 0, 640, 480);


});
upload.addEventListener("click", function() {
    canvas.toBlob(function(blob) {


        saveAs(blob, "image.png");
    });
});

function filebtn() {
    file.click();
}
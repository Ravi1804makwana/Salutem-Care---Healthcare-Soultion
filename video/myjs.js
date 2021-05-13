function MuteAudio() {

    var constraints = { audio: false, video: true};

    navigator.mediaDevices.getUserMedia(constraints).then(function(mediaStream){
        var video = document.querySelector('#localVideo');
        video.srcObject = mediaStream;
        video.play();
    });

}
function UnMuteAudio() {

    var constraints = { audio: true, video: true };

    navigator.mediaDevices.getUserMedia(constraints).then(function(mediaStream){
        var video = document.querySelector('#localVideo');
        video.srcObject = mediaStream;
        video.play();
    });

}
function MuteVideo() {

    var constraints = { audio: true,  video: false };

    navigator.mediaDevices.getUserMedia(constraints).then(function(mediaStream){
        var video = document.querySelector('#localVideo');
        video.srcObject = mediaStream;
        video.play();
    });

}
function UnMuteVideo() {

    var constraints = { audio: true,  video: true};

    navigator.mediaDevices.getUserMedia(constraints).then(function(mediaStream){
        var video = document.querySelector('#localVideo');
        video.srcObject = mediaStream;
        video.play();
    });

}
var video = document.querySelector("#videoElement");
                navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUsermedia 
                    || navigator.mozGetUserMedia || navigato.msGetUserMedia || navigator.oGetUserMedia;

                    if(navigator.getUserMedia){
                      navigator.getUserMedia({video:true}, handleVideo, videoError)      
                    }

                    function handleVideo(stream){
                    video.srcObject = stream;
                    video.play();
                    }

                    

                    function videoError(e){}


                    let disconnect = document.getElementById('disconnect');

                    disconnect.addEventListener('click', function(){

                      video.srcObject = null;
                    })


                    let connect = document.getElementById('connect');

                    connect.addEventListener('click', function(){

                      var video = document.querySelector("#videoElement");
                navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUsermedia 
                    || navigator.mozGetUserMedia || navigato.msGetUserMedia || navigator.oGetUserMedia;

                    if(navigator.getUserMedia){
                      navigator.getUserMedia({video:true}, handleVideo, videoError)      
                    }

                    function handleVideo(stream){
                    video.srcObject = stream;
                    video.play();
                    }

                    

                    function videoError(e){}
                    })


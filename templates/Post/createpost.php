
            <div class="create">
                <div class="name">
            <img src="../../images/<?php echo $image ?>" id =" clipped" >
                <button id="createbtn" onclick="loadcreate();">What's on Your Mind,<?php echo $_SESSION['username'] ?></button>
                </div>
                <hr>
                <div class="tabs">
                    <div class="element" id="images">
                        <i class="far fa-images"></i>
                        <p>Image/Video</p>
                    </div>
                    <div class="element" id="files">
                        <i class="far fa-folder"></i>
                        <p>Files</p>
                    </div>
                    <div class="element" id="addphoto">
                        <i class="fas fa-camera"></i>
                        <p>Capture</p>
                    </div>
                </div>

            </div>
<div class="createpost" id="createpost">
                <button id="close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="row">
                    <h2>Create Post</h2>

                    <hr>
                    <form class="form" method="POST" action="../function/formfunction.php" enctype="multipart/form-data">
                    <div class="name">
                    <img src="../../images/<?php echo $image ?>" id =" clipped" >
                   
                        <p><?php echo $_SESSION['username']; ?></p>
                        </div>
                        <input type="text" name="title" placeholder="Title">
                        <input type="text" name="category" placeholder="Category">
                        <input type="file" id="filebtn" name="imgfile"  hidden> 
                        <textarea name="description" name="description" rows="9" placeholder="Write About Your thoughts"></textarea>
                        <div class="video-wrap" id="videowrap">
                            <video id="video" playsinline autoplay></video>
                      
                        <canvas id="canvas" width="640" height="480" ></canvas>
                        
                       
                        <input type="button" id="upload" value="Upload" name="upload">
                        </div>
                        <span>

                            <p>Add to your post</p>
                            <div class="attach">
                                <p onclick="filebtn()"> <i class="far fa-images" id = "imvi"></i></p>
                                <p onclick="filebtn()"> <i class="far fa-folder" id = "file"></i></p>
                                <p> <i class="fas fa-camera" id="snap"></i></p>
                            </div>
                        </span>

                        <button type="submit" name="submit">Post</button>
                    </form>
                </div>
            </div>

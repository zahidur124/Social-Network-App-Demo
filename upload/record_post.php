<?php
	require "Mobile_Detect.php";

	$detect = new Mobile_Detect;

	if( $detect->isiOS() || $detect->isAndroidOS()){


		echo "
					<form id = 'uploadImage' action = 'upload.php?q=image' method='post' enctype='multipart/form-data'>

              <div class='image-upload row'>

                <div class='preview-box col-xs-6'>
                  <h4>Select Main Image</h4>

                  <div id='fileDisplayArea'>
                  </div>

                  <div class=image-preview>
                    <img id='image_upload_preview' alt='''/>
                  </div>


                </div><!--End Preview box-->

                <div class='button-box col-xs-6'><!--Button box -->

                  <div class='input-button row'>
                    <label class='myLabel'>
                      <input type='file' id='fileInput' name='photo_lib' accept='image/*''>
                      <span>Photo Library</span>
                    </label>
                  </div>

                  <div class='input-button row'>
                    <label class='myLabel'>
                    <input type='file' id='inputFile'name='cam_lib' capture='camera' accept='image/*'>
                      <span>Take Photo</span>
                    </label>
                  </div>

                  <div class='input-button row'>
                    <label class='myLabel'>
                      <input type='file' id='fileInput'>
                      <span>Upload History</span>
                    </label>
                  </div>

                </div><!--Button box -->

              </div><!--Image Upload-->

              <div class='add-caption row'>
                  <div class='caption-row col-xs-12 col-sm-6 col-md-8'>

                    <div class = 'form-group'>
                        <label for = 'name'>Add Caption</label>
                          <textarea id='imgtext' name='caption' form='uploadImage' class = 'form-control' rows = '3'></textarea>
                    </div><!--Form Group-->

                  </div><!--Caption-row-->


              </div><!--Add-caption-->

              <div class='add-comment row'>
                  <div class='comment-row col-xs-12 col-sm-6 col-md-8'>

                    <div class = 'form-group'>
                        <label for = 'name'>Add Comment</label>
                          <textarea id='caption' name='comment' class = 'form-control' rows = '5'></textarea>
                    </div><!--Form Group-->

                  </div><!--Comment-row-->


              </div><!--add-comment-->


              <div class='Continue row'><!--Continue Row-->

                  <div class='continue-column col-xs-12 col-sm-6 col-md-8'><!--Continue column-->
                    <input type='submit' class='btn btn-md btn-primary'value='Continue'>
                  </div><!--Continue column-->

              </div><!--Continue Row-->

            </form>";


			echo "
						<form id = 'uploadVideo' action = 'upload.php?q=video' method='post' enctype='multipart/form-data'>

	              <div class='image-upload row'>

	                <div class='preview-box col-xs-6'>
	                  <h4>Select Main Image</h4>



	                </div><!--End Preview box-->

	                <div class='button-box col-xs-6'><!--Button box -->

	                  <div class='input-button row'>
	                    <label class='myLabel'>
												<input type='file' name='vid_lib' accept='image/*''>
	                      <span>Video Library</span>
	                    </label>
	                  </div>

	                  <div class='input-button row'>
	                    <label class='myLabel'>
	                    <input type='file' name='camcorder_lib' capture='camcorder' accept='video/*'>
	                      <span>Take Video</span>
	                    </label>
	                  </div>

	                  <div class='input-button row'>
	                    <label class='myLabel'>

	                      <span>Upload History</span>
	                    </label>
	                  </div>

	                </div><!--Button box -->

	              </div><!--Image Upload-->

	              <div class='add-caption row'>
	                  <div class='caption-row col-xs-12 col-sm-6 col-md-8'>

	                    <div class = 'form-group'>
	                        <label for = 'name'>Add Caption</label>
	                          <textarea id='imgtext' name='caption' form='uploadVideo' class = 'form-control' rows = '3'></textarea>
	                    </div><!--Form Group-->

	                  </div><!--Caption-row-->


	              </div><!--Add-caption-->

	              <div class='add-comment row'>
	                  <div class='comment-row col-xs-12 col-sm-6 col-md-8'>

	                    <div class = 'form-group'>
	                        <label for = 'name'>Add Comment</label>
	                          <textarea id='caption' name='comment' class = 'form-control' rows = '5'></textarea>
	                    </div><!--Form Group-->

	                  </div><!--Comment-row-->


	              </div><!--add-comment-->


	              <div class='Continue row'><!--Continue Row-->

	                  <div class='continue-column col-xs-12 col-sm-6 col-md-8'><!--Continue column-->
	                    <input type='submit' class='btn btn-md btn-primary'value='Continue'>
	                  </div><!--Continue column-->

	              </div><!--Continue Row-->

	            </form>";



										echo "
													<form id = 'uploadAudio'  action='upload.php' method='post' enctype='multipart/form-data'>

								              <div class='image-upload row'>

															<div class = 'color-picker col-xs-12 col-sm-6 col-md-8'>
																	<input name='color2' type='hidden' id='color_value' value='99cc00'>
																	<button class='jscolor {valueElement: 'color_value'}'>Pick a color</button>
															</div>



								              </div><!--Image Upload-->

								              <div class='add-caption row'>
								                  <div class='caption-row col-xs-12 col-sm-6 col-md-8'>

								                    <div class = 'form-group'>
								                        <label for = 'name'>Add Caption</label>
								                          <textarea id='imgtext' name='caption' form='uploadVideo' class = 'form-control' rows = '3'></textarea>
								                    </div><!--Form Group-->

								                  </div><!--Caption-row-->


								              </div><!--Add-caption-->

								              <div class='add-comment row'>
								                  <div class='comment-row col-xs-12 col-sm-6 col-md-8'>

								                    <div class = 'form-group'>
								                        <label for = 'name'>Add Comment</label>
								                          <textarea id='caption' name='comment' class = 'form-control' rows = '5'></textarea>
								                    </div><!--Form Group-->

								                  </div><!--Comment-row-->


								              </div><!--add-comment-->


								              <div class='Continue row'><!--Continue Row-->

								                  <div class='continue-column col-xs-12 col-sm-6 col-md-8'><!--Continue column-->
								                    <input type='submit' class='btn btn-md btn-primary'value='Continue'>
								                  </div><!--Continue column-->

								              </div><!--Continue Row-->

								            </form>";






		/*
 		echo"
			<div class = 'button-section'>
			<div class = 'row'>
				<button id = 'video' class='btn btn-md btn-primary'>Take Video</button>
			</div>

			<div class = 'row'>
				<button id = 'picture' class='btn btn-md btn-primary'>Take Picture</button>
			</div>

			<div class = 'row'>
				<button id = 'audio' class='btn btn-md btn-primary'>Record Audio</button>
			</div>

			</div>

 			<div class = 'post-type'>
 				<div class = 'record-video'>
	 				<input type='file' class='form-control' capture='camecorder' accept='video/*' id='cameraInput' name='cameraInput'><br>
	 				<input id='caption' name = 'caption' placeholder='Enter cpation'><br>
						<div class = 'row'>
							<div class = 'col-xs-2' id='color-picker'>
								<p><i class='fa fa-1x fa-font'></i><br><input id = 'textfont' name='textfont'  style = 'border:none;' type='color' class='form-control'> </p>
							</div>
							<div class = 'col-xs-2' id='color-picker'>
								<p><i class='fa fa-1x fa-paint-brush'></i><br><input id = 'backgroundColor' name='backgroundColor' style = 'border:none;' type='color' class='form-control'> </p>
							</div>
						</div>
	 				<button class='btn btn-md btn-primary save-button'>Post</post>
	 			</div>
	 			<div class = 'record-image'>
	 				<form id = 'uploadImage' action = 'upload.php?q=image' method='post' enctype='multipart/form-data'>
	 					<input type='file' id='fileToUpload' name='fileToUpload' class='form-control' capture='camera' accept='image/*'><br>
	 					<input id='caption' name = 'caption' placeholder='Enter cpation'><br>
						<div class = 'row'>
							<div class = 'col-xs-2' id='color-picker'>
								<p><i class='fa fa-1x fa-font'></i><br><input id = 'textfont' name='textfont'  style = 'border:none;' type='color' class='form-control'> </p>
							</div>
							<div class = 'col-xs-2' id='color-picker'>
								<p><i class='fa fa-1x fa-paint-brush'></i><br><input id = 'backgroundColor' name='backgroundColor' style = 'border:none;' type='color' class='form-control'> </p>
							</div>
						</div>
	 					<input type='submit' class='btn btn-md btn-primary' value='Post'>
	 				</form>
	 			</div>
	 			<div  class = 'record-audio'>
	 				<form id = 'uploadAudio' action = 'upload.php?q=audio' method='post' enctype='multipart/form-data'>
		 				<input type='file' id='fileToUpload' name='fileToUpload' class='form-control' accept='audio/*;capture=microphone'><br>
		 				<input type='submit' class='btn btn-md btn-primary' value='post'>
		 			</form>
	 			</div>
 			</div>";
			*/

	} else{

		echo "please use your android or iphone";
	}



?>

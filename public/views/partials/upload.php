<div>
    <i-navigation/>
</div>
<div class="container"
     flow-init
     flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1,bmp:1}[$file.getExtension()]"
     flow-files-submitted="$flow.upload()">
    <h1>Upload section</h1>

    <div class="ng-scope">
        <div class="drop" flow-drop="" ng-class="dropClass">
            <span class="btn btn-default" flow-btn="">Upload Image<input type="file" multiple="multiple"
                                                                         style="visibility: hidden; position: absolute;"></span>
            <span class="btn btn-default" flow-btn="" flow-directory="" ng-show="$flow.supportDirectory">Upload Folder of Images<input
                    type="file" multiple="multiple" webkitdirectory="webkitdirectory"
                    style="visibility: hidden; position: absolute;"></span>
            <b>OR</b>
            Drag And Drop your images here
        </div>

        <br>

        <div>

            <!-- ngRepeat: file in $flow.files -->
            <div ng-repeat="file in $flow.files" class="gallery-box ng-scope">
                <span class="title ng-binding">download.jpg</span>

                <div class="thumbnail" ng-show="$flow.files.length">
                    <img flow-img="file"/>
                </div>
                <div class="progress progress-striped" ng-class="{active: file.isUploading()}">
                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                         aria-valuemax="100" ng-style="{width: (file.progress() * 100) + '%'}" style="width: 100%;">
                        <span class="sr-only ng-binding">1% Complete</span>
                    </div>
                </div>
                <div class="btn-group">
                    <a class="btn btn-xs btn-danger" ng-click="file.cancel()">
                        Remove
                    </a>
                </div>
            </div>
            <!-- end ngRepeat: file in $flow.files -->
            <div class="clear"></div>
        </div>

    </div>
</div>
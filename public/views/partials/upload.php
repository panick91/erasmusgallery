<div flow-init
     low-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]"
     flow-files-submitted="$flow.upload()">
    <h1>Upload section</h1>
    <div class="container">
        <div>
            <div class="alert"
                 flow-drop
                 flow-drag-enter="class='alert-success'"
                 flow-drag-leave="class=''"
                 ng-class="class">
                Drag And Drop your file here
            </div>
            <span class="btn" flow-btn flow-attrs="{accept:'image/*'}">
                <i class="icon icon-file"></i>
                Upload Files
            </span>
            <span class="btn" flow-btn flow-directory ng-show="$flow.supportDirectory">
                <i class="icon icon-folder-open"></i>
                Upload Folder
            </span>

        </div>
        <hr class="soften">

        <h2>Transfers:</h2>

        <p>
            <a class="btn btn-small btn-success" ng-click="$flow.resume()">Upload</a>
            <a class="btn btn-small btn-danger" ng-click="$flow.pause()">Pause</a>
            <a class="btn btn-small btn-info" ng-click="$flow.cancel()">Cancel</a>
            <span class="label label-info">Size: {{$flow.getSize()}}</span>
            <span class="label label-info">Is Uploading: {{$flow.isUploading()}}</span>
        </p>
        <table class="table table-hover table-bordered table-striped" flow-transfers>
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Size</th>
                <th>Relative Path</th>
                <th>Unique Identifier</th>
                <th>#Chunks</th>
                <th>Progress</th>
                <th>Paused</th>
                <th>Uploading</th>
                <th>Completed</th>
                <th>Settings</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="file in transfers">
                <td>{{$index+1}}</td>
                <td>{{file.name}}</td>
                <td>{{file.size}}</td>
                <td>{{file.relativePath}}</td>
                <td>{{file.uniqueIdentifier}}</td>
                <td>{{file.chunks.length}}</td>
                <td>{{file.progress()}}</td>
                <td>{{file.paused}}</td>
                <td>{{file.isUploading()}}</td>
                <td>{{file.isComplete()}}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-mini btn-warning" ng-click="file.pause()" ng-hide="file.paused">
                            Pause
                        </a>
                        <a class="btn btn-mini btn-warning" ng-click="file.resume()" ng-show="file.paused">
                            Resume
                        </a>
                        <a class="btn btn-mini btn-danger" ng-click="file.cancel()">
                            Cancel
                        </a>
                        <a class="btn btn-mini btn-info" ng-click="file.retry()" ng-show="file.error">
                            Retry
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>


    </div>
</div>
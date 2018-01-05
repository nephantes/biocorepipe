<div class="box-header" style=" padding-top:0px; font-size:large; ">
    <div style=" border-bottom:1px solid lightgrey;">
        <i class="fa fa-calendar-o " style="margin-left:0px; margin-right:0px;"></i> Project:
        <input class="box-dynamic width-dynamic" type="text" projectid="<?php echo $id;?>" name="projectTitle" autocomplete="off" placeholder="Enter Project Name" style="margin-left:0px; font-size: large; font-style:italic; align-self:center; max-width: 500px;" title="Rename" data-placement="bottom" data-toggle="tooltip" num="" id="pipeline-title"><span class="width-dynamic" style="display:none"></span></input>
        <button type="submit" id="saveProject" class="btn" name="button" data-backdrop="false" onclick="saveProject()" style=" margin:0px; padding:0px;">
                    <a data-toggle="tooltip" data-placement="bottom" data-original-title="Save Project">
                        <i class="fa fa-save" style="font-size: 17px;"></i></a></button>
        <!--
        <button type="submit" id="dupProject" class="btn" name="button" data-backdrop="false" onclick="duplicateProject()" style=" margin:0px; padding:0px;">
                    <a data-toggle="tooltip" data-placement="bottom" data-original-title="Duplicate Project">
                        <i class="fa fa-copy" style="font-size: 16px;"></i></a></button>
-->
        <button type="button" id="delProject" class="btn" name="button" data-backdrop="false" onclick="delProject()" style=" margin:0px; padding:0px;">
                    <a data-toggle="tooltip" data-placement="bottom" data-original-title="Delete Project">
                        <i class="glyphicon glyphicon-trash"></i></a></button>
        <div id="projectActDiv" style="float:right; margin-right:5px;" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="projectAct" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="vertical-align:middle;"><div class="fa fa-ellipsis-h"></div></button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu4">
                <li><a id="deleteProject" data-toggle="modal" href="#deleteProjectModal">Delete</a></li>
            </ul>
        </div>
    </div>
</div>

<div style="padding-left:16px; padding-right:16px; padding-bottom:20px;" id="desProject">
    <div class="row" id="creatorProject" style="font-size:12px;"> Created by <span id="ownUserName">admin</span> on <span id="datecreatedPj">Jan. 26, 2016 04:12</span> • Last edited on <span id="lasteditedPj">Feb. 8, 2017 12:15</span></div>
    </br>
    <div class="row" id="desTitleProject"><b>Description</b></div>
    </br>
    <div class="row"><textarea placeholder="Enter project description here.." rows="3" style="min-width: 100%; max-width: 100%; border-color:lightgrey;"></textarea></div>
</div>



<div class="panel panel-default" id="runtablepanel">
    <div class="panel-heading clearfix">
        <div class="pull-right">
            <button type="button" class="btn btn-primary btn-sm" title="Add Project" id="addproject" data-toggle="modal" data-target="#runmodal">Add Pipeline</button>
        </div>
        <div class="pull-left">
            <h5><i class="fa fa-rocket"></i> Runs</h5>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <table id="runtable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Pipeline Name</th>
                        <th>Owner</th>
                        <th>Modified on</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
</br>

<div class="panel panel-default" id="filetablepanel">
    <div class="panel-heading clearfix">
        <div class="pull-right">
            <button type="button" class="btn btn-primary btn-sm" title="Add Files" id="addfile" data-toggle="modal" data-target="#filemodal">Add Files</button>
        </div>
        <div class="pull-left">
            <h5><i class="fa fa-folder-open-o"></i> Files</h5>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <table id="filetable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>Sample ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
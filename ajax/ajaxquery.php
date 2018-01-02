<?php
error_reporting(E_ERROR);
error_reporting(E_ALL);
ini_set('report_errors','on');

require_once("../ajax/dbfuncs.php");

$db = new dbfuncs();

session_start();
$ownerID = isset($_SESSION['ownerID']) ? $_SESSION['ownerID'] : "";
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$google_id = isset($_SESSION['google_id']) ? $_SESSION['google_id'] : "";


$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
$p = isset($_REQUEST["p"]) ? $_REQUEST["p"] : "";
$start = NULL;
$end = NULL;
if (isset($_REQUEST["start"])) {
	$start = $_REQUEST["start"];
	$end = $_REQUEST["end"];
}
if (isset($_REQUEST["type"])) {
    $type = $_REQUEST["type"];
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}


if ($p=="createNextflow"){
	$data = $db -> getNextflow($id);
}

else if ($p=="getAllParameters"){
    $data = $db -> getAllParameters($ownerID);
}

else if ($p=="getAllProcesses"){
    $data = $db -> getAllProcesses();
}
else if ($p=="getAllProcessGroups"){
    $data = $db -> getAllProcessGroups($ownerID);
}
//else if ($p=="getAllProcessParameters"){
//   $process_id = $_REQUEST["process_id"];
//   $data = $db->getAllProcessParameters($process_id, $type, $start, $end);
//}

else if ($p=="removeParameter"){
    $db->removeProcessParameterByParameterID($id);
    $data = $db->removeParameter($id);
}
else if ($p=="removeProcessGroup"){
    $db->removeProcessParameterByProcessGroupID($id);
    $db->removeProcessByProcessGroupID($id);
    $data = $db->removeProcessGroup($id);
}
else if ($p=="removePipelineById"){   
	$data = $db -> removePipelineById($id);
}

else if ($p=="removeProcess"){   
    $db->removeProcessParameterByProcessID($id);
//    $db->removePipelineProcessByProcessID($id);
	$data = $db -> removeProcess($id);
}
else if ($p=="removeProcessParameter"){   
	$data = $db -> removeProcessParameter($id);
}
else if ($p=="saveParameter"){
    $name = $_REQUEST['name'];
    $qualifier = $_REQUEST['qualifier'];
    $file_type = $_REQUEST['file_type'];
    
    if (!empty($id)) {
       $data = $db->updateParameter($id, $name, $qualifier, $file_type, $ownerID);
    } else {
       $data = $db->insertParameter($name, $qualifier, $file_type, $ownerID);
    }
}
else if ($p=="saveUser"){
    $google_id = $_REQUEST['google_id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $google_image = $_REQUEST['google_image'];
    $username = $_REQUEST['username'];
    //check if Google ID already exits
    $checkUser = $db->getUser($google_id);
    $checkarray = json_decode($checkUser,true); 
    $id = $checkarray[0]["id"];
    if (!empty($id)) {
        $data = $db->updateUser($id, $google_id, $name, $email, $google_image, $username);    
    } else {
        $data = $db->insertUser($google_id, $name, $email, $google_image, $username);  
    }
}
else if ($p=="checkLogin"){
    if (!empty($google_id)) {
       $checkUser = $db->getUserLess($google_id);
       $data = $checkUser;
    }else {
	   $errAr = array('error' => 1);
	   $data = json_encode($errAr);
    }
}
else if ($p=="saveProcessGroup"){
    $group_name = $_REQUEST['group_name'];
    if (!empty($id)) {
       $data = $db->updateProcessGroup($id, $group_name, $ownerID);
    } else {
       $data = $db->insertProcessGroup($group_name, $ownerID);
    }
}
else if ($p=="saveProcess"){
    $name = $_REQUEST['name'];
    $process_gid = $_REQUEST['process_gid'];
    $summary = $_REQUEST['summary'];
    $process_group_id = $_REQUEST['process_group_id'];
    $script = $_REQUEST['script']; 
    $script = htmlspecialchars($script, ENT_QUOTES);
    $rev_id = $_REQUEST['rev_id']; 
    $rev_comment = $_REQUEST['rev_comment']; 
    if (!empty($id)) {
        $data = $db->updateProcess($id, $name, $process_gid, $summary, $process_group_id, $script, $ownerID);
    } else {
        $data = $db->insertProcess($name, $process_gid, $summary, $process_group_id, $script, $rev_id, $rev_comment, $ownerID);
    }
}
//else if ($p=="savePipelineProcess"){
//    $name = $_REQUEST['name'];
//    $pipeline_id = $_REQUEST['pipeline_id'];
//    $process_id = $_REQUEST['process_id'];
//    $data = $db->insertPipelineProcess($name, $pipeline_id, $process_id);
//}
else if ($p=="saveProcessParameter"){
    $name = $_REQUEST['name'];
    $process_id = $_REQUEST['process_id'];
    $parameter_id = $_REQUEST['parameter_id'];
    $type = $_REQUEST['type'];
    if (!empty($id)) {
        $data = $db->updateProcessParameter($id, $name, $process_id, $parameter_id, $type, $ownerID);
    } else {
        $data = $db->insertProcessParameter($name, $process_id, $parameter_id, $type, $ownerID);
    }
}

//else if ($p=="savePipelineProcessParameterDefault") //(2)  savePipelineProcessParameter yerine savePipelineProcessParameterDefault yazildi.
//{
//    $pipeline_id = $_REQUEST['pipeline_id'];
//    $process_id = $_REQUEST['process_id'];
//    $name = $_REQUEST['name'];
//    
//    $data = $db->insertPipelineProcessParameterDefault($name, $pipeline_id, $process_id);
//}
else if ($p=="getProcessData")
{
	$id = $_REQUEST['process_id'];
    $data = $db->getProcessData($id, $ownerID);
}
else if ($p=="getRevisionData")
{
	$id = $_REQUEST['process_id'];
    $process_gidAr =$db->getProcessGID($id);
    $checkarray = json_decode($process_gidAr,true); 
    $process_gid = $checkarray[0]["process_gid"];
    $data = $db->getRevisionData($process_gid);
}
else if ($p=="checkPipeline")
{
	$process_id = $_REQUEST['process_id'];
	$process_name = $_REQUEST['process_name'];
    $data = $db->checkPipeline($process_id,$process_name, $ownerID);
}

else if ($p=="getMaxProcess_gid")
{
    $data = $db->getMaxProcess_gid();
}
else if ($p=="getProcess_gid")
{
    $process_id = $_REQUEST['process_id'];
    $data = $db->getProcess_gid($process_id);
}
else if ($p=="getMaxRev_id")
{
    $process_gid = $_REQUEST['process_gid'];
    $data = $db->getMaxRev_id($process_gid);
}
else if ($p=="getInputs")
{
	$process_id = $_REQUEST['process_id'];
    $data = $db->getInputs($process_id);
}
else if ($p=="getOutputs")
{
	$process_id = $_REQUEST['process_id'];
    $data = $db->getOutputs($process_id);
}
else if ($p=="getParametersData")
{
    $data = $db->getParametersData($ownerID);
}
else if ($p=="saveAllPipeline")
{
	$dat = $_REQUEST['dat'];
    $data = $db->saveAllPipeline($dat,$ownerID);
}
else if ($p=="savePipelineName"){
    $name = $_REQUEST['name'];
    if (!empty($id)) {
        $data = $db->updatePipelineName($id, $name);
    } else {
        $data = $db->insertPipelineName($name,$ownerID);
    }
}
else if ($p=="getSavedPipelines")
{
    $data = $db->getSavedPipelines($ownerID);
}

else if ($p=="loadPipeline")
{
	$id = $_REQUEST['id'];
    $data = $db->loadPipeline($id);
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo $data;
exit;
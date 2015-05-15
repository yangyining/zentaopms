<?php
$lang->custom->common    = 'Custom';
$lang->custom->index     = 'Index';
$lang->custom->set       = 'Set custom';
$lang->custom->restore   = 'restore';
$lang->custom->key       = 'Key';
$lang->custom->value     = 'Value';
$lang->custom->flow      = 'Flow';

$lang->custom->object['story']    = 'Story';
$lang->custom->object['task']     = 'Task';
$lang->custom->object['bug']      = 'Bug';
$lang->custom->object['testcase'] = 'Case';
$lang->custom->object['testtask'] = 'Build';
$lang->custom->object['todo']     = 'Todo';
$lang->custom->object['user']     = 'User';

$lang->custom->story = new stdClass();
$lang->custom->story->fields['priList']          = 'Priority';
$lang->custom->story->fields['sourceList']       = 'Source';
$lang->custom->story->fields['reasonList']       = 'Closed reason';
$lang->custom->story->fields['stageList']        = 'Stage';
$lang->custom->story->fields['statusList']       = 'Status';
$lang->custom->story->fields['reviewResultList'] = 'Reviewed result';
$lang->custom->story->fields['review']           = 'Reviewed procedure';

$lang->custom->task = new stdClass();
$lang->custom->task->fields['priList']    = 'Priority';
$lang->custom->task->fields['typeList']   = 'Type';
$lang->custom->task->fields['reasonList'] = 'Closed reason';
$lang->custom->task->fields['statusList'] = 'Status';

$lang->custom->bug = new stdClass();
$lang->custom->bug->fields['priList']        = 'Priority';
$lang->custom->bug->fields['severityList']   = 'Severity';
$lang->custom->bug->fields['osList']         = 'OS';
$lang->custom->bug->fields['browserList']    = 'Browser';
$lang->custom->bug->fields['typeList']       = 'Type';
$lang->custom->bug->fields['resolutionList'] = 'Resolution';
$lang->custom->bug->fields['statusList']     = 'Status';

$lang->custom->testcase = new stdClass();
$lang->custom->testcase->fields['priList']    = 'Priority';
$lang->custom->testcase->fields['typeList']   = 'Type';
$lang->custom->testcase->fields['stageList']  = 'Stage';
$lang->custom->testcase->fields['resultList'] = 'Result';
$lang->custom->testcase->fields['statusList'] = 'Status';

$lang->custom->testtask = new stdClass();
$lang->custom->testtask->fields['priList']    = 'Priority';
$lang->custom->testtask->fields['statusList'] = 'Status';

$lang->custom->todo = new stdClass();
$lang->custom->todo->fields['priList']    = 'Priority';
$lang->custom->todo->fields['typeList']   = 'Type';
$lang->custom->todo->fields['statusList'] = 'Status';

$lang->custom->user = new stdClass();
$lang->custom->user->fields['roleList']   = 'Role';
$lang->custom->user->fields['statusList'] = 'Status';

$lang->custom->currentLang = 'For current language';
$lang->custom->allLang     = 'For all language';

$lang->custom->confirmRestore = 'Are you sure to restore the default lang setting?';

$lang->custom->notice = new stdclass();
$lang->custom->notice->userRole = 'The length of key must be less than 20!';

$lang->custom->storyReview   = 'Reviewed procedure';
$lang->custom->reviewList[1] = 'Open';
$lang->custom->reviewList[0] = 'Close';

$lang->custom->flowList['productproject'] = 'The relation of product and project';

$lang->custom->productproject = new stdclass();
$lang->custom->productproject->relation['0_0'] = 'Product - Project';
$lang->custom->productproject->relation['0_1'] = 'Product - Iterative';
$lang->custom->productproject->relation['1_1'] = 'Project - Iterative';

$lang->custom->productproject->product[0] = 'Product';
$lang->custom->productproject->product[1] = 'Project';
$lang->custom->productproject->project[0] = 'Project';
$lang->custom->productproject->project[1] = 'Iterative';

$lang->custom->productproject->locked = 'PMS';

$lang->custom->productproject->notice = 'You can change the name of product and project, and the corresponding name display';

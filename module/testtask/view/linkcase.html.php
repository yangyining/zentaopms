<?php
/**
 * The linkcase view file of testtask module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     testtask
 * @version     $Id: linkcase.html.php 4411 2013-02-22 00:56:04Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/tablesorter.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon($lang->icons['testtask']);?> <strong><?php echo $task->id;?></strong></span>
    <strong><?php echo html::a($this->createLink('testtask', 'view', 'taskID=' . $task->id), $task->name, '_blank');?></strong>
    <small class='text-muted'> <?php echo $lang->testtask->linkCase;?> <?php echo html::icon($lang->icons['link']);?></small>
  </div>
  <div class='actions'>
    <?php
    echo "<div class='btn-group'>";

    echo "<span class='dropdown'>";
    echo "<button class='btn' type='button' data-toggle='dropdown'><i class='icon icon-link'></i> {$lang->testtask->linkByVersion} <span class='caret'></span></button>";
    echo "<ul class='dropdown-menu' style='max-height:240px;overflow-y:auto'>";
    foreach($testTask as $tmpID => $tmpTitle)
    {
        $active = ($type == 'byversion' and (int)$param == $tmpID) ? "class='active'" : '';
        echo "<li $active>" . html::a(inlink('linkCase', "taskID=$taskID&type=byversion&param=$tmpID"), $tmpTitle) . "</li>";
    }
    echo "</ul></span>";

    echo "<span class='dropdown'>";
    echo "<button class='btn' type='button' data-toggle='dropdown'><i class='icon icon-link'></i> {$lang->testtask->linkBySuite} <span class='caret'></span></button>";
    echo "<ul class='dropdown-menu' style='max-height:240px;overflow-y:auto'>";
    foreach($suiteList as $suiteID => $suite)
    {
        $active = ($type == 'bysuite' and (int)$param == $suiteID) ? "class='active'" : '';
        $suiteName = $suite->name;
        if($suite->type == 'public') $suiteName .= " <span class='label label-info'>{$lang->testsuite->authorList[$suite->type]}</span>";
        echo "<li $active>" . html::a(inlink('linkCase', "taskID=$taskID&type=bysuite&param=$suiteID"), $suiteName) . "</li>";
    }
    echo "</ul></span>";

    $lang->testtask->linkCase = $lang->testtask->linkByStory;
    common::printIcon('testtask', 'linkCase', "taskID=$taskID&type=bystory", '', 'button', 'link');
    $lang->testtask->linkCase = $lang->testtask->linkByBug;
    common::printIcon('testtask', 'linkCase', "taskID=$taskID&type=bybug", '', 'button', 'link');

    echo '</div>';
    echo "<div class='btn-group'>";
    common::printRPN($this->session->testtaskList);
    echo '</div>';
    ?>
  </div>
  <div id='querybox' class='show'></div>
</div>
<form method='post'>
<table class='table table-condensed table-hover table-striped tablesorter table-fixed table-selectable'>
  <caption class='text-left text-special'>
    <?php echo html::icon('unlink');?> &nbsp;<strong><?php echo $lang->testtask->unlinkedCases;?></strong> (<?php echo $pager->recTotal;?>)
  </caption>
  <thead>
    <tr>
      <th class='w-id'><?php echo $lang->idAB;?></th>
      <th class='w-60px'><nobr><?php echo $lang->testtask->linkVersion;?></nobr></th>
      <th class='w-pri'><?php echo $lang->priAB;?></th>
      <th><?php echo $lang->testcase->title;?></th>
      <th class='w-type'><?php echo $lang->testcase->type;?></th>
      <th class='w-user'><?php echo $lang->openedByAB;?></th>
      <th class='w-80px'><?php echo $lang->testtask->lastRunAccount;?></th>
      <th class='w-120px'><?php echo $lang->testtask->lastRunTime;?></th>
      <th class='w-80px'><?php echo $lang->testtask->lastRunResult;?></th>
      <th class='w-status'><?php echo $lang->statusAB;?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($cases as $case):?>
  <tr class='text-center'>
    <td class='cell-id'>
      <input type='checkbox' name='cases[]' value='<?php echo $case->id;?>' />
      <?php echo html::a($this->createLink('testcase', 'view', "testcaseID=$case->id"), sprintf('%03d', $case->id));?>
    </td>
    <td class='text-center'><?php echo html::select("versions[$case->id]", array_combine(range($case->version, 1), range($case->version, 1)), '', 'class="form-control input-sm" style="padding: 0 5px; height: 20px"');?> </td>
    <td><span class='<?php echo 'pri' . zget($lang->testcase->priList, $case->pri, $case->pri)?>'><?php echo zget($lang->testcase->priList, $case->pri, $case->pri)?></span></td>
    <td class='text-left'>
      <?php
      echo $case->title . ' ( ';
      for($i = $case->version; $i >= 1; $i --)
      {
          echo html::a($this->createLink('testcase', 'view', "caseID=$case->id&version=$i"), "#$i", '_blank');
      }
      echo ')';
      ?>
    </td>
    <td><?php echo $lang->testcase->typeList[$case->type];?></td>
    <td><?php echo $users[$case->openedBy];?></td>
    <td><?php echo $case->lastRunner;?></td>
    <td><?php if(!helper::isZeroDate($case->lastRunDate)) echo date(DT_MONTHTIME1, strtotime($case->lastRunDate));?></td>
    <td class='<?php echo $case->lastRunResult;?>'><?php if($case->lastRunResult) echo $lang->testcase->resultList[$case->lastRunResult];?></td>
    <td class='case-<?php echo $case->status?>'><?php echo $lang->testcase->statusList[$case->status];?></td>
  </tr>
  <?php endforeach;?>
  </tbody>
  <tfoot> 
  <tr>
    <td colspan='10'>
      <?php if($cases):?>
        <div class='table-actions pd-0 clearfix'><?php echo html::selectButton() . html::submitButton();?></div>
      <?php endif;?>
      <div class='text-right'><?php $pager->show();?></div>
    </td>
  </tr>
  </tfoot>
</table>
</form>
<?php include '../../common/view/footer.html.php';?>

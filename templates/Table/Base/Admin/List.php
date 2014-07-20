<?php
echo '<div id="subtitleAdmin">' . $this->label . ' List</div>' . "\n";
include (ADMIN_INCLUDES.'list_add_link.inc.php');
if ($confirm == "true") {
  echo '<table class="dataTable">' . "\n";
  echo '<tr>'. "\n";
  echo '<td class="error">';
  if ($msg == "1") {
    echo $msg1;
  } elseif ($msg == "2") {
    echo $msg2;
  } elseif ($msg == "3") {
    echo $msg3;
  }
  echo '</td>' . "\n";
  echo '</tr>' . "\n";
  echo '</table>' . "\n";
 } ?>

<table class="dataTable">
<tr>
<?php
    foreach ($this->fieldDefs as $fieldName => $fieldDef) {
?>
  <td class="dataHeadingList">
      <?php echo $fieldDef['label'] ?>&nbsp;
      <?php if ($fieldDef['sortable']) { ?>
          <a href="index.php?action=list&dbTable=malt&sort=maltName&dir=ASC"><img src="<?php  echo $imageSrc; ?>sort_up.gif" border="0"></a><a href="index.php?action=list&dbTable=malt&sort=maltName&dir=DESC"><img src="<?php  echo $imageSrc; ?>sort_down.gif" border="0"></a>&nbsp;
      <?php } ?>
  </td>
<?php
    }
?>
  <?php if  ($row_user['userLevel'] == "1") { ?>
  <td class="dataHeadingList" width="16" nowrap><div id="helpInline"><a href="includes/admin_icons.inc.php?dbTable=<?php echo $dbTable; ?>&KeepThis=true&TB_iframe=true&height=450&width=800" title="Administration Icon Reference" class="thickbox"><img src="<?php echo $imageSrc; ?>information.png" align="absmiddle" border="0" alt="Admin Icon Reference" title="Administration Icon Reference"></a></div></td>
  <?php } ?>
</tr>

<?php
foreach ($rows as $i => $row) { 
?>
  <tr class="adminTableRow <?php echo ($i%2==1)?'even':'odd'; ?>">
    <?php foreach ($this->fieldDefs as $fieldName => $fieldDef) { ?>
      <td class="dataList field<?php echo $fieldDef['type'] ?>">
        <?php echo $row[$fieldName]; ?> &nbsp;
      </td>
    <?php } ?>
    <td class="data-icon_list">
      <a href="index.php?action=edit&dbTable=malt&id=<?php echo ['id']; ?>"><img
        src="<?php echo $imageSrc; ?>pencil.png" 
        align="absmiddle" 
        border="0" 
        alt="Edit <?php echo $row[$this->nameField]; ?>" 
        title="Edit <?php echo $row[$this->nameField]; ?>"></a></td>
  <?php if ($row_user['userLevel'] == "1") { ?>
    <td class="data-icon_list"><a href="javascript:DelWithCon('index.php?action=delete&dbTable=malt','id',<?php echo $row['id']; ?>,'Are you sure you want to delete this grain?');"><img src="<?php echo $imageSrc; ?>bin_closed.png" align="absmiddle" border="0" alt="Delete <?php echo $row[$this->nameField]; ?>" title="Delete <?php echo $row[$this->nameField]; ?>"></a></td>
  <?php } ?>
  </tr>
<?php
}
?>
</table>

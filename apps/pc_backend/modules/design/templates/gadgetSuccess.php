<?php slot('submenu'); ?>
<?php include_partial('submenu'); ?>
<?php end_slot(); ?>

<h2>
<?php switch ($type): ?>
<?php case 'login': ?>
<?php echo __('ログイン画面ガジェット設定'); break; ?>
<?php case 'mobileHome': ?>
<?php echo __('携帯版ホーム画面ガジェット設定'); break; ?>
<?php case 'sideBanner': ?>
<?php echo __('サイドバナー領域ガジェット設定'); break; ?>
<?php default: ?>
<?php echo __('ホーム画面ガジェット設定'); ?>
<?php endswitch; ?>
</h2>

<p><?php echo __('特定のページや領域に対して、あらかじめ用意された部品（ガジェット）を自由に配置、設定することができます。') ?></p>

<ul>
<li><?php echo link_to(__('ホーム画面ガジェット設定'), 'design/gadget?type=home') ?></li>
<li><?php echo link_to(__('ログイン画面ガジェット設定'), 'design/gadget?type=login') ?></li>
<li><?php echo link_to(__('サイドバナー領域ガジェット設定'), 'design/gadget?type=sideBanner') ?></li>
<li><?php echo link_to(__('携帯版ホーム画面ガジェット設定'), 'design/gadget?type=mobileHome') ?></li>
</ul>


<?php use_helper('opJavascript') ?>

<div>
<form id="gadgetForm" action="<?php url_for('design/gadget?type='.$type) ?>" method="post">
<?php foreach ($gadgets as $gadgetType => $item): ?>
<?php if ($item): ?>
<?php foreach ($item as $key => $gadget): ?>
<input class="<?php echo $gadgetType ?>Gadget" type="hidden" name="gadget[<?php echo $gadgetType ?>][<?php echo $key ?>]" value="<?php echo $gadget->getId() ?>" />
<?php endforeach; ?>
<?php endif; ?>
<?php echo $sortForm->renderHiddenFields(); ?>
<?php echo $addForm->renderHiddenFields(); ?>
<?php endforeach; ?>
<input type="submit" value="<?php echo __('設定変更') ?>" />
</form>
</div>

<?php echo javascript_tag("
function adjustByIframeContens(obj)
{
  var size = Element.getHeight(obj.contentWindow.document.body);
  obj.style.height = size+'px';
}
");
?>

<iframe src="<?php echo url_for('design/'.$type.'GadgetPlot') ?>" width="600" height="410" onload="adjustByIframeContens(this)" scrolling="no" frameborder="0">
</iframe>

<?php echo make_modal_box('modal', '<iframe width="400" height="400"></iframe>', 400, 400) ?>


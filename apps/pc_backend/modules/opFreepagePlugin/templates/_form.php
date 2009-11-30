<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('opFreepagePlugin/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('opFreepagePlugin/index') ?>">キャンセル</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('削除', 'opFreepagePlugin/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '本当に削除しますか？')) ?>
          <?php endif; ?>
          <input type="submit" value="<?php echo $form->getObject()->isNew() ? '作成' : '更新' ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['body']->renderLabel() ?></th>
        <td>
          <?php echo $form['body']->renderError() ?>
          <?php echo $form['body'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['app_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['app_type']->renderError() ?>
          <?php echo $form['app_type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['auth']->renderLabel() ?></th>
        <td>
          <?php echo $form['auth']->renderError() ?>
          <?php echo $form['auth'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

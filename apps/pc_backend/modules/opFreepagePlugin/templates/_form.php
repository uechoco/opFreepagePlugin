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
          &nbsp;<a href="<?php echo url_for('opFreepagePlugin/index') ?>"><?php echo __('Cancel') ?></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to(__('Delete'), 'opFreepagePlugin/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => __('Are you sure to delete this?'))) ?>
          <?php endif; ?>
          <input type="submit" value="<?php echo $form->getObject()->isNew() ? __('Create') : __('Update') ?>" />
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
          <p>テンプレートの書式については<?php echo link_to('こちら', '@default_template_help', array('popup' => true)) ?>を参照してください。</p>
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

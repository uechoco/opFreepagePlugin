<?php slot('submenu') ?>
<?php include_partial('submenu') ?>
<?php end_slot() ?>

<h2><?php echo __('一覧') ?></h2>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th><?php echo __('Title') ?></th>
      <th><?php echo __('Body') ?></th>
      <th><?php echo __('AppType') ?></th>
      <th><?php echo __('Auth') ?></th>
      <th><?php echo __('Created At') ?></th>
      <th><?php echo __('Updated At') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($freepage_list as $freepage): ?>
    <tr>
      <td><?php echo link_to($freepage->getId(), 'opFreepagePlugin/edit?id='.$freepage->getId()) ?></td>
      <td><?php echo $freepage->getTitle() ?></td>
      <td><?php echo '(' . strlen($freepage->getBody()) . __('文字') . ')' ?></td>
      <td><?php echo $freepage->getAppType() ?></td>
      <td><?php echo ($freepage->getAuth() ? 'あり' : 'なし') ?></td>
      <td><?php echo $freepage->getCreatedAt() ?></td>
      <td><?php echo $freepage->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo link_to(__('新規追加'), 'opFreepagePlugin/new') ?>
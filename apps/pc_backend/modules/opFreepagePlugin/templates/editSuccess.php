<?php slot('submenu') ?>
<?php include_partial('submenu') ?>
<?php end_slot() ?>

<h2><?php echo __('Edit') ?></h2>

<?php include_partial('form', array('form' => $form)) ?>

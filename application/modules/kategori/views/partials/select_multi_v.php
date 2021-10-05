<?php

echo form_label('Pilih Kategori', 'kategori[]', ['class' => 'mb-2']);
echo form_multiselect('kategori[]', @$options, [], [
  'class' => 'form-select use-select2',
  'id' => 'kategori[]',
  'required' => '',
  'data-placeholder' => 'Pilih kategorimu'
], set_value('kategori[]'));

?>
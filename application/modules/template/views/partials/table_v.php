<div class="table-search my-4">
  <?php echo form_open('', ['method' => 'get']) ?>
  <div class="row">
    <div class="col-auto">
      <label for="table-search-input">Search</label>
    </div>
    <div class="col col-sm-5 col-md-4 col-lg-2">
      <?php echo form_input([
        'id' => 'table-search-input',
        'name' => 'query',
        'placeholder' => 'Masukkan nama/kategori',
        'class' => 'form-control'
      ]) ?>
    </div>
    <div class="col-auto">
      <?php echo form_button([
        'class' => 'btn btn-primary',
        'type' => 'submit'
      ], 'Cari') ?>
    </div>
  </div>
  <?php echo form_close() ?>
</div>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Foto Talent</th>
      <th>Kategori</th>
      <th>Skill</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $item) : ?>
      <tr>
        <td><?php echo $item->name ?></td>
        <td class="text-center">
          <img src="https://picsum.photos/id/<?php echo $item->id ?>/100/100" class="img-thumbnail">
        </td>
        <td><?php echo arr_map_badge($item->categories) ?></td>
        <td><?php echo str_map_badge($item->skills) ?></td>
        <td>
          <a href="<?php echo base_url('/talent/about/').$item->id ?>" class="btn btn-sm btn-info">Detail</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php echo $links ?>
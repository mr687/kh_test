<h1>Talent Registration</h1>

<!-- Start registration form -->
<div id="talent-registration" class="card card-body">
  <?php echo form_open_multipart('/talent/register') ?>
  <div class="row">
    <div class="col-12 col-md-6 mb-3">
      <div class="form-group">
        <?php echo form_label('Nama Lengkap', 'name', ['class' => 'mb-2']) ?>
        <?php echo form_input([
          'id' => 'name',
          'name' => 'name',
          'placeholder' => 'Nama Lengkap',
          'class' => 'form-control',
          'required' => ''
        ], set_value('name')) ?>
        <?php echo form_error('name', '<div class="text-danger small">', '</div>') ?>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3">
      <div class="form-group">
        <?php echo form_label('Alamat Email', 'email', ['class' => 'mb-2']) ?>
        <?php echo form_input([
          'id' => 'email',
          'name' => 'email',
          'placeholder' => 'contoh@gmail.com',
          'class' => 'form-control',
          'required' => ''
        ], set_value('email')) ?>
        <?php echo form_error('email', '<div class="text-danger small">', '</div>') ?>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 mb-3">
      <div class="form-group">
        <?php echo form_label('No. Telepon', 'phone_number', ['class' => 'mb-2']) ?>
        <?php echo form_input([
          'id' => 'phone_number',
          'name' => 'phone_number',
          'placeholder' => '08xxxxx',
          'class' => 'form-control',
          'required' => ''
        ], set_value('phone_number')) ?>
        <?php echo form_error('phone_number', '<div class="text-danger small">', '</div>') ?>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 mb-3">
      <div class="form-group">
        <?php echo form_label('Jenis Kelamin', 'gender', ['class' => 'mb-2']) ?>
        <?php echo form_dropdown('gender', [
          '' => '-- Pilih jenis kelamin',
          'female' => 'Perempuan',
          'male' => 'Laki-Laki'
        ], set_value('gender'), ['class' => 'form-select', 'id' => 'gender']) ?>
        <?php echo form_error('gender', '<div class="text-danger small">', '</div>') ?>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 mb-3">
      <div class="form-group">
        <?php echo form_label('Umur (Tahun)', 'age', ['class' => 'mb-2']) ?>
        <?php echo form_input([
          'id' => 'age',
          'name' => 'age',
          'type' => 'number',
          'min' => 0,
          'placeholder' => '25',
          'class' => 'form-control',
          'required' => ''
        ], set_value('age')) ?>
        <?php echo form_error('age', '<div class="text-danger small">', '</div>') ?>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 mb-3">
      <div class="form-group">
        <?php echo form_label('Lokasi', 'location', ['class' => 'mb-2']) ?>
        <?php echo form_input([
          'id' => 'location',
          'name' => 'location',
          'placeholder' => 'Kota, Provinsi',
          'class' => 'form-control',
          'required' => ''
        ], set_value('location')) ?>
        <?php echo form_error('location', '<div class="text-danger small">', '</div>') ?>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 mb-3">
      <div class="form-group">
        <?php $this->kategori->call_select_multi() ?>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 mb-3">
      <div class="form-group">
        <?php echo form_label('Skill', 'skills[]', ['class' => 'mb-2']) ?>
        <?php echo form_multiselect('skills[]', [], [], [
          'class' => 'form-control use-select2-tags',
          'id' => 'skills[]',
          'data-placeholder' => 'Pisahkan dengan koma (,)'
        ]) ?>
      </div>
    </div>
    <div class="col-12">
      <div class="form-group mb-3">
        <?php echo form_label('Ceritakan Dirimu', 'aboutme', ['class' => 'mb-2']) ?>
        <?php echo form_textarea([
          'id' => 'aboutme',
          'name' => 'aboutme',
          'placeholder' => 'Ceritakan dirimu',
          'class' => 'form-control',
          'cols' => 0,
          'rows' => 0,
          'required' => ''
        ], set_value('aboutme')) ?>
        <?php echo form_error('aboutme', '<div class="text-danger small">', '</div>') ?>
      </div>
      <div class="form-group mb-3">
        <?php echo form_label('Upload Foto', 'photo', ['class' => 'mb-2']) ?>
        <?php echo form_upload([
          'id' => 'photo',
          'name' => 'photo',
          'class' => 'form-control',
          'required' => ''
        ]) ?>
        <?php echo form_error('photo', '<div class="text-danger small">', '</div>') ?>
      </div>
      <?php echo form_button([
        'type' => 'submit',
        'class' => 'btn btn-primary'
      ], 'Daftar') ?>
    </div>
  </div>
  <?php echo form_close() ?>
</div>
<!-- End registration form -->
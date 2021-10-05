<h1>Detail Talent</h1>

<div class="row mt-4">
  <div class="col-12 col-md-3">
    <div class="card card-body text-center">
      <img src="https://picsum.photos/id/<?php echo $talent->id ?>/100/100" class="img-thumbnail rounded-pill mb-3">
      <h5><?php echo $talent->name ?></h5>
      <div>
        <?php echo str_map_badge($talent->skills) ?>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-9">
    <div class="card card-body">
      <div class="mb-3">
        <h5>Umur</h5>
        <div><?php echo $talent->age ?> Tahun</div>
      </div>
      <div class="mb-3">
        <h5>Lokasi</h5>
        <div><?php echo $talent->location ?></div>
      </div>
      <div class="mb-3">
        <h5>Kategori</h5>
        <div><?php echo arr_map_badge($talent->categories) ?></div>
      </div>
      <div class="mb-3">
        <h5>Kontak</h5>
        <div>
          Email: <a href="mailto:<?php echo $talent->email ?>"><?php echo $talent->email ?></a> <br>
          Telepon: <a href="tel:<?php echo $talent->phone_number ?>"><?php echo $talent->phone_number ?></a>
        </div>
      </div>
      <div class="mb-3">
        <h5>Tentang</h5>
        <div><?php echo $talent->aboutme ?></div>
      </div>
    </div>
  </div>
</div>
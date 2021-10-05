<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- No Favicon -->
  <link rel="icon" href="data:;base64,iVBORw0KGgo=">
  <!-- Load bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- Load main css -->
  <link rel="stylesheet" href="/assets/main.css">
  <!-- Load select2 css -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url('assets/main.css') ?>">
  <title> <?php echo (@$title ?? 'Codeigniter 3') ?> </title>
</head>

<body>
  <?php echo @$nav ?>

  <div id="main" class="container">
    <?php echo @$body ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="/assets/main.js"></script>
  <script>
    $(document).ready(function() {
      if ($('.use-select2')) $('.use-select2').select2()
      if ($('.use-select2-tags')) $('.use-select2-tags').select2({
        tags: true,
        tokenSeparators: [',']
      })
    })
  </script>
</body>

</html>
<link href="<?= base_url()?>plantilla/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>plantilla/vendor/fonts//css/font-awesome.min.css" rel="stylesheet">
<script src="<?= base_url()?>plantilla/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url()?>plantilla/vendor/bootstrap/js/bootstrap.min.js"></script>
<link href="<?= base_url()?>plantilla/css/editor.css" type="text/css" rel="stylesheet"/>
<script src="<?= base_url()?>plantilla/js/editor.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div id="txtEditor">

          </div>
          <script type="text/javascript">
            $(document).ready( function() { 
              $("#txtEditor").Editor();
            });
          </script>﻿
          <?php
            echo form_open_multipart('article/insert');
            echo form_input_text ('nombre','Título del post');
            echo form_input_text ('descripcion','Introduce una descripción');
            echo form_input_textarea ('contenido','Ingresa el contenido');
            echo form_input_file('Selecciona una imagen');
            echo form_submit('Crear');
            echo form_close();
          ?>
        </div>
    </div>
</div>

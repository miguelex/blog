<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <a href='<?= base_url() ?>article/nuevo' class="btn btn-default">Crear Post</a>
          <hr>
        </div>
        <div class="col-lg-12">
          <h1>Tus posts</h1>
          <?php
          $content  = "<div class='table-responsive'>";
          $content .= "<table class='table table-hover table-bordered table-condensed'>";
          $content .=	"<thead>";
          $content .=	"<tr>";
          $content .= "<th style='text-align: center;'>Nombre del post</th>";
          $content .= "<th style='text-align: center;'>Editar</th>";
          $content .= "<th style='text-align: center;'>Eliminar</th>";
          $content .=	"</tr>";
          $content .=	"</thead>";
          $content .=	"<tbody>";
          $id = 0;
            foreach ($post->result_array() as $row) {
              $content .= "<tr id='tr$id'>";
              foreach ($row as $key => $value) {
                if ($key =="post") {
                  $content .= "<td style='text-align: center;'>" . $value . "</td>";
                  $content .= "<td style='text-align: center;'><button>Modificar</button></td>";
                  $content .= "<td style='text-align: center;'><button name='$value' id='$id'>Eliminar</button></td>";
                }

              }
              $content .= "</tr>";
              $id++;
            }
          $content .=	"</tbody>";
          $content .=	"</table>";
          $content .= "</div>";
          echo $content;
          ?>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("button").on("click", function (e) {
      var name = $(this).attr('name');
      console.log(name);
    });
  });
</script>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php
                foreach ($consulta->result() as $fila){
            ?>
                    <div class="post-preview">
                      <?php
                          $date = DateTime::createFromFormat("Y-m-d", $fila->fecha);
                          $year = $date->format("Y");
                          $name = str_replace(" ", "_", $fila->post)
                       ?>
                        <a href="<?= base_url()?>article/post/<?= $year ?>/<?= $name ?>">
                            <h2 class="post-title">
                                <?= $fila->post ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?= $fila->subtitulo ?>
                            </h3>
                        </a>
                        <p class="post-meta">Posted by <a href="#">Migue</a> on <?= $fila->fecha ?></p>
                    </div>
            <?php
                }
            ?>


            <!-- Pager -->
            <?php echo $pagination ?>
        </div>
    </div>
</div>

<hr>

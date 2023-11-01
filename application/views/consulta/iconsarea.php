<!-- Form horizontal -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Edição do Cliente</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <!-- <li><a data-action="reload"></a></li> -->
                <!-- <li><a data-action="close"></a></li> -->
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/editarExe" method="post" enctype="multipart/form-data">
            <fieldset class="content-group">
                <legend class="text-bold">icons:</legend> 


                <fieldset class="form-group" >
                    <legend>Temas</legend>
                    <?php $flag = 1; ?>
                    <table class="table table-hover">
                        <?php foreach ($awesome as $icon) { ?>
                            <?php
                            echo ($flag == 1 ? "<tr>" : '');
                            ?>
                            <td>
                                <div class="form-check" align="left">
                                    <label class="col-lg-8 control-label">
                                        <input type="radio" <?php //echo ($this->session->userdata('tema') == $tema ? 'checked' : '');   ?> class="form-check-input" name="optionTema" id="optionsRadios1" value="<?php echo $icon->fonte; ?>" >
                                        <?php echo $icon->fonte; ?> <i class = "<?php echo trim($icon->fonte); ?> fa-3x"></i>
                                    </label>
                                </div>
                            </td>
                            <?php
                            $flag++;
                            echo ($flag == 5 ? "</tr>" : '');
                            ($flag == 5 ? $flag = 1 : '');
                            ?>
                        <?php } ?>
                    </table>
                </fieldset>
            </fieldset>  
            <div class="text-right">
                <button type="submit" class="btn bg-teal">Editar <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </form>
    </div>
</div>

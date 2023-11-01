<!-- Column selectors -->
<div class="card-body col-lg-12">
    <!-- Card body table -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Gerar Callback</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!--<p class="mb-3">Example of a table placed inside <code>card body</code>. Such tables always have additional whitespace taken from <code>.card-body</code> element padding.</p>-->
            <form class="form-horizontal" action="<?php echo base_url() . $this->uri->segment(1); ?>/gerarcall" method="post" enctype="multipart/form-data">
                <fieldset class="content-group"><!-- comment -->
                    <div class="form-group row">
                        <label class="control-label col-sm-2">Status: <?php echo (isset($status) ? $status : ''); ?></label>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn bg-blue">Gerar <i class="icon-search4 ml-2"></i></button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>
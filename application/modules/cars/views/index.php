<div id="headerbar">

    <h1 class="headerbar-title"><?php _trans('clients'); ?></h1>

    <div class="headerbar-item pull-right">
        <button type="button" class="btn btn-default btn-sm submenu-toggle hidden-lg"
                data-toggle="collapse" data-target="#ip-submenu-collapse">
            <i class="fa fa-bars"></i> <?php _trans('submenu'); ?>
        </button>
        <a class="btn btn-primary btn-sm" href="<?php echo site_url('clients/form'); ?>">
            <i class="fa fa-plus"></i> <?php _trans('new'); ?>
        </a>
    </div>

    <div class="headerbar-item pull-right visible-lg">
        <?php echo pager(site_url('clients/view/' . $this->uri->segment(3)), 'mdl_cars'); ?>
    </div>

</div>

<div id="submenu">
    <div class="collapse clearfix" id="ip-submenu-collapse">

        <div class="submenu-row">
            <?php echo pager(site_url('cars/view/' . $this->uri->segment(3)), 'mdl_cars'); ?>
        </div>

    </div>
</div>

<div id="content" class="table-content">

    <?php $this->layout->load_view('layout/alerts'); ?>

    <div id="filter_results">
        <?php $this->layout->load_view('cars/partial_car_table'); ?>
    </div>

</div>

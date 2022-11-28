<?php $length = 0 ?>
	<div class="main_slider-wrapper">  
      <?php foreach ( self::$model->get_list() as $item ): $length++ ?>
        <div class="main_slide-item" style="background-image: url('<?= self::$model->get_image_attachment_filepath($item->image_attachment_id) ?>')">
            <div class="main_slide-body">
                <div class="main_slide-left">
                    <div class="main_slide-title"><h2><?= $item->title ?></h2></div>
                    <div class="main_slide-subtitle"><?= $item->subtitle ?></div>
                    <div class="main_slide-description"><?= $item->description ?></div>
                    <?php if ($item->link):?>
                        <a class="main_slide-btn btn" href="<?= $item->link ?>">Подробнее</a>
                    <?php endif;?>
                </div>
                <div class="main_slide-right">
                    <?php echo do_shortcode('[contact-form-7 id="61" title="Контактная форма 1"]'); ?>
                </div>
            </div>            
        </div>
	  <?php endforeach ?>
    </div>
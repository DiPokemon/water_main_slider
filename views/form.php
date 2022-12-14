<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = WATER_MAIN_SLIDER_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = WATER_MAIN_SLIDER_PLUGIN_ADMIN_URL . '&action=edit';


update_option(
	WATER_MAIN_SLIDER_PLUGIN_NAME.'_media_selector_attachment_id',
	absint( self::$model->image_attachment_id )
);

// Save attachment ID
if ( isset( $_POST['submit'] ) && isset( $_POST['data_image_attachment_id'] ) ) {
	update_option(
		WATER_MAIN_SLIDER_PLUGIN_NAME.'_media_selector_attachment_id',
		absint( $_POST['data_image_attachment_id'] )
	);
}

// Подключает все файлы необходимые для использования медиа API WordPress (окно загрузки и выбора файлов).
// Функция подключает скрипты, стили, настройки и шаблоны.
wp_enqueue_media();

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> слайд</h1>
	<a href="<?= WATER_MAIN_SLIDER_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$model->id ?>" >
		<?php endif ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="title">Заголовок</label>
					</th>
					<td>
						<input name="data_title" type="text" id="title" value="<?= self::$model->title ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="subtitle">Подзаголовок</label>
					</th>
					<td>
						<textarea name="data_subtitle" type="text" id="subtitle" class="regular-text"><?= self::$model->subtitle ?></textarea>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="description">Описание</label>
					</th>
					<td>
						<textarea name="data_description" type="text" id="description" class="regular-text"><?= self::$model->description ?></textarea>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="link">Ссылка</label>
					</th>
					<td>
						<input name="data_link" type="text" id="link" value="<?= self::$model->link ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="image_attachment_id">Фон</label>
					</th>
					<td>
						<div class='image-preview-wrapper'>
							<img id='image-preview' src='<?php echo self::$model->get_image_attachment_filepath( get_option( WATER_MAIN_SLIDER_PLUGIN_NAME.'_media_selector_attachment_id' ) ); ?>' height='100'>
						</div>
						<input id="upload_image_button" type="button" class="button" value="Выбрать изображение" />
						<input type='hidden' name='data_image_attachment_id' id='image_attachment_id' value='<?php echo get_option( WATER_MAIN_SLIDER_PLUGIN_NAME.'_media_selector_attachment_id' ); ?>'>
					</td>	
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>
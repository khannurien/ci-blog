					<?php echo validation_errors('
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<p>',
							'</p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					'); ?>

                    <?php echo form_open('drawers/edit/' . $drawers_item['drawer_id']); ?>
						<div class="form-row mb-2">
							<div class="col">
	                            <label class="sr-only" for="title">Title</label>
								<input class="form-control" type="input" name="title" value="<?php echo set_value('title', @$drawers_item['drawer_title']); ?>" />
							</div>
						</div>

						<div class="form-group">
                            <label class="sr-only" for="text">Content</label>
							<textarea class="form-control" rows="15" id="simplemde" name="text"><?php echo set_value('text', @$drawers_item['drawer_text']); ?></textarea>

							<div class="text-right mt-2">
                           		<input class="btn btn-primary float-right" type="submit" name="submit" value="Submit" />
							</div>
						</div>
                    </form>

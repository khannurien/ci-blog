				<div class="row">
					<div class="card-deck w-100">
						<div class="card mb-4">
							<div class="card-img-top post-featured-image"><img src="<?= $posts_item['post_image']; ?>" /></div>

							<div class="card-body">
								<h5 class="card-title"><?= $posts_item['post_title']; ?></h5>
								<div class="card-text"><?= $posts_item['post_text']; ?></div>
							</div>

							<div class="card-footer text-muted">
								<?php if ($this->session->prf_act === 'A'): ?>
									<div class="btn-group">
										<a class="btn btn-primary-outline" href="<?= base_url('posts/edit/' . $posts_item['post_slug'] . '/' . $posts_item['post_id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<a class="btn btn-primary-outline" href="<?= base_url('posts/delete/' . $posts_item['post_slug'] . '/' . $posts_item['post_id']) ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
									</div>
								<?php endif; ?>
								<small><?= timespan(human_to_unix($posts_item['post_date']), time(), 1) ?> ago</small>
								<small class="position-relative">by <a href="<?= base_url('profile/' . $posts_item['usr_nick']); ?>"><?= $posts_item['usr_nick']; ?></a> in <a href="<?= base_url('drawers/' . $posts_item['drawer_slug'] . '/' . $posts_item['drawer_id']); ?>"><?= $posts_item['drawer_title']; ?></a></small>
							</div>
						</div>
					</div>
				</div>

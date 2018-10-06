				<div class="row">
					<div class="card-deck w-100">
						<div class="card mb-4">
							<img class="card-img-top" src="<?= $posts_item['post_image']; ?>" alt="<?= $posts_item['post_title']; ?>" />

							<div class="card-body">
								<h5 class="card-title"><?= $posts_item['post_title']; ?></h5>
								<div class="card-text"><?= $posts_item['post_text']; ?></div>
							</div>

							<div class="card-footer text-muted">
								<?php if ($this->session->prf_act === 'A'): ?>
									<div class="btn-group">
										<a class="btn" href="<?= base_url('posts/edit/' . $posts_item['post_slug'] . '/' . $posts_item['post_id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<a class="btn" href="#" data-toggle="modal" data-target="#deleteConfirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
									</div>
								<?php endif; ?>
								<small><?= timespan(human_to_unix($posts_item['post_date']), time(), 1); ?> ago</small>
								<small class="position-relative">by <a href="<?= base_url('profile/' . $posts_item['usr_nick']); ?>"><?= $posts_item['usr_nick']; ?></a> in <a href="<?= base_url('drawers/' . $posts_item['drawer_slug'] . '/' . $posts_item['drawer_id']); ?>"><?= $posts_item['drawer_title']; ?></a></small>
							</div>

							<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deleteConfirmTitle">Delete post</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>You are about to delete this post: <i><?= $posts_item['post_title']; ?></i></p>
											<p>Are you sure about that?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<a class="btn btn-danger" href="<?= base_url('posts/delete/' . $posts_item['post_slug'] . '/' . $posts_item['post_id']) ?>">Sure!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

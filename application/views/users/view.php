				<?php 	// 1 <= $i => 5 allows Bootstrap breakpoints logic for card-deck
						// cf. https://stackoverflow.com/a/47410225/9568489
						$i = 1;
				?>

				<div class="row">
					<div class="card-deck w-100">
						<div class="card mb-4">
							<img class="card-img-top" src="<?= $users_item['prf_image']; ?>" alt="<?= $users_item['usr_nick']; ?>" />
							<div class="card-body">
								<h5 class="card-title"><?= $users_item['prf_username']; ?></h5>
								<div class="card-text">
										<small>&lt;<?= $users_item['prf_mail']; ?>&gt;</small>

										<blockquote class="mt-4 pl-4 text-muted">
											<?= $prf_bio; ?>
										</blockquote>
								</div>
							</div>

							<div class="card-footer text-muted">
								<?php if ($this->session->prf_act === 'A'): ?>
									<div class="btn-group">
										<a class="btn" href="<?= base_url('users/edit/' . $users_item['usr_id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<a class="btn" href="#" data-toggle="modal" data-target="#deleteUserConfirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
									</div>
								<?php endif; ?>
								<small>registered <?= timespan(human_to_unix($users_item['prf_date']), time(), 1); ?> ago</small>
							</div>

							<div class="modal fade" id="deleteUserConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteUserConfirmTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deleteUserConfirmTitle">Delete user</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>You are about to delete this user: <i><?= $users_item['usr_nick']; ?></i></p>
											<p>Are you sure about that?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<a class="btn btn-danger" href="<?= base_url('users/delete/' . $users_item['usr_id']) ?>">Sure!</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="w-100 d-none d-xl-none d-lg-none d-md-block d-sm-block"></div>

						<?php foreach($posts as $posts_item): ?>
						<div class="card mb-4">
							<a href="<?= base_url('/posts/view/' . $posts_item['post_slug'] . '/' . $posts_item['post_id']); ?>"></a>
							<img class="card-img-top" src="<?= base_url($this->config->item('upload_path') . $posts_item['post_image']); ?>" alt="<?= $posts_item['post_title']; ?>" />
							<div class="card-body">
								<h5 class="card-title"><?= $posts_item['post_title']; ?></h5>
								<div class="card-text"><?= word_limiter($posts_item['post_text'], 140); ?></div>
							</div>
							<div class="card-footer text-muted">
								<?php if ($this->session->prf_act === 'A'): ?>
									<div class="btn-group">
										<a class="btn" href="<?= base_url('posts/edit/' . $posts_item['post_id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<a class="btn" href="#" data-toggle="modal" data-target="#deletePostConfirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
									</div>
								<?php endif; ?>
								<small><?= timespan(human_to_unix($posts_item['post_date']), time(), 1); ?> ago</small>
								<small class="position-relative">by <a href="<?= base_url('profile/' . $posts_item['usr_nick']); ?>"><?= $posts_item['usr_nick']; ?></a> in <a href="<?= base_url('drawers/' . $posts_item['drawer_slug'] . '/' . $posts_item['drawer_id']); ?>"><?= $posts_item['drawer_title']; ?></a></small>
							</div>

							<div class="modal fade" id="deletePostConfirm" tabindex="-1" role="dialog" aria-labelledby="deletePostConfirmTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deletePostConfirmTitle">Delete post</h5>
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
											<a class="btn btn-danger" href="<?= base_url('posts/delete/' . $posts_item['post_id']) ?>">Sure!</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php if ($i === 1): ?>
							<div class="w-100 d-none d-sm-block d-md-block d-lg-block d-xl-block"></div>
						<?php endif; ?>

						<?php if ($i === 2): ?>
							<div class="w-100 d-none d-xl-none d-lg-none d-md-block d-sm-block"></div>
						<?php endif; ?>

						<?php if ($i === 3): ?>
							<div class="w-100 d-none d-sm-block d-md-block d-lg-block d-xl-block"></div>
						<?php endif; ?>

						<?php if ($i === 4): ?>
							<div class="w-100 d-none d-xl-none d-lg-none d-md-block d-sm-block"></div>
						<?php endif; ?>

						<?php if ($i === 5): ?>
							<div class="w-100 d-none d-sm-block d-md-block d-lg-block d-xl-block"></div>
						<?php endif; ?>

						<?php $i === 5? $i = 1 : $i++; ?>

						<?php endforeach; ?>
					</div>
				</div>

				<nav aria-label="Navigation">
					<?= $pagination; ?>
				</nav>

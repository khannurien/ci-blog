<!doctype html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('css/overrides.css'); ?>">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

		<link rel="icon" href="<?= base_url('css/favicon.ico'); ?>" />

		<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> 
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

		<title><?= $this->config->item('site_name'); ?> - <?= $title; ?></title>
    </head>

    <body>
		<div class="w-100">
		    <header class="page-header">
				<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
				    <a class="navbar-brand" href="<?= base_url(); ?>"><?= $this->config->item('site_name'); ?></a>
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				    </button>

				    <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						    <li class="nav-item active">
								<a class="nav-link" href="/drawers">Drawers</a>
						    </li>

						    <?php if($this->session->usr_nick): ?>
								<?php if($this->session->prf_act === 'A'): ?>
								    <li class="nav-item">
										<a class="nav-link" href="/posts/create">New post</a>
								    </li>
								<?php endif; ?>
								<li class="nav-item">
								    <a class="nav-link" href="/logout">Logout</a>
								</li>
						    <?php else: ?>
								<li class="nav-item">
								    <a class="nav-link" href="/login">Login</a>
								</li>
								<li class="nav-item">
								    <a class="nav-link" href="/register">Register</a>
								</li>
						    <?php endif; ?>

						</ul>
				    </div>
				</nav>
		    </header>
		</div>

		<div class="container">

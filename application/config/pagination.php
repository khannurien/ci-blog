<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * | Here begins custom configuration
 * |--------------------------------------------------------------------------
 * | Pagination Class
 * |--------------------------------------------------------------------------
 * */

$config['per_page'] = 5;
$config['use_page_numbers'] = TRUE;

$config['attributes'] = array('class' => 'page-link');

$config['full_tag_open'] 	= '<ul class="pagination justify-content-center">';
$config['full_tag_close'] 	= '</ul>';

$config['num_tag_open'] 	= '<li class="page-item">';
$config['num_tag_close'] 	= '</li>';

$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link" href="javascript:void(0)">';
$config['cur_tag_close'] 	= '</a> <span class="sr-only">(current)</span></li>';

$config['next_tag_open'] 	= '<li class="page-item">';
$config['next_tag_close'] 	= '</li>';

$config['prev_tag_open'] 	= '<li class="page-item">';
$config['prev_tag_close'] 	= '</li>';

$config['first_tag_open'] 	= '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_tag_open'] 	= '<li class="page-item">';
$config['last_tag_close'] 	= '</li>';

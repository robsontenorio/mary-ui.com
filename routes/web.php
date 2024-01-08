<?php

use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Volt::route('/', 'index');
Volt::route('/docs/installation', 'docs.installation');
Volt::route('/docs/layout', 'docs.layout');
Volt::route('/docs/demos', 'docs.demos');
Volt::route('/docs/customizing', 'docs.components.customizing');
Volt::route('/docs/upgrading', 'docs.components.upgrading');
Volt::route('/docs/contributing', 'docs.contributing');

// FORMS
Volt::route('/docs/components/form', 'docs.components.form');
Volt::route('/docs/components/input', 'docs.components.input');
Volt::route('/docs/components/radio', 'docs.components.radio');
Volt::route('/docs/components/select', 'docs.components.select');
Volt::route('/docs/components/toggle', 'docs.components.toggle');
Volt::route('/docs/components/checkbox', 'docs.components.checkbox');
Volt::route('/docs/components/choices', 'docs.components.choices');
Volt::route('/docs/components/tags', 'docs.components.tags');
Volt::route('/docs/components/datetime', 'docs.components.datetime');
Volt::route('/docs/components/textarea', 'docs.components.textarea');
Volt::route('/docs/components/file', 'docs.components.file');
Volt::route('/docs/components/image-library', 'docs.components.image-library');

// LIST DATA
Volt::route('/docs/components/list-item', 'docs.components.list-item');
// Route::get('/docs/components/table', fn () => view('livewire.docs.components.table'));
Volt::route('/docs/components/table', 'docs.components.table');

// MENU
Volt::route('/docs/components/dropdown', 'docs.components.dropdown');
Volt::route('/docs/components/menu', 'docs.components.menu');

// DIALOG
Volt::route('/docs/components/drawer', 'docs.components.drawer');
Volt::route('/docs/components/modal', 'docs.components.modal');
Volt::route('/docs/components/toast', 'docs.components.toast');

// UI
Volt::route('/docs/components/alert', 'docs.components.alert');
Volt::route('/docs/components/avatar', 'docs.components.avatar');
Volt::route('/docs/components/badges', 'docs.components.badges');
Volt::route('/docs/components/button', 'docs.components.button');
Volt::route('/docs/components/card', 'docs.components.card');
Volt::route('/docs/components/header', 'docs.components.header');
Volt::route('/docs/components/icon', 'docs.components.icon');
Volt::route('/docs/components/progress', 'docs.components.progress');
Volt::route('/docs/components/spotlight', 'docs.components.spotlight')->middleware('web');
Volt::route('/docs/components/statistic', 'docs.components.statistic');
Volt::route('/docs/components/timeline', 'docs.components.timeline');
Volt::route('/docs/components/tabs', 'docs.components.tabs');
Volt::route('/docs/components/theme-toggle', 'docs.components.theme-toggle');

// THIRD-PARTY
Volt::route('/docs/components/datepicker', 'docs.components.datepicker');
Volt::route('/docs/components/calendar', 'docs.components.calendar');
Volt::route('/docs/components/chart', 'docs.components.chart');
Volt::route('/docs/components/diff', 'docs.components.diff');

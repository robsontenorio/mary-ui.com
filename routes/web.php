<?php

Route::livewire('/', 'pages::index');
Route::livewire('/docs/installation', 'pages::docs.installation');
Route::livewire('/docs/layout', 'pages::docs.layout');
Route::livewire('/docs/sidebar', 'pages::docs.sidebar');
Route::livewire('/docs/demos', 'pages::docs.demos');
Route::livewire('/docs/customizing', 'pages::docs.components.customizing');
Route::livewire('/docs/upgrading', 'pages::docs.components.upgrading');
Route::livewire('/docs/contributing', 'pages::docs.contributing');

// FORMS
Route::livewire('/docs/components/form', 'pages::docs.components.form');
Route::livewire('/docs/components/input', 'pages::docs.components.input');
Route::livewire('/docs/components/radio', 'pages::docs.components.radio');
Route::livewire('/docs/components/group', 'pages::docs.components.group');
Route::livewire('/docs/components/select', 'pages::docs.components.select');
Route::livewire('/docs/components/toggle', 'pages::docs.components.toggle');
Route::livewire('/docs/components/checkbox', 'pages::docs.components.checkbox');
Route::livewire('/docs/components/choices', 'pages::docs.components.choices');
Route::livewire('/docs/components/colorpicker', 'pages::docs.components.colorpicker');
Route::livewire('/docs/components/tags', 'pages::docs.components.tags');
Route::livewire('/docs/components/datetime', 'pages::docs.components.datetime');
Route::livewire('/docs/components/textarea', 'pages::docs.components.textarea');
Route::livewire('/docs/components/range', 'pages::docs.components.range');
Route::livewire('/docs/components/file', 'pages::docs.components.file');
Route::livewire('/docs/components/image-library', 'pages::docs.components.image-library');

// LIST DATA
Route::livewire('/docs/components/list-item', 'pages::docs.components.list-item');
// Route::get('/docs/components/table', fn () => view('livewire.docs.components.table'));
Route::livewire('/docs/components/table', 'pages::docs.components.table');

// MENU
Route::livewire('/docs/components/dropdown', 'pages::docs.components.dropdown');
Route::livewire('/docs/components/menu', 'pages::docs.components.menu');

// DIALOG
Route::livewire('/docs/components/drawer', 'pages::docs.components.drawer');
Route::livewire('/docs/components/modal', 'pages::docs.components.modal');
Route::livewire('/docs/components/toast', 'pages::docs.components.toast');

// UI
Route::livewire('/docs/components/alert', 'pages::docs.components.alert');
Route::livewire('/docs/components/avatar', 'pages::docs.components.avatar');
Route::livewire('/docs/components/badges', 'pages::docs.components.badges');
Route::livewire('/docs/components/breadcrumbs', 'pages::docs.components.breadcrumbs');
Route::livewire('/docs/components/button', 'pages::docs.components.button');
Route::livewire('/docs/components/card', 'pages::docs.components.card');
Route::livewire('/docs/components/carousel', 'pages::docs.components.carousel');
Route::livewire('/docs/components/collapse', 'pages::docs.components.collapse');
Route::livewire('/docs/components/header', 'pages::docs.components.header');
Route::livewire('/docs/components/icon', 'pages::docs.components.icon');
Route::livewire('/docs/components/kbd', 'pages::docs.components.kbd');
Route::livewire('/docs/components/pin', 'pages::docs.components.pin');
Route::livewire('/docs/components/popover', 'pages::docs.components.popover');
Route::livewire('/docs/components/progress', 'pages::docs.components.progress');
Route::livewire('/docs/components/rating', 'pages::docs.components.rating');
Route::livewire('/docs/components/spotlight', 'pages::docs.components.spotlight');
Route::livewire('/docs/components/statistic', 'pages::docs.components.statistic');
Route::livewire('/docs/components/steps', 'pages::docs.components.steps');
Route::livewire('/docs/components/swap', 'pages::docs.components.swap');
Route::livewire('/docs/components/timeline', 'pages::docs.components.timeline');
Route::livewire('/docs/components/tabs', 'pages::docs.components.tabs');
Route::livewire('/docs/components/theme-toggle', 'pages::docs.components.theme-toggle');

// THIRD-PARTY
Route::livewire('/docs/components/datepicker', 'pages::docs.components.datepicker');
Route::livewire('/docs/components/calendar', 'pages::docs.components.calendar');
Route::livewire('/docs/components/chart', 'pages::docs.components.chart');
Route::livewire('/docs/components/code', 'pages::docs.components.code');
Route::livewire('/docs/components/diff', 'pages::docs.components.diff');
Route::livewire('/docs/components/editor', 'pages::docs.components.editor');
Route::livewire('/docs/components/image-gallery', 'pages::docs.components.image-gallery');
Route::livewire('/docs/components/markdown', 'pages::docs.components.markdown');
Route::livewire('/docs/components/signature', 'pages::docs.components.signature');

// BOOTCAMP
Route::livewire('/bootcamp/01', 'pages::bootcamp.01');
Route::livewire('/bootcamp/02', 'pages::bootcamp.02');
Route::livewire('/bootcamp/03', 'pages::bootcamp.03');
Route::livewire('/bootcamp/04', 'pages::bootcamp.04');
Route::livewire('/bootcamp/05', 'pages::bootcamp.05');
Route::livewire('/bootcamp/06', 'pages::bootcamp.06');
Route::livewire('/bootcamp/07', 'pages::bootcamp.07');

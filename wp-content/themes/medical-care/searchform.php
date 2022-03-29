<?php
/**
 * Template for displaying search forms in Medical Care
 *
 * @subpackage Medical Care
 * @since 1.0
 */
?>

<?php $medical_care_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<div class="search-field">
<input type="search"
 class="search-form"
placeholder="What are you looking for?"
 id="search-term"/>
 </div>
<div class="search-overlay">
 <div class="search-overlay__top">
 <div class="container">
 <div id="search-overlay__results">Search results go here</div>
 </div>
 </div>
</div>




<?php
  if( have_rows($linkColumn) ):
    while( have_rows($linkColumn) ): the_row();

      $linkColumn_categoryType = get_sub_field('linkColumn_categoryType');
      $linkColumn_links = 'linkColumn_links';

      $linkColumn_background = get_field($linkColumn_division . '_' . $linkColumn_categoryType['label'] . 'Links', 'option');
?>
  <div class="related-links related-links__block" style="background-image: url('<?php echo $linkColumn_background; ?>');">
    <header class="related-links related-links__header">
      <h3 class="related-links related-links__headline">
        Related<br />
        <span class="related-links related-links__headline--bigger">
          <?php
          // If the category is software, don't append an 's' to its label
          if( $linkColumn_categoryType['label'] == 'Software' ):
            echo $linkColumn_categoryType['label'];
          else:
            echo $linkColumn_categoryType['label'] . 's';
          endif;
          ?>
        </span>
      </h3>
    </header>
    <nav class="related-links related-links__nav">
      <?php if( have_rows( $linkColumn_links ) ): ?>
        <ul class="related-links related-links__list">
          <?php while( have_rows( $linkColumn_links ) ): the_row();

            $linkColumn_linksLabel = get_sub_field('linkColumn_linksLabel');
            $linkColumn_linksPage = get_sub_field('linkColumn_linksPage');

          ?>
            <li class="related-links related-links__item">
              <a class="related-links related-links__link" href="<?php echo $linkColumn_linksPage; ?>">
                <?php echo $linkColumn_linksLabel; ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </nav>
  </div>
<?php endwhile;
  endif; ?>
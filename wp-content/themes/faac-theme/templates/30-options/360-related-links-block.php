<?php
  if( have_rows($linkColumn) ):
    while( have_rows($linkColumn) ): the_row();

      $linkColumn_category = get_sub_field('linkColumn_category');
      $linkColumn_categoryType = get_sub_field('linkColumn_categoryType');
      $linkColumn_links = 'linkColumn_links';

      $linkColumn_background = get_field($linkColumn_category['value'] . $linkColumn_categoryType['label'] . '_listBackground', 'option');
?>
  <div class="related-links related-links__block" style="background-image: url('<?php echo $linkColumn_background['sizes']['w1540']; ?>');">
    <header class="related-links related-links__header">
      <h3 class="related-links related-links__headline">
        Related<br />
        <span class="related-links related-links__headline--bigger">
          <?php echo $linkColumn_categoryType['label'] . 's'; ?>
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

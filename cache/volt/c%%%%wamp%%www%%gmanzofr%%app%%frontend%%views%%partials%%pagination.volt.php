<div class="shop-control-bar-bottom">
        <p class="woocommerce-result-count"><?php $start = ($limit * ($page->current - 1)) + 1; ?>
                                                            <?php $end = ($limit * ($page->current - 1)) + $limit; ?>
                                                            <?php if ($end > $page->total_items) { ?>
                                                              <?php $end = $page->total_items; ?>
                                                            <?php } ?>

                                                            <?php if ($limit) { ?>
                                                              Showing <?= $start ?> - <?= $end ?> of <?= $page->total_items ?>
                                                            <?php } ?> results</p>
        <nav class="woocommerce-pagination">
            <ul class="page-numbers">
                <?php if ($page->current != 1) { ?>
                    <!--<li><a href="<?= \VoltHelpers\Helpers::paginationPath() ?>1" class="page-numbers">&laquo;</a></li>-->
                  <?php } ?>

                  <?php foreach (range(1, $page->total_pages) as $i) { ?>
                    <li><a <?php if ($i == $page->current) { ?>class="page-numbers current" href="#"<?php } ?> href="<?= \VoltHelpers\Helpers::paginationPath() ?><?= $i ?>"  class="page-numbers"><?= $i ?></a></li>
                  <?php } ?>

                  <?php if ($page->current != $page->last) { ?>
                    <!-- <li><a href="<?= \VoltHelpers\Helpers::paginationPath() ?><?= $page->last ?>" class="next page-numbers">&raquo;</a></li> -->
                  <?php } ?>
                <!--<li><span class="page-numbers current">1</span></li>
                <li><a href="#" class="page-numbers">2</a></li>
                <li><a href="#" class="next page-numbers">→</a></li>-->
            </ul>
        </nav>
    </div>

<div class="col-12 col-md-4 col-lg-3 mb-3">
    <div class="card">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $overview ?>
            </p>
            <?php if (isset($custom1)) { ?>
                <div>
                    <?= $custom1 ?>
                </div>
            <?php } ?>

            <div class="d-flex justify-content-between align-items-flex-start">
                <?php if (isset($custom2)) { ?>
                    <small>
                        <?= $custom2 ?>
                    </small>
                <?php } ?>

                <?php if (isset($custom3)) { ?>
                    <div style="width: 40px">
                        <img src="<?php echo $custom3 ?>" alt="language" class="w-100">
                    </div>
                <?php } ?>
            </div>
            <div class="d-flex justify-content-between ">
                <div>
                    Price: €
                    <?php echo $price ?>
                </div>
                <div>
                    In stock:
                    <?php echo $quantity ?>
                </div>
            </div>

        </div>
    </div>
</div>
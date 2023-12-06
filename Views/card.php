<div class="col-12 col-md-4 col-lg-3 mb-3">
    <div class="card">
        <?php if(isset($discount) && $discount !== 0) { ?>
            <div class="discount d-flex justify-content-center align-items-center fw-bold">
                -
                <?= $discount ?>%
            </div>
        <?php } ?>
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?php if(isset($error) && $error) { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>
            <?= $overview ?>
            <?php if(isset($custom1)) { ?>
                <div>
                    <?= $custom1 ?>
                </div>
            <?php } ?>

            <div class="d-flex justify-content-between align-items-flex-start">
                <?php if(isset($custom2)) { ?>
                    <small>
                        <?= $custom2 ?>
                    </small>
                <?php } ?>

                <?php if(isset($custom3)) { ?>
                    <div style="width: 40px">
                        <img src="<?php echo $custom3 ?>" alt="language" class="w-100">
                    </div>
                <?php } ?>

                <?php if(isset($flagError)) { ?>
                    <div class="alert alert-danger">
                        <?= $flagError ?>
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
            </p>


        </div>
    </div>
</div>
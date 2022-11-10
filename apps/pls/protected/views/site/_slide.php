<div class="swiper-slide">
    <div class="overlay"></div>
    <div class="content">
        <h3><?= $item->title;?></h3>
        <div class="row">
            <div class="col-md-12 bubble desc">
                <?= $item->description;?>
            </div>
        </div>
        <a href="<?= $item->link;?>" target="_blank" class="btn btn-primary">Continue Reading</a>
    </div>
</div>
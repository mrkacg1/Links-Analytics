<?php view('help.top') ?>
<section>
    <div class="container pt-5 pt-lg-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb px-0 breadcrumb-links">
                <li class="breadcrumb-item"><a href="<?php echo route('home') ?>"><?php ee('Home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo route('help') ?>"><?php ee('Help Center') ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo route('help.category', [$article->category]) ?>"><?php ee($category->title) ?></a></li>
            </ol>
        </nav>
        <div class="col px-0">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4"><?php echo $article->question ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="slice">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article>
                    <?php echo $article->answer ?>
                </article>
                <hr>
                <?php if(config('contact')): ?>
                    <h6 class="mb-4"><?php ee('Did not answer your question?') ?> </h6>
                    <div>
                        <a href="<?php echo route('contact') ?>" class="btn btn-sm btn-warning"><?php ee('Contact us') ?></a>
                    </div>
                <?php endif ?>
            </div>
            <div class="col-md-4">
                <h6><?php ee('Related Questions') ?></h6>
                <?php foreach($related as $article): ?>
                    <a href="<?php echo route('help.single', [$article->slug]) ?>" class="mb-2 d-block"><?php echo $article->question ?></a>
                <?php endforeach ?>

                <?php \Helpers\App::ads('helpsidebar') ?>
            </div>
        </div>
    </div>
</section>
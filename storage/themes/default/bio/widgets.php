<div class="modal fade" id="contentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title"><?php ee('Add Link or Content') ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modalcontent">
            <div class="collapse show" id="options">
                <h4 class="mb-3 fw-bold"><?php ee('Content') ?></h4>
                <div class="row" id="content-content">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-tagline" class="d-block text-decoration-none border rounded p-3 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-info-circle"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Tagline') ?></h5>
                                    <p class="text-muted"><?php ee('Add a tagline under your profile name') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-heading" class="d-block text-decoration-none border rounded p-3 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-heading"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Heading') ?></h5>
                                    <p class="text-muted"><?php ee('Add a heading with different sizes') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-text" class="d-block text-decoration-none border rounded p-3 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-align-center"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Text') ?></h5>
                                    <p class="text-muted"><?php ee('Add a text body to your page') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-divider" class="d-block text-decoration-none border rounded p-3 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-grip-lines"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Divider') ?></h5>
                                    <p class="text-muted"><?php ee('Separate your content with a line') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-links" class="d-block text-decoration-none border rounded p-3 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-link"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Links') ?></h5>
                                    <p class="text-muted"><?php ee('Add a trackable button to a link') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-html" class="d-block text-decoration-none border rounded p-3 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-code"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('HTML') ?></h5>
                                    <p class="text-muted"><?php ee('Add custom HTML code. Script codes are not accepted') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-image" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="image">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-image"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Image') ?></h5>
                                    <p class="text-muted"><?php ee('Upload an image') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-vcard" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-address-card"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('vCard') ?></h5>
                                    <p class="text-muted"><?php ee('Add a downloadable vCard') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-paypal" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/paypal.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('PayPal Button') ?></h5>
                                    <p class="text-muted"><?php ee('Generate a PayPal button to accept payments') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-whatsapp" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/whatsapp.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('WhatsApp Call') ?></h5>
                                    <p class="text-muted"><?php ee('Add button that will open whatsapp') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <h4 class="my-3 fw-bold"><?php ee('Widgets') ?></h4>
                <div class="row" id="content-widgets">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-rss" class="d-block text-decoration-none border rounded p-3 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-danger fa fa-rss"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('RSS Feed') ?></h5>
                                    <p class="text-muted"><?php ee('Add a dynamic RSS feed widget') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-newsletter" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-primary fa fa-envelope-open"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Newsletter') ?></h5>
                                    <p class="text-muted"><?php ee('Add a newsletter form to store emails') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-contact" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-success fa fa-envelope-square "></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Contact Form') ?></h5>
                                    <p class="text-muted"><?php ee('Add a contact form to receive emails') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-product" data-trigger="insertcontent" data-type="product"  class="d-block text-decoration-none border rounded py-3 px-2 h-100">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-warning fa fa-store"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Product') ?></h5>
                                    <p class="text-muted"><?php ee('Add a widget to a product on your site') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-youtube" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/youtube.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Youtube Video') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a Youtube video') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-spotify" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/spotify.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Spotify Embed') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a Spotify music widget') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-itunes" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/itunes.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Apple Music Embed') ?></h5>
                                    <p class="text-muted"><?php ee('Embed an Apple music widget') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-tiktok" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/tiktok.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('TikTok Embed') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a tiktok video') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-opensea" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/opensea.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('OpenSea NFT') ?></h5>
                                    <p class="text-muted"><?php ee('Embed your NFT from OpenSea') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-twitter" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/twitter.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Embed Tweets') ?></h5>
                                    <p class="text-muted"><?php ee('Embed your latest tweets') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-soundcloud" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/soundcloud.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('SoundCloud') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a SoundCloud track') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-facebook" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/facebook.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Facebook Post') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a Facebook post') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="#modal-instagram" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-bs-toggle="collapse" data-bs-parent="#modalcontent">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/instagram.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Instagram Post') ?></h5>
                                    <p class="text-muted"><?php ee('Embed an Instagram post') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="modal-text" class="collapse" data-name="<?php echo e('Text') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Text') ?></label>
                    <textarea class="form-control p-2" id="editor" name="content" placeholder="e.g. some description here"></textarea>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="text" class="btn btn-primary mt-3"><?php ee('Add Text') ?></button>
            </div>
            <div id="modal-links" class="collapse" data-name="<?php echo e('Links') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('FontAwesome Icon Class') ?></label>
                    <input type="text" class="form-control p-2" name="icon" placeholder="e.g. fab fa-twitter" autocomplete="off">
                    <p class="form-text"><?php ee('You can use any font from the following list:') ?> <a href="https://fontawesome.com/v5/cheatsheet/free/" target="_blank">FontAwesome</a>
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Text') ?></label>
                    <input type="text" class="form-control p-2" name="text" placeholder="e.g. My Site">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Link') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="https://" data-error="<?php ee('Please enter a valid link') ?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label class="form-label"><?php ee('Animation') ?></label>
                            <select name="animation" class="form-select p-2">
                                <option value="none" selected><?php ee('None') ?></option>
                                <option value="shake"><?php ee('Shake') ?></option>
                                <option value="scale"><?php ee('Scale') ?></option>
                                <option value="jello"><?php ee('Jello') ?></option>
                                <option value="vibrate"><?php ee('Vibrate') ?></option>
                                <option value="wobble"><?php ee('Wobble') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="link" class="btn btn-primary mt-3"><?php ee('Add Link') ?></button>
            </div>
            <div id="modal-image" class="collapse" data-name="<?php echo e('Image') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Image') ?></label>
                    <p><?php ee('Click the button add insert an Image then choose the file to upload') ?></p>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="image" class="btn btn-primary mt-3"><?php ee('Add Image') ?></button>
            </div>
            <div id="modal-youtube" class="collapse" data-name="<?php echo e('Youtube Video') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Link to Video') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://www.youtube.com/watch?v=dQw4w9WgXcQ" data-error="<?php ee('Please enter a valid youtube link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="youtube" class="btn btn-primary mt-3"><?php ee('Add Youtube Video') ?></button>
            </div>
            <div id="modal-whatsapp" class="collapse" data-name="<?php echo e('WhatsApp Call') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Phone Number') ?></label>
                    <input type="text" class="form-control p-2" name="phone" placeholder="e.g +1123456789">
                </div>
                <div class="form-group mt-2">
                    <label class="form-label"><?php ee('Label') ?></label>
                    <input type="text" class="form-control p-2" name="label" placeholder="e.g Call us">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="whatsapp" class="btn btn-primary mt-3"><?php ee('Add WhatsApp Call') ?></button>
            </div>
            <div id="modal-spotify" class="collapse" data-name="<?php echo e('Spotify Embed') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Link to Spotify Song') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://open.spotify.com/track/6PQ88X9TkUIAUIZJHW2upE?si=e8ab004e890a4d2f" data-error="<?php ee('Please enter a valid spotify link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="spotify" class="btn btn-primary mt-3"><?php ee('Add Spotify') ?></button>
            </div>
            <div id="modal-itunes" class="collapse" data-name="<?php echo e('Apple Music Embed') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Link to Apple Music Song') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://music.apple.com/us/album/acapulco-jay-robinson-remix-single/1590557278" data-error="<?php ee('Please enter a valid apple music link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="itunes" class="btn btn-primary mt-3"><?php ee('Add Apple Music') ?></button>
            </div>
            <div id="modal-paypal" class="collapse" data-name="<?php echo e('PayPal Button') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Label') ?></label>
                    <input type="text" class="form-control p-2" name="label" placeholder="e.g New Hoodie For Sale">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('PayPal Email') ?></label>
                    <input type="text" class="form-control p-2" name="email" placeholder="e.g myemail@domain.com">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Amount') ?></label>
                    <input type="text" class="form-control p-2" name="amount" placeholder="e.g 10">
                </div>
                <div class="form-group input-select mt-3">
                    <label class="form-label d-block mb-2"><?php ee('Currency') ?></label>
                    <select name="currency" data-toggle="select" class="form-control p-2">
                        <?php foreach(\Helpers\App::currency() as $code => $currency): ?>
                            <option value="<?php echo $code ?>" <?php echo $code == "USD" ? 'selected' : '' ?>><?php echo $currency['label'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="paypal" class="btn btn-primary mt-3"><?php ee('Add Paypal') ?></button>
            </div>
            <div id="modal-tiktok" class="collapse" data-name="<?php echo e('Tiktok Embed') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Link to Tiktok Video') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://www.tiktok.com/@marvel/video/7016405255604817157" data-error="<?php ee('Please enter a valid tiktok link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="tiktok" class="btn btn-primary mt-3"><?php ee('Add Tiktok') ?></button>
            </div>
            <div id="modal-heading" class="collapse" data-name="<?php echo e('Heading') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <select name="type" class="form-select p-2">
                    <option value="h1" selected>H1</option>
                    <option value="h2">H2</option>
                    <option value="h3">H3</option>
                    <option value="h4">H4</option>
                    <option value="h5">H5</option>
                    <option value="h6">H6</option>
                </select>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Text') ?></label>
                    <input type="text" class="form-control p-2" name="text" placeholder="e.g Heading">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Color') ?></label>
                    <p><input type="text" class="form-control p-2" name="color" placeholder="e.g Heading" data-trigger="color" data-default="#000000" value="#000000"></p>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="heading" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-divider" class="collapse" data-name="<?php echo e('Divider') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <select name="type" class="form-select p-2">
                        <option value="solid" selected><?php echo e('Solid') ?></option>
                        <option value="dotted"><?php echo e('Dotted') ?></option>
                        <option value="dashed"><?php echo e('Dashed') ?></option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Height') ?></label><br>
                    <select name="height" class="form-select p-2">
                        <option value="1" selected>1px</option>
                        <option value="2">2px</option>
                        <option value="4">4px</option>
                        <option value="6">6px</option>
                        <option value="8">8px</option>
                        <option value="10">10px</option>
                    </select>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="divider" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-rss" class="collapse" data-name="<?php echo e('RSS Feed') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <p><label class="form-label"><?php ee('RSS Feed') ?></label></p>
                    <input type="text" class="form-control p-2" name="link" id="link" value="" placeholder="e.g. https://mysite/rss" data-error="<?php ee('Please enter a valid link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="rss" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-vcard" class="collapse" data-name="<?php echo e('vCard') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Button Text') ?></label>
                    <input type="text" class="form-control p-2" name="button" placeholder="e.g. Download vCard">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('First Name') ?></label>
                    <input type="text" class="form-control p-2" name="fname" placeholder="e.g. John">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Last Name') ?></label>
                    <input type="text" class="form-control p-2" name="lname" placeholder="e.g. Smith">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Phone') ?></label>
                    <input type="text" class="form-control p-2" name="phone" placeholder="e.g. +123456789">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><?php ee('Cell') ?></label>
                    <input type="text" class="form-control p-2" name="cell" placeholder="e.g. +112345689">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><?php ee('Fax') ?></label>
                    <input type="text" class="form-control p-2" name="fax" placeholder="e.g. +112345689">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Email') ?></label>
                    <input type="text" class="form-control p-2" name="email" placeholder="e.g. john@domain.com">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Site') ?></label>
                    <input type="text" class="form-control p-2" name="site" placeholder="e.g. domain.com">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Address') ?></label>
                    <input type="text" class="form-control p-2" name="address" placeholder="e.g. 1 infinite loop">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('City') ?></label>
                    <input type="text" class="form-control p-2" name="city" placeholder="e.g. NY">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('State') ?></label>
                    <input type="text" class="form-control p-2" name="state" placeholder="e.g. New York">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Zip/Postal code') ?></label>
                    <input type="text" class="form-control p-2" name="zip" placeholder="e.g. 10001">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Country') ?></label>
                    <input type="text" class="form-control p-2" name="country" placeholder="e.g. Canada">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="vcard" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-product" class="collapse" data-name="<?php echo e('Product') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <p><?php ee('This widget allows you to add a custom product. Click the button add below to insert a the widget') ?></p>
                <button type="button" data-trigger="insertcontent" data-type="product" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-newsletter" class="collapse" data-name="<?php echo e('Newsletter') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Text') ?></label>
                    <input type="text" class="form-control p-2" name="text" placeholder="e.g. Subscribe">
                    <p class="form-text"><?php ee('Newsletter list can be downloaded on the Edit Bio page') ?></p>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="newsletter" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-contact" class="collapse" data-name="<?php echo e('Contact') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Text') ?></label>
                    <input type="text" class="form-control p-2" name="text" placeholder="e.g. Contact us">
                </div>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Email') ?></label>
                    <input type="email" class="form-control p-2" name="email" placeholder="e.g. email@domain.com">
                    <p class="form-text"><?php ee('You will receive emails here') ?></p>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="contact" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-html" class="collapse" data-name="HTML">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <label class="form-label">HTML</label>
                    <textarea class="form-control" name="code"></textarea>
                </div>
                <button type="button" data-trigger="insertcontent" data-type="html" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-opensea" class="collapse" data-name="<?php echo e('OpenSea NFT') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Link to a NFT on OpenSea') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://opensea.io/assets/ethereum/0x1301566b3cb584e550a02d09562041ddc4989b91/28" data-error="<?php ee('Please enter a valid opensea item link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="opensea" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-twitter" class="collapse" data-name="<?php echo e('Tweets Embed') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Link to Twitter Profile') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://twitter.com/elonmusk" data-error="<?php ee('Please enter a valid Twitter profile') ?>">
                </div>
                <div class="form-group mt-2">
                    <label class="form-label"><?php ee('Number of Tweets') ?></label>
                    <input type="number" class="form-control p-2" name="amount" placeholder="e.g 2" data-error="<?php ee('Please enter a valid number') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="twitter" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-soundcloud" class="collapse" data-name="<?php echo e('SoundCloud') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('SoundCloud Track Link') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://soundcloud.com/octobersveryown/drake-back-to-back-freestyle" data-error="<?php ee('Please enter a valid SoundCloud item link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="soundcloud" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-facebook" class="collapse" data-name="<?php echo e('Facebook Post') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Facebook Post') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://www.facebook.com/20531316728/posts/10154009990506729/" data-error="<?php ee('Please enter a valid facebook post link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="facebook" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-instagram" class="collapse" data-name="<?php echo e('Instagram Post') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group">
                    <label class="form-label"><?php ee('Instagram Post') ?></label>
                    <input type="text" class="form-control p-2" name="link" placeholder="e.g https://www.instagram.com/p/CZNNNy8p1mq/" data-error="<?php ee('Please enter a valid instagram post link') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="instagram" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
            <div id="modal-tagline" class="collapse" data-name="<?php echo e('Tagline') ?>">
                <a href="#options" data-bs-toggle="collapse" data-bs-parent="#modalcontent" class="mb-4 d-block"><i data-feather="chevron-left"></i> <?php ee('Back') ?></a>
                <div class="form-group mt-3">
                    <label class="form-label"><?php ee('Tagline') ?></label>
                    <input type="text" class="form-control p-2" name="text" placeholder="e.g Founder & CEO @apple" data-error="<?php ee('You can only add one tagline') ?>">
                </div>
                <button type="button" data-trigger="insertcontent" data-type="tagline" class="btn btn-primary mt-3"><?php ee('Add') ?></button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="removecard" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php ee('Are you sure you want to delete this?') ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><?php ee('You are trying to delete a block. Please changes only take effect when you update the bio page.') ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php ee('Cancel') ?></button>
        <a href="#" class="btn btn-danger" data-trigger="confirmremove"><?php ee('Confirm') ?></a>
      </div>
    </div>
  </div>
</div>
<form action="<?php echo route('bio.save') ?>" method="post" data-trigger="loading">
    <div class="d-flex mb-5">
        <h1 class="h4"><?php ee('Create Bio') ?></h1>
        <div class="ms-auto">
            <button type="submit" class="btn btn-primary"><?php ee('Publish') ?></button>
        </div>
    </div>
    <?php echo csrf() ?>
    <div class="row">
        <div class="col-md-8" id="generator">
            <div class="card card-body">
                <ul class="nav nav-pills overflow-x nav-fill">
                    <li class="nav-item mb-3 mb-sm-0">
                        <a href="#links" class="nav-link active" data-bs-toggle="collapse" data-bs-parent="#generator"><i data-feather="layout" class="me-2"></i> <span class="align-middle"><?php ee('Content') ?></span></a>
                    </li>
                    <li class="nav-item mb-3 mb-sm-0">
                        <a href="#social" class="nav-link" data-bs-toggle="collapse" data-bs-parent="#generator"><i data-feather="share" class="me-2"></i>  <span class="align-middle"><?php ee('Social Links') ?></span></a>
                    </li>
                    <li class="nav-item mb-3 mb-sm-0">
                        <a href="#appearance" class="nav-link" data-bs-toggle="collapse" data-bs-parent="#generator"><i data-feather="monitor" class="me-2"></i>  <span class="align-middle"><?php ee('Appearance') ?></span></a>
                    </li>
                    <li class="nav-item mb-3 mb-sm-0">
                        <a href="#advanced" class="nav-link" data-bs-toggle="collapse" data-bs-parent="#generator"><i data-feather="settings" class="me-2"></i>  <span class="align-middle"><?php ee('Settings') ?></span></a>
                    </li>
                </ul>
            </div>
            <div class="collapse show" id="links">
                <div class="card card-body">
                    <div class="d-flex">
                        <div class="ms-auto">
                            <span class="form-check form-switch">
                                <strong><label for="avatarenabled"><?php ee('Display Avatar') ?></label></strong>
                                <input class="form-check-input" type="checkbox" data-binary="true" id="avatarenabled" name="avatarenabled" value="1" checked>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="me-3 mb-2 position-relative" style="max-width:200px">
                                <img src="<?php echo user()->avatar()?>" class="rounded w-100" id="useravatar">
                                <div class="position-absolute top-0 end-0">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" data-trigger="uploadavatar"><i data-feather="upload-cloud"></i> <?php ee('Upload Avatar') ?></span></a>
                                            <input type="file" name="avatar" id="avatar" class="d-none" data-error="<?php ee('Avatar must be either a PNG or a JPEG (Max 500kb).') ?>">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label class="form-label"><?php ee('Bio Page Name') ?></label>
                                <input type="text" class="form-control p-2" name="name" id="biopage-name" placeholder="e.g. For Instagram" data-required>
                            </div>
                            <div class="form-group mt-4">
                                <label class="form-label"><?php ee('Bio Page Alias') ?></label>
                                <div class="d-flex">
                                    <div class="input-select rounded">
                                        <select name="domain" id="domain" class="form-control p-2" data-toggle="select">
                                            <?php foreach($domains as $domain): ?>
                                                <option value="<?php echo $domain ?>"><?php echo $domain ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <p class="form-text"><?php ee('Choose domain to generate the link with') ?></p>
                                    </div>
                                    <div class="ms-3">
                                        <input type="text" class="form-control" name="custom" placeholder="e.g. my-page">
                                        <p class="form-text"><?php ee('Leave this field empty to generate a random alias') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="linkcontent"></div>
                <div class="text-center mb-3">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#contentModal"><?php ee('Add Link or Content') ?></button>
                </div>
            </div>
            <div class="collapse" id="social">
                <h4 class="fw-bold mb-3"><?php ee('Social Links') ?></h4>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <select name="platform" class="form-select p-2">
                                    <option value="facebook"><?php ee('Facebook') ?></option>
                                    <option value="twitter"><?php ee('Twitter') ?></option>
                                    <option value="instagram"><?php ee('Instagram') ?></option>
                                    <option value="tiktok"><?php ee('Tiktok') ?></option>
                                    <option value="linkedin"><?php ee('Linkedin') ?></option>
                                    <option value="youtube"><?php ee('Youtube') ?></option>
                                    <option value="telegram"><?php ee('Telegram') ?></option>
                                    <option value="snapchat"><?php ee('Snapchat') ?></option>
                                    <option value="discord"><?php ee('Discord') ?></option>
                                    <option value="twitch"><?php ee('Twitch') ?></option>
                                    <option value="pinterest"><?php ee('Pinterest') ?></option>
                                    <option value="shopify"><?php ee('Shopify') ?></option>
                                    <option value="amazon"><?php ee('Amazon') ?></option>
                                    <option value="line"><?php ee('Line Messenger') ?></option>
                                </select>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control p-2" name="socialink" placeholder="https://">
                            </div>
                        </div>
                        <button type="button" data-trigger="addsocial" class="btn btn-primary mt-3" data-error="<?php ee('Please enter a valid link') ?>" data-error-alt="<?php ee('You have already added a link to this platform') ?>"><?php ee('Add') ?></button>
                    </div>
                </div>
                <div class="card card-body d-none" id="sociallinksholder"></div>

                <h4 class="fw-bold mb-3 mt-5"><?php ee('Settings') ?></h4>
                <div class="card card-body">
                    <div class="form-group">
                        <label class="form-label"><?php ee('Position') ?></label>
                        <select name="socialposition" class="form-select p-2">
                            <option value="off"><?php ee('Off') ?></option>
                            <option value="top" selected><?php ee('Top') ?></option>
                            <option value="bottom"><?php ee('Bottom') ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="collapse" id="appearance">
                <h4 class="fw-bold mb-3"><?php ee('Templates') ?></h4>
				<div class="card card-body">
                    <input type="hidden" name="theme">
                    <div class="row mt-3">
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3 biobg_iso" style="height:100px;" data-trigger="customtheme" data-theme="biobg_iso" onclick="customTheme('biobg_iso', '#252731', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#252731;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3 biobg_paper" style="height:100px;" data-trigger="customtheme" data-theme="biobg_paper" onclick="customTheme('biobg_paper', '#e6b800', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#e6b800;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3 biobg_pattern" style="height:100px;" data-trigger="customtheme" data-theme="biobg_pattern" onclick="customTheme('biobg_pattern', '#00E692', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#00E692;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3 biobg_coil" style="height:100px;" data-trigger="customtheme" data-theme="biobg_coil" onclick="customTheme('biobg_coil', '#f42a8b', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#f42a8b;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background: linear-gradient(-45deg, #000851 0%, #1CB5E0 100%);" data-trigger="changetheme" onclick="changeTheme('#1CB5E0', '#1CB5E0', '#000851', '#000851', '#ffffff', '#ffffff');">
                                <p class="d-block" style="color:#fff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#000851;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background: linear-gradient(-45deg, #FC466B 0%, #3F5EFB 100%);" data-trigger="changetheme" onclick="changeTheme('#FC466B', '#3F5EFB', '#FC466B', '#ffffff', '#FC466B', '#ffffff');">
                                <p class="d-block" style="color:#fff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#fff;width:100%;height:30px;color:#FC466B"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background: linear-gradient(-45deg, #FDBB2D 0%, #22C1C3 100%);" data-trigger="changetheme" onclick="changeTheme('#FDBB2D', '#22C1C3', '#FDBB2D', '#ffffff', '#FDBB2D', '#ffffff');">
                                <p class="d-block" style="color:#fff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#fff;width:100%;height:30px;color:#FDBB2D"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background: linear-gradient(-45deg, #00c6ff 0%, #0072ff 100%);" data-trigger="changetheme" onclick="changeTheme('#00c6ff', '#0072ff', '#00c6ff', '#ffffff', '#00c6ff', '#ffffff');">
                                <p class="d-block" style="color:#fff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#fff;width:100%;height:30px;color:#00c6ff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background: linear-gradient(-45deg, #d53369 0%, #daae51 100%);" data-trigger="changetheme" onclick="changeTheme('#d53369', '#daae51', '#d53369', '#ffffff', '#d53369', '#ffffff');">
                                <p class="d-block" style="color:#fff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#fff;width:100%;height:30px;color:#d53369"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background: linear-gradient(-45deg, #ED4264 0%, #FFEDBC 100%);" data-trigger="changetheme" onclick="changeTheme('#ED4264', '#FFEDBC', '#ED4264', '#ffffff', '#ED4264', '#ffffff');">
                                <p class="d-block" style="color:#fff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#fff;width:100%;height:30px;color:#ED4264"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background: linear-gradient(-45deg, #232526 0%, #414345 100%);" data-trigger="changetheme" onclick="changeTheme('#232526', '#414345', '#232526', '#ffffff', '#232526', '#ffffff');">
                                <p class="d-block" style="color:#fff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#fff;width:100%;height:30px;color:#232526"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background:#1e2028" data-trigger="changetheme" onclick="changeTheme('#1e2028', '#1e2028', '#1e2028', '#252731', '#ffffff', '#ffffff');">
                                <p class="d-block" style="color:#ffffff">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#252731;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background:#fff" data-trigger="changetheme" onclick="changeTheme('#ffffff', '#ffffff', '#ffffff', '#76b852', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#76b852;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background:#fff" data-trigger="changetheme" onclick="changeTheme('#ffffff', '#ffffff', '#ffffff', '#f71e3e', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#f71e3e;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background:#fff" data-trigger="changetheme" onclick="changeTheme('#ffffff', '#ffffff', '#ffffff', '#1CB5E0', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#1CB5E0;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mb-2">
                            <div role="button" class="d-block text-center border rounded p-3" style="height:100px;background:#fff" data-trigger="changetheme" onclick="changeTheme('#ffffff', '#ffffff', '#ffffff', '#c7ae0a', '#ffffff', '#000000');">
                                <p class="d-block" style="color:#000000">Hello</p>
                                <a href="#" class="rounded-pill d-block pt-1 text-decoration-none" style="background:#c7ae0a;width:100%;height:30px;color:#fff"><?php ee('Link') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="fw-bold mb-3 mt-5"><?php ee('Fonts') ?></h4>
                <div class="card card-body">
                    <div class="input-group">
                        <div class="input-group-text bg-white"><i class="fa fa-font"></i></div>
                        <input type="text" class="form-control border-start-0 ps-0" name="fonts" id="fonts" autocomplete="off">
                    </div>
                    <h5 class="mt-4"><?php ee('Text Color') ?></h5>
                    <div class="form-group mb-4">
                        <input type="text" name="textcolor" id="textcolor" value="#000">
                    </div>
                </div>
                <h4 class="fw-bold mb-3 mt-5"><?php ee('Custom Background') ?></h4>
                <div class="card card-body" id="background">
                    <h5><?php ee('Background') ?></h5>
                    <div class="mb-3 mt-3">
                        <div class="btn-group">
                            <a href="#singlecolor" class="btn btn-primary btn-sm text-white" data-bs-toggle="collapse" data-bs-parent="#background" data-trigger="bgtype"><?php ee('Single Color') ?></a>
                            <a href="#gradient" class="btn btn-primary btn-sm text-white" data-bs-toggle="collapse" data-bs-parent="#background" data-trigger="bgtype"><?php ee('Gradient Color') ?></a>
                            <a href="#image" class="btn btn-primary btn-sm text-white" data-bs-toggle="collapse" data-bs-parent="#background" data-trigger="bgtype"><?php ee('Image') ?></a>
                        </div>
                    </div>
                    <input type="hidden" name="mode" value="singlecolor">
                    <div id="singlecolor" class="collapse show">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="bg"><?php ee("Background") ?></label><br>
                                    <input type="text" name="bg" id="bg" value="#ffffff">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gradient" class="collapse">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="bgst"><?php ee("Gradient Start") ?></label><br>
                                    <input type="text" name="gradient[start]" id="bgst" value="#ffffff">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="bgsp"><?php ee("Gradient Stop") ?></label><br>
                                    <input type="text" name="gradient[stop]" id="bgsp" value="#ffffff">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="image" class="collapse">
                        <input type="file" class="form-control mb-4" name="bgimage" id="bgimage" data-error="<?php ee('Please choose a valid background image. JPG, PNG or SVG') ?>">
                    </div>
                </div>
                <h4 class="fw-bold mb-3 mt-5"><?php ee('Buttons') ?></h4>
                <div class="card card-body">
                    <h5><?php ee('Button Color') ?></h5>
                    <div class="form-group mb-4">
                        <input type="text" name="buttoncolor" id="buttoncolor" value="#ffffff">
                    </div>
                    <h5><?php ee('Button Text Color') ?></h5>
                    <div class="form-group mb-4">
                        <input type="text" name="buttontextcolor" id="buttontextcolor" value="#ffffff">
                    </div>
                    <h5><?php ee('Button Style') ?></h5>
                    <div class="form-group">
                        <select name="buttonstyle" id="buttonstyle" class="form-select p-2">
                            <option value="rectangular" selected><?php ee('Rectangular') ?></option>
                            <option value="rounded"><?php ee('Rounded') ?></option>
                            <option value="trec"><?php ee('Transparent') ?> <?php ee('Rectangular') ?></option>
                            <option value="tro"><?php ee('Transparent') ?> <?php ee('Rounded') ?></option>
                        </select>
                    </div>
				</div>
			</div>
            <div class="collapse" id="advanced">
                <h4 class="fw-bold mb-3"><?php ee('SEO') ?></h4>
                <div class="card card-body">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label"><?php ee('Meta Title') ?></label>
                        <input type="text" class="form-control" name="title" id="title" autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label"><?php ee('Meta Description') ?></label>
                        <textarea class="form-control" name="description" id="description" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label"><?php ee('Meta Image') ?></label>
                        <input type="file" class="form-control" name="metaimage" id="metaimage" autocomplete="off">
                    </div>
                </div>
                <h4 class="fw-bold mb-3"><?php ee('Settings') ?></h4>
                <div class="card card-body">
                    <div class="form-group">
                        <div class="d-flex">
                            <div>
                                <label class="form-check-label" for="sensitive"><?php ee('Sensitive Content') ?></label>
                                <p class="form-text"><?php ee('Sensitive content warns users before showing them the Bio Page') ?></p>
                            </div>
                            <div class="form-check form-switch ms-auto">
                                <input class="form-check-input" type="checkbox" data-binary="true" id="sensitive" name="sensitive" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex">
                            <div>
                                <label class="form-check-label" for="cookie"><?php ee('Cookie Popup') ?></label>
                                <p class="form-text"><?php ee('Cookie popup allows users to review cookie collection terms') ?></p>
                            </div>
                            <div class="form-check form-switch ms-auto">
                                <input class="form-check-input" type="checkbox" data-binary="true" id="cookie" name="cookie" value="1" checked>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex">
                            <div>
                                <label class="form-check-label" for="share"><?php ee('Share Icon') ?></label>
                                <p class="form-text"><?php ee('Share icon allows users to quickly share the Bio Page') ?></p>
                            </div>
                            <div class="form-check form-switch ms-auto">
                                <input class="form-check-input" type="checkbox" data-binary="true" id="share" name="share" value="1" checked>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="pass" class="form-label"><?php ee('Password Protection') ?></label>
                        <p class="form-text"><?php ee('By adding a password, you can restrict the access') ?></p>
                        <div class="input-group">
                            <div class="input-group-text bg-white"><i data-feather="lock"></i></div>
                            <input type="text" class="form-control border-start-0 ps-0" name="pass" id="pass" placeholder="<?php echo e("Type your password here")?>" autocomplete="off">
                        </div>
                    </div>
                    <?php if(\Core\Auth::user()->has("pixels") !== false):?>
                    <div id="pixels" class="mt-4">
                        <label class="form-label"><?php echo e("Targeting Pixels")?></label>
                        <p class="form-text"><?php echo e('Add your targeting pixels below from the list. Please make sure to enable them in the pixels settings.')?></p>
                        <div class="input-group input-select rounded">
                            <span class="input-group-text bg-white"><i data-feather="filter"></i></span>
                            <select name="pixels[]" data-placeholder="Your Pixels" multiple data-toggle="select">
                                <?php foreach(\Core\Auth::user()->pixels() as $type => $pixels): ?>
                                    <optgroup label="<?php echo ucwords($type) ?>">
                                    <?php foreach($pixels as $pixel): ?>
                                        <option value="<?php echo $pixel->type ?>-<?php echo $pixel->id ?>"><?php echo $pixel->name ?></option>
                                    <?php endforeach ?>
                                    </optgroup>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
                <h4 class="fw-bold mb-3"><?php ee('Custom CSS') ?></h4>
                <div class="card card-body">
                    <div class="form-group">
                        <textarea class="form-control" name="customcss" id="customcss" rows="5" placeholder="e.g. .btn { display: block }"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="preview">
                <div class="card border border-5 border-rounded border-dark">
                    <div class="text-center" style="max-height:600px;overflow-y:scroll">
                        <img src="<?php echo user()->avatar() ?>" id="userimage" class="rounded-circle my-3 border" height="120" width="120">
                        <h3 id="bio-title"><span style="color:#000"></span></h3>
                        <div class="card-body">
                            <div id="social" class="text-center mt-2">
                            </div>
                            <div id="content" class="mt-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php view('bio.widgets') ?>
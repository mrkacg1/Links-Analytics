<?php
/**
 * =======================================================================================
 *                           GemFramework (c) GemPixel                                     
 * ---------------------------------------------------------------------------------------
 *  This software is packaged with an exclusive framework as such distribution
 *  or modification of this framework is not allowed before prior consent from
 *  GemPixel. If you find that this framework is packaged in a software not distributed 
 *  by GemPixel or authorized parties, you must not use this software and contact GemPixel
 *  at https://gempixel.com/contact to inform them of this misuse.
 * =======================================================================================
 *
 * @package GemPixel\Premium-URL-Shortener
 * @author GemPixel (https://gempixel.com) 
 * @license https://gempixel.com/licenses
 * @link https://gempixel.com  
 */

namespace Admin;

use Core\DB;
use Core\Request;
use Core\View;
use Core\Helper;
use Helpers\App;

class Settings {

    use \Traits\Payments;

    /**
     * Settings Store
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.0
     * @return void
     */
    public function index(){
        $timezones = App::timezone();
        
        View::set('title', e('Settings').' - Admin');

        \Helpers\CDN::load('simpleeditor');

        View::push("<script>
                        CKEDITOR.replace('news');
                    </script>", "custom")->toFooter();        

        return View::with('admin.settings.index', compact('timezones'))->extend('admin.layouts.main');
    }

    /**
     * Dynamic Settings
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.0
     * @param string $config
     * @return void
     */
    public function config(string $config){

        // if(!file_exists(View::$path."/admin/settings/{$config}.php")) stop(404);

        if($config == 'integrations' && request()->manifest){
            return \Core\File::contentDownload('SlackManifest.json', function(){
                echo \Helpers\Slack::manifest();
            });
        }

        View::set('title', ucfirst($config).' '.e('Settings').' - Admin');

        View::push(assets('frontend/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'), 'js')->toFooter();    

        $paypal = null;

        foreach($this->processor() as $id => $processor){
            if($id == "paypal") {
                $paypal = $processor;
            } else {
                $processors[$id] = $processor;
            }
        }
    
        return View::with('admin.settings.'.$config, compact('paypal', 'processors'))->extend('admin.layouts.main');
    }
    /**
     * Save Config
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.0
     * @param Request $request
     * @return void
     */
    public function store(Request $request){
        
        \Gem::addMiddleware('DemoProtect');
        
        if(!is_null($request->root_domain) && $request->root_domain == "0" && !$request->domain_names){
            return Helper::redirect()->back()->with('danger', 'You cannot disable the root domain shortening if you don\'t have a secondary domain enabled.');
        }

        if(!is_null($request->alias_length) && $request->alias_length < 2){
            return Helper::redirect()->back()->with('danger', 'Alias length must be minimum 2.');
        }

        $settings = $request->all();

        if($request->remove_logo){
            App::delete(appConfig('app.storage')['uploads']['path'].'/'.config('logo'));
            $settings->logo = '';
        }

        if($request->remove_favicon){
            App::delete(appConfig('app.storage')['uploads']['path'].'/'.config('favicon'));
            $settings->favicon = '';
        }

        if($image = $request->file('logo_path')){
            if(!$image->mimematch || !in_array($image->ext, ['jpg', 'png','gif','svg'])) return Helper::redirect()->back()->with('danger', e('The logo is not valid. Only a JPG, PNG, GIF and SVG are accepted.'));
            if(config('logo')) App::delete(appConfig('app.storage')['uploads']['path'].'/'.config('logo'));
            $request->move($image, appConfig('app.storage')['uploads']['path'], str_replace(' ', '-', $image->name));
            $settings->logo = str_replace(' ', '-', $image->name);
        }

        if($image = $request->file('favicon_path')){
            if(!$image->mimematch || !in_array($image->ext, ['ico', 'png'])) return Helper::redirect()->back()->with('danger', e('The favicon is not valid. Only a ICO or PNG are accepted.'));
            if(config('favicon')) App::delete(appConfig('app.storage')['uploads']['path'].'/'.config('favicon'));
            $request->move($image, appConfig('app.storage')['uploads']['path']);
            $settings->favicon = $image->name;
        }

        if(isset($request->cdn['enabled']) && $request->cdn['enabled']){
            if(
                empty($request->cdn['key']) ||
                empty($request->cdn['secret']) ||
                empty($request->cdn['region']) ||
                empty($request->cdn['bucket'])
            ) return Helper::redirect()->back()->with('danger', e('Complete all required CDN settings to enable it'));
        }

        foreach($settings as $key => $value){
            if($setting = DB::settings()->where('config', $key)->first()){
                $setting->var = is_array($value) ? json_encode($value) : trim($value);
                $setting->save();
            }
        }        

        foreach($this->processor() as $name => $processor){
            if(!$request->{$name} || !$request->{$name}['enabled'] || !$processor['save']) continue;
            call_user_func_array($processor['save'], [$request]);
        }

        return Helper::redirect()->back()->with('success', e('Settings have been updated.'));
    }
    /**
     * Verify License
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.0
     * @param \Core\Request $request
     * @return void
     */
    public function verify(Request $request){
    
        $key = clean($request->purchasecode);

        $response = \Core\Http::url("https://cdn.gempixel.com/validator/")
                            ->with('X-Authorization', 'TOKEN '.md5(url()))
                            ->body(['url' => url(), 'key' => $key])
                            ->post()
                            ->getBody();

        if(!$response || empty($response) || $response == "Failed"){
            
            return back()->with("danger", "This purchase code is not valid. It is either for another item or has been disabled."); 

        }elseif($response == "TooMany"){

            return back()->with("danger", "This purchase code is already used on another domain. If you need to reset it, please us your purchase code and domain to reset it.");

        }elseif($response == "Wrong.Item"){

            return back()->with("danger", "This purchase code is for another item. Please use a Premium URL Shortener extended license purchase code.");

        }elseif($response == "Wrong.License"){

            return back()->with("danger", "This purchase code is for a standard license. Please use a Premium URL Shortener extended license purchase code.");

        } else {
        
            $setting = DB::settings()->where('config', 'purchasecode')->first();
            $setting->var = $key;
            $setting->save();

            $this->seelfdb($response);
        }
    }
    /**
     * Sync Files with CDN
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @return void
     */
    public function cdnsync(Request $request){      
        
        if(!config('cdn') || !config('cdn')->enabled) return back()->with('danger', e('You need to enable and configure CDN before syncing files.')); 
        
        self::recursiveUpload(PUB.'/content');

        return back()->with('success', e('Files was synced with the selected CDN. Please verify to make sure everything it there.')); 
    }
    /**
     * Upload Recursively
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @param [type] $dir
     * @return void
     */
    private static function recursiveUpload($dir){

        $cdn = \Helpers\CDN::factory();

        foreach (new \RecursiveDirectoryIterator($dir) as $path){
            if(in_array($path->getFilename(), ['.', '..', 'index.php'])) continue;
            
            if($path->isDir()) {
                 self::recursiveUpload($path->getPathName());
            } else {
                $file = str_replace(PUB, '', $path->getPathName());
                $file = str_replace('\\', '/', $file);
                $file = str_replace(' ', '%20', $file);
                $cdn->upload(trim($file, '/'), $path->getPathName(), 'text/plain');
            }
        }
    }

    /**
     * Seelfdb:code
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.0
     * @return void
     */
    private function seelfdb($r){

        $q = str_replace("_PRE_", DBprefix, $r);
        $qs = explode("|", $q);

        foreach ($qs as $query) {
          if(!DB::raw_execute($query)){
            return Gem::trigger(500, 'Task failed.');
          }
        }
        
        return back()->with('success', base64_decode('RXh0ZW5kZWQgdmVyc2lvbiBoYXMgYmVlbiBzdWNjZXNzZnVsbHkgdW5sb2NrZWQuIFlvdSBtYXkgbm93IHVzZSBwYXltZW50IG1vZHVsZXMgYW5kIHN1YnNjcmlwdGlvbnMu'));
    }
}
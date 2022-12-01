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
use Core\View;
use Core\Request;
use Core\Helper;
Use Helpers\CDN;
use Models\User;
use Models\Url;

class Links {

    use \Traits\Links;

    /**
     * Links
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function index(Request $request){

        $query = Url::whereNull('qrid')->whereNull('profileid');

        if($request->q) {
            $q = clean($request->q);
            $query->whereAnyIs([
                ['url' => "%{$q}%"],
                ['custom' => "%{$q}%"],
                ['alias' => "%{$q}%"],
                ['meta_title' => "%{$q}%"],
            ], 'LIKE ');
        }

        if($request->date) {
            $date = clean($request->date);
            $query->whereRaw('DATE(date) < ?', Helper::dtime($date, 'Y-m-d'));
        }

        if($request->sort == "old") $query->orderByAsc('date');
        if($request->sort == "most") $query->orderByDesc('click');
        if($request->sort == "less") $query->orderByAsc('click');
        if(!$request->sort) $query->orderByDesc('date');

        $urls = $query->paginate(is_numeric($request->perpage) ? $request->perpage : 15);

        View::push(assets('frontend/libs/clipboard/dist/clipboard.min.js'), 'js')->toFooter();
        CDN::load('datetimepicker');

        View::set('title', e('Links'));

        return View::with('admin.links.index', compact('urls'))->extend('admin.layouts.main');
    }
    /**
     * Expired Link
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function expired(Request $request){

        $query = DB::url()->whereNull('qrid')->whereNull('profileid')->whereRaw("`expiry` < DATE(CURDATE()) AND `archived` = '0'");

        if($request->q) {
            $q = clean($request->q);
            $query->whereAnyIs([
                ['url' => "%{$q}%"],
                ['custom' => "%{$q}%"],
                ['alias' => "%{$q}%"],
                ['meta_title' => "%{$q}%"],
            ], 'LIKE ');
        }

        if($request->date) {
            $date = clean($request->date);
            $query->whereRaw('DATE(date) < ?', Helper::dtime($date, 'Y-m-d'));
        }

        if($request->sort == "old") $query->orderByAsc('date');
        if($request->sort == "most") $query->orderByDesc('click');
        if($request->sort == "less") $query->orderByAsc('click');
        if(!$request->sort) $query->orderByDesc('date');

        $urls = $query->paginate(is_numeric($request->perpage) ? $request->perpage : 15);

        View::push(assets('frontend/libs/clipboard/dist/clipboard.min.js'), 'js')->toFooter();
        CDN::load('datetimepicker');

        View::set('title', e('Expired Links'));

        return View::with('admin.links.index', compact('urls'))->extend('admin.layouts.main');
    }
    /**
     * Archived Links
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function archived(Request $request){

        $query = DB::url()->whereNull('qrid')->whereNull('profileid')->where('archived', '1');

        if($request->q) {
            $q = clean($request->q);
            $query->whereAnyIs([
                ['url' => "%{$q}%"],
                ['custom' => "%{$q}%"],
                ['alias' => "%{$q}%"],
                ['meta_title' => "%{$q}%"],
            ], 'LIKE ');
        }

        if($request->date) {
            $date = clean($request->date);
            $query->whereRaw('DATE(date) < ?', Helper::dtime($date, 'Y-m-d'));
        }

        if($request->sort == "old") $query->orderByAsc('date');
        if($request->sort == "most") $query->orderByDesc('click');
        if($request->sort == "less") $query->orderByAsc('click');
        if(!$request->sort) $query->orderByDesc('date');

        $urls = $query->paginate(is_numeric($request->perpage) ? $request->perpage : 15);

        View::push(assets('frontend/libs/clipboard/dist/clipboard.min.js'), 'js')->toFooter();
        CDN::load('datetimepicker');

        View::set('title', e('Archived Links'));
        return View::with('admin.links.index', compact('urls'))->extend('admin.layouts.main');
    }
    /**
     * Pending Links
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param \Core\Request $request
     * @return void
     */
    public function pending(Request $request){

        $query = DB::url()->where('status', 0);

        if($request->q) {
            $q = clean($request->q);
            $query->whereAnyIs([
                ['url' => "%{$q}%"],
                ['custom' => "%{$q}%"],
                ['alias' => "%{$q}%"],
                ['meta_title' => "%{$q}%"],
            ], 'LIKE ');
        }

        if($request->date) {
            $date = clean($request->date);
            $query->whereRaw('DATE(date) < ?', Helper::dtime($date, 'Y-m-d'));
        }

        if($request->sort == "old") $query->orderByAsc('date');
        if($request->sort == "most") $query->orderByDesc('click');
        if($request->sort == "less") $query->orderByAsc('click');
        if(!$request->sort) $query->orderByDesc('date');

        $urls = $query->paginate(is_numeric($request->perpage) ? $request->perpage : 15);

        View::push(assets('frontend/libs/clipboard/dist/clipboard.min.js'), 'js')->toFooter();
        CDN::load('datetimepicker');

        View::set('title', e('Pending Links'));
        return View::with('admin.links.index', compact('urls'))->extend('admin.layouts.main');
    }
    /**
     * Anonymous
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.3.4
     * @param \Core\Request $request
     * @return void
     */
    public function anonymous(Request $request){

        $query = DB::url()->where('userid', 0);

        if($request->q) {
            $q = clean($request->q);
            $query->whereAnyIs([
                ['url' => "%{$q}%"],
                ['custom' => "%{$q}%"],
                ['alias' => "%{$q}%"],
                ['meta_title' => "%{$q}%"],
            ], 'LIKE ');
        }

        if($request->date) {
            $date = clean($request->date);
            $query->whereRaw('DATE(date) < ?', Helper::dtime($date, 'Y-m-d'));
        }

        if($request->sort == "old") $query->orderByAsc('date');
        if($request->sort == "most") $query->orderByDesc('click');
        if($request->sort == "less") $query->orderByAsc('click');
        if(!$request->sort) $query->orderByDesc('date');

        $urls = $query->paginate(is_numeric($request->perpage) ? $request->perpage : 15);

        View::push(assets('frontend/libs/clipboard/dist/clipboard.min.js'), 'js')->toFooter();
        CDN::load('datetimepicker');

        View::set('title', e('Anonymous Links'));
        return View::with('admin.links.index', compact('urls'))->extend('admin.layouts.main');
    }
    /**
     * Reported Links
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function report(){

        $reports = [];
        foreach(DB::reports()->orderByDesc('date')->paginate(15) as $report){

            if(!$report->bannedlink){
                $current = Helper::parseUrl($report->url, 'host');
                $current = trim($current, '/');

                $link = explode("?", $report->url);
                $action = explode("/", $link[0]);

                if("http://".$current == config("url") || "https://".$current == config("url")){
                    $url = DB::url()->whereRaw("(BINARY alias=:id OR BINARY custom=:id) AND (domain LIKE :domain OR domain IS NULL OR  domain = '')", [':id' => end($action), ':domain' => "%{$current}"])->first();
                }else{
                    $url = DB::url()->whereRaw("(BINARY alias=:id OR BINARY custom=:id) AND domain LIKE :domain", [':id' => end($action), ':domain' => "%{$current}"])->first();
                }

                $report->longurl = $url ? $url->url: e('Not found');
            } else {
                $report->longurl = $report->bannedlink;
            }

            $reports[] = $report;
        }

        View::set('title', e('Reported Links'));

        return View::with('admin.links.reports', compact('reports'))->extend('admin.layouts.main');
    }
    /**
     * Report Action
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.7
     * @param integer $id
     * @param string $action
     * @return void
     */
    public function reportAction(int $id, string $action){

        \Gem::addMiddleware('DemoProtect');

        if(!$report = DB::reports()->where('id', $id)->first()){
            return Helper::redirect()->back()->with('danger', e('Report not found.'));
        }

        if($action == 'delete'){
            $report->delete();
            return Helper::redirect()->back()->with('success', e('The report has been deleted.'));
        }

        $current = Helper::parseUrl($report->url, 'host');
        $current = trim($current, '/');

        $link = explode("?", $report->url);
        $end = explode("/", $link[0]);

        if("http://".$current == config("url") || "https://".$current == config("url")){
            $url = DB::url()->whereRaw("(BINARY alias=:id OR BINARY custom=:id) AND (domain LIKE :domain OR domain IS NULL OR  domain = '')", [':id' => end($end), ':domain' => "%{$current}"])->first();
        }else{
            $url = DB::url()->whereRaw("(BINARY alias=:id OR BINARY custom=:id) AND domain LIKE :domain", [':id' => end($end), ':domain' => "%{$current}"])->first();
        }

        if($action == 'banurl'){

            if(!$url) return Helper::redirect()->back()->with('danger', e('Long link not found in database.'));

            $report->status = '1';
            $cleanurl = trim(explode('#', $url->url)[0], '/');
            $report->bannedlink = $cleanurl;
            $report->save();
            return Helper::redirect()->back()->with('success', e('The link has been banned.'));
        }

        if($action == 'bandomain'){

            if($url){
                $host = Helper::parseUrl($url->url, 'host');
            } else {
                $host = Helper::parseUrl($report->bannedlink, 'host');
            }

            $domains = explode(",", config('domain_blacklist'));

            if(!in_array($host, $domains)) {
                $domains[] = $host;
            } else {
                return Helper::redirect()->back()->with('warning', e('The domain is already banned.'));
            }

            DB::reports()->where('id', $id)->update(["status" => "1", "bannedlink" => $host]);

            $setting = DB::settings()->where('config', 'domain_blacklist')->first();

            $setting->var = implode(',', $domains);
            $setting->save();
            $report->status = '2';
            $report->save();
            return Helper::redirect()->back()->with('success', e('The domain has been banned and added to blacklist in settings.'));
        }

        return Helper::redirect()->back()->with('danger', e('An unexpected error occurred. Please try again.'));
    }

    /**
     * Delete All
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @param \Core\Request $request
     * @return void
     */
    public function reportDeleteall(Request $request){
        $i = 0;
        
        if(!$ids = json_decode($request->selected, true)) return back()->with('danger', e('You need to select at least one report.'));

        foreach($ids as $id){
            if($report = DB::reports()->where('id', $id)->first()) {
                $report->delete();
                $i++;
            }
        }
        return back()->with('success', e('{i} reports were deleted successfully.', null, ['i' => $i]));
    }
    /**
     * Ban Links Manually
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.7
     * @param \Core\Request $request
     * @return void
     */
    public function reportAdd(Request $request){

        $i = 0;

        if($request->short){
            foreach(explode("\n", $request->short) as $link){

                if(!Helper::isURL(trim($link))) continue;

                if(DB::reports()->where('url', $link)->first()) continue;

                $current = Helper::parseUrl($link, 'host');
                $current = trim($current, '/');

                $plink = explode("?", $link);
                $end = explode("/", $plink[0]);

                if("http://".$current == config("url") || "https://".$current == config("url")){
                    $url = DB::url()->whereRaw("(BINARY alias=:id OR BINARY custom=:id) AND (domain LIKE :domain OR domain IS NULL OR  domain = '')", [':id' => end($end), ':domain' => "%{$current}"])->first();
                }else{
                    $url = DB::url()->whereRaw("(BINARY alias=:id OR BINARY custom=:id) AND domain LIKE :domain", [':id' => end($end), ':domain' => "%{$current}"])->first();
                }

                if(!$url) continue;

                $report = DB::reports()->create();
                $report->type = "Disabled by admin";
                $report->url = $link;
                $report->status = '1';
                $cleanurl = trim(explode('#', $url->url)[0], '/');
                $report->bannedlink = $cleanurl;
                $report->save();
                $i++;
            }
        }

        if($request->long){
            foreach(explode("\n", $request->long) as $link){

                if(!Helper::isURL(trim($link))) continue;

                $cleanurl = trim(explode('#', $link)[0], '/');

                if(DB::reports()->where('bannedlink', $cleanurl)->first()) continue;

                $report = DB::reports()->create();
                $report->url = "#na";
                $report->type = "Disabled by admin";
                $report->status = '1';
                $report->bannedlink = $cleanurl;
                $report->save();
                $i++;
            }
        }

        return Helper::redirect()->back()->with('success', e('{i} Links have been banned.', null, ['i' => $i]));
    }
    /**
     * Edit Link
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param integer $id
     * @return void
     */
    public function edit(int $id){

        \Gem::addMiddleware('DemoProtect');

        if(!$url = DB::url()->where('id', $id)->first()) return Helper::redirect()->back()->with('danger', e('Link does not exist.'));

        $locations = [];
		if($url->location && $url->location != "null"){
			foreach(json_decode($url->location, true) as $country => $location){
				if(is_array($location)){
					foreach($location as $city => $data){
						$locations[$country.'-'.$city] = $data;
					}
				} else {
					$locations[$country] = $location;
				}
			}
		}
        $url->languages = [];
		if($url->options && $url->options != "null"){
			$options = json_decode($url->options, true);
			if(isset($options['languages'])){
				$url->languages = $options['languages'];
			}
		}

		$url->devices = $url->devices && $url->devices != "null" ? json_decode($url->devices, true) : [];
		$url->parameters = $url->parameters && $url->parameters != "null" ? json_decode($url->parameters, true) : [];
		$url->pixels = $url->pixels && $url->pixels != "null" ? explode(',', $url->pixels) : [];

        View::set('title', e('Edit Link'));

        CDN::load('datetimepicker');

        return View::with('admin.links.edit', compact('url', 'locations'))->extend('admin.layouts.main');
    }
    /**
     * Update Link
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param \Core\Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id){
        \Gem::addMiddleware('DemoProtect');

        if(!$url = DB::url()->where('id', $id)->first()) return Helper::redirect()->back()->with('danger', e('URL does not exist.'));

        try{
            $this->updateLink($request, $url, \Core\Auth::user());
        } catch(\Exception $e){
            return Helper::redirect()->back()->with('danger', $e->getMessage());
        }

        return Helper::redirect()->back()->with('success', e('URL has been updated successfully'));
    }
    /**
     * Disable URL
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param integer $id
     * @return void
     */
    public function disable(int $id){

        \Gem::addMiddleware('DemoProtect');

        if(!$url = DB::url()->where('id', $id)->first()){
            return Helper::redirect()->back()->with('danger', e('Link not found. Please try again.'));
        }

        if(DB::reports()->where('url', $url->url)->first()) {
            return Helper::redirect()->back()->with('danger', e('Link is already banned.'));
        }

        $report = DB::reports()->create();
        $report->url = "#na";
        $report->type = "Disabled by admin";
        $report->email = "admin";
        $report->bannedlink = $url->url;
        $report->status = 1;
        $report->ip = null;
        $report->date = Helper::dtime();
        $report->save();

        return Helper::redirect()->to(route('admin.links.report'))->with('success', e('Link has been banned and has been added to the reported links list.'));
    }
     /**
     * Enable URL
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param integer $id
     * @return void
     */
    public function approve(int $id){
        if(!$url = DB::url()->where('id', $id)->first()){
            return Helper::redirect()->back()->with('danger', e('Link not found. Please try again.'));
        }

        $url->status = 1;
        $url->save();

        return Helper::redirect()->back()->with('success', e('Link has been approved.'));
    }
    /**
     * Delete URL
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param \Core\Request $request
     * @param integer $id
     * @param string $nonce
     * @return void
     */
    public function delete(Request $request, int $id, string $nonce){

        \Gem::addMiddleware('DemoProtect');

        if(!Helper::validateNonce($nonce, 'link.delete')){
            return Helper::redirect()->back()->with('danger', e('An unexpected error occurred. Please try again.'));
        }

        if(!$url = DB::url()->where('id', $id)->first()){
            return Helper::redirect()->back()->with('danger', e('Link not found. Please try again.'));
        }
        DB::stats()->where('urlid', $url->id)->deleteMany();

        $url->delete();
        return Helper::redirect()->back()->with('success', e('Link has been deleted.'));
    }
    /**
     * Delete Multiple Links
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param \Core\Request $request
     * @param integer $id
     * @param string $nonce
     * @return void
     */
    public function deleteAll(Request $request){

        \Gem::addMiddleware('DemoProtect');

        $ids = json_decode($request->selected);

        if(!$ids || empty($ids)) return Helper::redirect()->back()->with('danger', e('No link was selected. Please try again.'));

        foreach($ids as $id){
            DB::url()->where('id', $id)->deleteMany();
            DB::stats()->where('urlid', $id)->deleteMany();
        }

        return Helper::redirect()->back()->with('success', e('Selected Links have been deleted.'));
    }
    /**
     * Disable Selected
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.3.4
     * @param \Core\Request $request
     * @return void
     */
    public function disableAll(Request $request){

        \Gem::addMiddleware('DemoProtect');

        $ids = json_decode($request->selected);

        if(!$ids || empty($ids)) return Helper::redirect()->back()->with('danger', e('No link was selected. Please try again.'));

        foreach($ids as $id){
            if($url = DB::url()->first($id)){
                $url->status = 0;
                $url->save();
            }
        }

        return Helper::redirect()->back()->with('success', e('Selected Links have been disabled.'));
    }
    /**
     * Enable Selected
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.3.4
     * @param \Core\Request $request
     * @return void
     */
    public function enableAll(Request $request){

        \Gem::addMiddleware('DemoProtect');

        $ids = json_decode($request->selected);

        if(!$ids || empty($ids)) return Helper::redirect()->back()->with('danger', e('No link was selected. Please try again.'));

        foreach($ids as $id){
            if($url = DB::url()->first($id)){
                $url->status = 1;
                $url->save();
            }
        }

        return Helper::redirect()->back()->with('success', e('Selected Links have been enabled.'));
    }
    /**
     * Import Links
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function import(Request $request){

        if($request->isPost()){

            \Gem::addMiddleware('DemoProtect');

            if(!$file = $request->file('file')){
                return back()->with('danger', e('Incorrect format or empty file. Please upload .csv file.'));
            }

            if($file->ext != 'csv'){
                return back()->with('danger', e('Incorrect format or empty file. Please upload .csv file.'));
            }

            $content = array_map('str_getcsv', file($file->location));
            unset($content[0]);

            $i = 0;
            $error = null;
            foreach($content as $url){

                if(empty($url[0])) continue;

                $request->url = clean($url[0]);

                $request->custom = clean(empty($url[1]) || DB::url()->where('custom', $url[1])->first() ? $this->alias() : $url[1]);
                $request->metatitle = clean($url[2]);
                $request->metadescription = clean($url[3]);
                if($request->redirect != 'auto') $request->type = $request->redirect;
                $user = null;

                try{
                    if($request->user > 0){
                        $user = \Models\User::first($request->user);
                    }
                    $this->createLink($request, $user);
                    $i++;
                } catch(\Exception $e){
                    $error .= "<br>#".($i+1)." Failed: {$e->getMessage()}";
                    continue;
                }
            }

            if($error){
                return back()->with('warning', e('{num} links were successfully imported but some errors occurred:'.$error, null, ['num' => $i]));
            }

            return back()->with('success', e('{num} links were successfully imported.', null, ['num' => $i]));
        }

        View::set('title', e('Import Links'));

        $users = DB::user()->select('id')->select('email')->find();

        return View::with('admin.links.import', compact('users'))->extend('admin.layouts.main');
    }
    /**
     * View URL
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param integer $id
     * @return void
     */
    public function view(int $id){
        if(!$url = DB::url()->where('id', $id)->first()){
            return Helper::redirect()->to(route('admin.links'))->with('danger', e('Link not found. Please try again.'));
        }

        View::set('title', e('Link Details'));

        $user = [];

        if($url->userid > 0){
            $user = User::first($url->userid);
        }

        $locations = [];
		if($url->location && $url->location != "null"){
			foreach(json_decode($url->location, true) as $country => $location){
				if(is_array($location)){
					foreach($location as $city => $data){
						$locations[$country.'-'.$city] = $data;
					}
				} else {
					$locations[$country] = $location;
				}
			}
		}
        $url->languages = [];
		if($url->options && $url->options != "null"){
			$options = json_decode($url->options, true);
			if(isset($options['languages'])){
				$url->languages = $options['languages'];
			}
		}

		$url->devices = $url->devices && $url->devices != "null" ? json_decode($url->devices, true) : [];
		$url->parameters = $url->parameters && $url->parameters != "null" ? json_decode($url->parameters, true) : [];
		$url->pixels = $url->pixels && $url->pixels != "null" ? explode(',', $url->pixels) : [];

        return View::with('admin.links.view', compact('user', 'url', 'locations'))->extend('admin.layouts.main');
    }
}
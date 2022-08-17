<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;

class InstallController extends Controller
{
    public function index() {
        return view('install.index');
    }
    
    public function install(Request $request)
    {

        if ($request->isMethod('post')){

            $validator = Validator::make($request->all(), [
                'app_url' => ['required'],
                'database' => ['required'],
                'database_username' => ['required'],
                'email' => ['required'],
                'phone' => ['required'],
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                        ->withInput()
                        ->withErrors($validator);
            }
            
            $post = new Setting([
                'app_name' => $request->app_name,
                'app_url' => $request->app_url,
                'database' => $request->database,
                'database_username' => $request->database_username,
                'database_password' => $request->database_password,
                'email' => $request->email,
                'phone' => $request->phone,
           ]);
           
           $post->save();

            $settings = config("database.connections.mysql");
    
            config([
                'database' => [
                    'default' => 'mysql',
                    'migrations' => 'migrations',
                    'connections' => [
                        'mysql' => array_merge($settings, [
                            'driver' => 'mysql',
                            'host' => 'localhost',
                            'port' => 3306,
                            'database' => $request->input('database_name'),
                            'username' => $request->input('database_username'),
                            'password' => (string)$request->input('database_password'),
                        ]),
                    ],
                ],
            ]);


            $settingFile = "
APP_NAME = $request->app_name
APP_ENV=local
APP_KEY=base64:heQbcULUpWagmzPVHAPy0MhiN0NQo+SekRVmu2/oqxs=
APP_DEBUG=true
APP_URL=$request->app_url
LOG_CHANNEL=stack
                
TELESCOPE_ENABLED=true
TELESCOPE_NO_FILTER=true
                                
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE = $request->database
DB_USERNAME = $request->database_username
DB_PASSWORD = $request->database_password
                
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
                
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
                
MAIL_MAILER=sendmail
MAIL_HOST=
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=Atiyar

AWS_ACCESS_KEY_ID = 
AWS_SECRET_ACCESS_KEY = 
AWS_DEFAULT_REGION = 
AWS_BUCKET = 
AWS_URL = ";

            try {
                $settingFileString = "";
                $settingFileString .=  var_export($settingFile, true) ;
                file_put_contents(base_path() . '/.env', $settingFileString);
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors(__("Failed to create the config file"));
            }



            // Create cache files and generate the storage link
            Artisan::call("view:cache");

            if (function_exists('symlink')) {
                Artisan::call("storage:link");
            }
            
        }
        return view('install.index')->with('info', 'محصول نصب شد');
    }
    
}

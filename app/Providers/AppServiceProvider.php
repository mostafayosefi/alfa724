<?php

namespace App\Providers;

use App\Models\Role\Permission;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\Role\PermissionRole;
use Illuminate\Support\Facades\Blade;
use App\Models\Role\PermissionAccesse;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {




        Blade::if('admin', function ($base) {
$status = 'inactive';
$PermissionAccesse = PermissionAccesse::where([ ['link',$base], ])->first();
if($PermissionAccesse){
    $PermissionRole = PermissionRole::where([
        ['permission_accesse_id',$PermissionAccesse->id],
        ['role_id',auth()->user()->role_id],
         ])->first();
    $status = $PermissionRole->status;
}
                if((($status == 'active'))&& (auth()->user() ) && (auth()->user()->id)){
                    return 1;
                 }
                  return 0;
               });



Blade::if('permission', function ($base) {
$Permission = Permission::where([ ['link',$base], ])->first();
if($Permission){
    $count = PermissionRole::where([
        ['permission_id',$Permission->id],
        ['role_id',auth()->user()->role_id],
        ['status','active'],
         ])->count();
}

                if((($count != 0))&& (auth()->user() ) && (auth()->user()->id)){
                    return 1;
                 }
                  return 0;
               });

        Schema::defaultStringLength(191);
        Blade::component('breadcrumb-item', \App\View\Components\Dashboard\BreadcrumbItem::class);
        Blade::component('card', \App\View\Components\Dashboard\Card::class);
        Blade::component('card-header', \App\View\Components\Dashboard\CardHeader::class);
        Blade::component('card-body', \App\View\Components\Dashboard\CardBody::class);
        Blade::component('card-footer', \App\View\Components\Dashboard\CardFooter::class);
        Blade::component('alert', \App\View\Components\Dashboard\Alert::class);
        Blade::component('sidebar-item', \App\View\Components\Dashboard\SidebarItem::class);

        Blade::component('text-group', \App\View\Components\Form\TextGroup::class);
        Blade::component('select-group', \App\View\Components\Form\SelectGroup::class);
        Blade::component('select-item', \App\View\Components\Form\SelectItem::class);
        Blade::component('textarea-group', \App\View\Components\Form\TextareaGroup::class);
        Blade::component('file-group', \App\View\Components\Form\FileGroup::class);

        Builder::macro('whereLike', function ($attributes, $searchTerm) {
            /** @var Builder $this */
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    foreach (Arr::wrap($searchTerm) as $term)
                        $query->orWhere($attribute, 'LIKE', "%{$term}%");
                }
            });

            return $this;
        });

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Portal\Article\Reply;
use App\Observers\Portal\Article\ReplyObserver;
use App\Support\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 注册服务提供者
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 非 production 开发环境才注册以下服务
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        // 调试模式才注册以下服务
        if (config('app.debug')) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }

    }

    /**
     * 引导应用程序服务
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 注册观察者
        \App\Models\Portal\Article\Article::observe(\App\Observers\Portal\Article\ArticleObserver::class);
        // 注册发布评论的观察者
        Reply::observe(ReplyObserver::class);

        // 因为生命周期的原因，需要先判断菜单表是否存在，存在才能够从菜单中取值，否则当 menus 表不存在时，执行 artisan 命令会报错
        if (\Schema::hasTable('menus')) {
            // 向管理后台所有视图传递通用变量
            $adminInitParams = app(Response::class)->getAdminMeta();
            view()->composer('admin.layouts.*', function ($view) use ($adminInitParams) {
                $view->with($adminInitParams);
            });
        }

    }
}

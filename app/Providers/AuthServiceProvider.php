<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        // 固定写法  注册政策
        $this->registerPolicies($gate);
        
        // 定义权限
        $gate->define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
        
        //  这个before 方法在所有权限检查之前执行
        $gate->before(function ($user, $ability) {
//            exit('before check');
            if ($user->isSuperAdmin()) {
                return true;
            }
        });

        //
    }
}

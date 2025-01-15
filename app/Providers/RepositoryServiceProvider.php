<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\UserInterface;
// use App\Interfaces\OrderInterface;
// use App\Interfaces\CategoryInterface;
// use App\Interfaces\EventInterface;
// use App\Interfaces\DepartmentInterface;
use App\Interfaces\ProductInterface;
// use App\Repositories\ArticleRepositoryInterface;

use App\Repositories\UserRepository;
// use App\Repositories\OrderRepository;
// use App\Repositories\CategoryRepository;
// use App\Repositories\EventRepository;
// use App\Repositories\DepartmentRepository;
use App\Repositories\ProductRepository;
// use App\Repositories\ArticleRepository;

use App\Interfaces\ArticleRepositoryInterface;
use App\Repositories\ArticleRepository;

use App\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;

use App\Interfaces\PageContentRepositoryInterface;
use App\Repositories\PageContentRepository;

use App\Interfaces\SearchTaglineRepositoryInterface;
use App\Repositories\SearchTaglineRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(PageContentRepositoryInterface::class, PageContentRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(SearchTaglineRepositoryInterface::class, SearchTaglineRepository::class);

        $this->app->bind(UserInterface::class, UserRepository::class);
        // $this->app->bind(OrderInterface::class, OrderRepository::class);
        // $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        // $this->app->bind(EventInterface::class, EventRepository::class);
        // $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);

        // $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

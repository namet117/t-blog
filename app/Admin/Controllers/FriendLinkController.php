<?php

namespace App\Admin\Controllers;

use App\FriendLink;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class FriendLinkController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('友链管理')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FriendLink);

        $grid->name('名称');
        $grid->link('链接')->display(function ($link) {
            return "<a href=\"{$link}\" target=\"_blank\">{$link}</a>";
        });
        $grid->ordering('排序')->sortable();
        $grid->enabled('是否启用')->display(function ($enabled) {
            return $enabled ? '是' : '否';
        });
        $grid->updated_at('最后更新时间')->sortable();


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(FriendLink::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FriendLink);
        
        $form->text('name', '名称')->rules('required|max:20');
        $form->url('link', '链接')->rules('required');
        $form->number('ordering', '排序')->min(0);
        $form->switch('enabled', '是否启用')->default(true);

        return $form;
    }
}

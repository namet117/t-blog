<?php

namespace App\Admin\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use function foo\func;

class CommentController extends Controller
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
            ->header('评论管理')
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
            ->header('评论详情')
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
            ->header('编辑')
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
            ->header('新增')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment);

        $grid->id('Id');
        $grid->username('用户名');
        $grid->site('站点');
        $grid->email('邮箱');
        $grid->ip('Ip');
        $grid->content('内容');
        $grid->rank('楼层');
        $grid->notification('需通知');
        $grid->is_notified('已通知');
        $grid->created_at('创建时间');

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
        $show = new Show(Comment::findOrFail($id));
        // TODO 展示树形结构
        $show->id('Id');
        $show->username('Username');
        $show->site('Site');
        $show->email('Email');
        $show->ip('Ip');
        $show->reply_to('Reply to');
        $show->article_id('Article id');
        $show->original_md('Original md');
        $show->content('Content');
        $show->rank('Rank');
        $show->notification('需要通知');
        $show->is_notified('已通知');
        $show->created_at('Created at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Comment);

        $form->text('username', 'Username');
        $form->text('site', 'Site');
        $form->email('email', 'Email');
        $form->ip('ip', 'Ip');
        $form->number('reply_to', 'Reply to');
        $form->number('article_id', 'Article id');
        $form->textarea('original_md', 'Original md');
        $form->textarea('content', 'Content');
        $form->number('rank', 'Rank')->default(1);
        $form->switch('notification', 'Notification')->default(1);
        $form->switch('is_notified', 'Is notified');

        return $form;
    }
}

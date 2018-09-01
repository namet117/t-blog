<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ArticleController extends Controller
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
            ->header('文章管理')
            ->description('管理文章内容')
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
            ->header('文章详情')
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
            ->header('编辑文章')
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
            ->header('发布新文章')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->id('Id');
        $grid->title('Title');
        $grid->keywords('Keywords');
        $grid->abstract('Abstract');
        $grid->original_md('Original md');
        $grid->content('Content');
        $grid->tag_ids('Tag ids');
        $grid->slug('Slug');
        $grid->first_img('First img');
        $grid->view_times('View times');
        $grid->praise_times('Praise times');
        $grid->comment_times('Comment times');
        $grid->is_top('Is top');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->deleted_at('Deleted at');

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
        $show = new Show(Article::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->keywords('Keywords');
        $show->abstract('Abstract');
        $show->original_md('Original md');
        $show->content('Content');
        $show->tag_ids('Tag ids');
        $show->slug('Slug');
        $show->first_img('First img');
        $show->view_times('View times');
        $show->praise_times('Praise times');
        $show->comment_times('Comment times');
        $show->is_top('Is top');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->deleted_at('Deleted at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->text('title', 'Title');
        $form->text('keywords', 'Keywords');
        $form->textarea('abstract', 'Abstract');
        $form->textarea('original_md', 'Original md');
        $form->textarea('content', 'Content');
        $form->text('tag_ids', 'Tag ids');
        $form->text('slug', 'Slug');
        $form->text('first_img', 'First img');
        $form->number('view_times', 'View times');
        $form->number('praise_times', 'Praise times');
        $form->number('comment_times', 'Comment times');
        $form->switch('is_top', 'Is top');

        return $form;
    }
}

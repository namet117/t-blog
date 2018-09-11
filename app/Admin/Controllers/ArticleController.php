<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Tag;
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
     *
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
     *
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
     *
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
     *
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

        $grid->id('Id')->sortable();
        $grid->title('标题');
        $grid->keywords('关键字');
        $grid->tag_ids('标签')->display(function ($tag_ids) {
            $tag_ids = explode(',', substr($tag_ids, 1, - 1));
            $tags = Tag::whereIn('id', $tag_ids)->pluck('tag_name')->toArray();
            $html = '';
            foreach ($tags as $tag) {
                $html .= '<span class="badge">' . $tag . '</span>';
            }

            return $html;
        });
        $grid->slug('Slug');
        $grid->view_times('浏览数')->sortable();
        $grid->praise_times('赞数')->sortable();
        $grid->comment_times('评论数')->sortable();
        $grid->is_top('是否置顶')->sortable();
        $grid->updated_at('最后更新时间')->sortable();
        // 设置初始排序条件
        $grid->model()->orderBy('id', 'desc');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->id('Id');
        $show->title('标题');
        $show->keywords('关键字');
        $show->abstract('摘要');
        $show->original_md('原始MarkDown');
        $show->content('HTML内容');
        $show->tag_ids('标签');
        $show->slug('Slug');
        $show->first_img('首图');
        $show->view_times('浏览次数');
        $show->praise_times('赞次数');
        $show->comment_times('评论次数');
        $show->is_top('置顶');
        $show->created_at('创建时间');
        $show->updated_at('修改时间');
        $show->deleted_at('删除时间');

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
        $form->text('title', '标题')->rules('required|min:3');
        $form->text('keywords', '关键字')->rules('required|min:3');
        $form->checkbox('tag_ids', '标签')->options(
            Tag::all()->pluck('tag_name', 'id')->toArray()
        )->rules(
            'required|array',
            ['array' => '必须选择至少一个标签']
        );
        $form->text('slug', 'Slug')->rules('required', ['required' => 'Slug 不可为空']);
        $form->number('view_times', '浏览次数')->min(0);
        $form->number('praise_times', '赞次数')->min(0);
        $form->number('comment_times', '评论次数')->min(0);
        $form->switch('is_top', '置顶');
        $form->url('first_img', '首图');
        $form->simplemde('original_md', 'MarkDown')->rules('required', ['required' => '文章内容必须填写！']);

        return $form;
    }
}

<?php

namespace App\Admin\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
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
            ->header('用户管理')
            ->description('description')
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
            ->header('用户明细')
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
            ->header('编辑用户')
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
            ->header('创建用户')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('Id');
        $grid->username('用户名');
        $grid->avatar('头像')->display(function ($avatar) {
            return '<img src="' . $avatar . '" style="width:30px;height:30px;">';
        });
        $grid->email('邮箱');
        $grid->telephone('手机号');
        $grid->created_at('注册时间');

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
        // TODO 展示他的点赞 收藏
        $show = new Show(User::findOrFail($id));

        $show->id('Id');
        $show->username('Username');
        $show->email('Email');
        $show->telephone('Telephone');
        $show->avatar('Avatar');
        $show->password('Password');
        $show->remember_token('Remember token');
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
        $form = new Form(new User);

        $form->text('username', 'Username');
        $form->email('email', 'Email');
        $form->text('telephone', 'Telephone');
        $form->image('avatar', 'Avatar');
        $form->password('password', 'Password');
        $form->text('remember_token', 'Remember token');
        $form->text('api_token', 'Api token');
        $form->switch('is_admin', 'Is admin');

        return $form;
    }
}

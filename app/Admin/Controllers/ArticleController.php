<?php

namespace App\Admin\Controllers;

use App\Models\Articles;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Articles);

        $grid->column('id', __('Id'));
        $grid->column('title', __('标题'));
        $grid->column('users.username', __('作者'));
        $grid->column('picture', __('封面'));
        $grid->column('description', __('描述'));
        $grid->column('type', __('类型'));
        $grid->column('status', __('状态'))->using([1 => '已发布', 0 => '未发布'])->dot([1 => 'primary', 0 => 'danger']);
        $grid->column('created_at', __('创建时间'));
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Articles::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('author_id', __('Author id'));
        $show->field('picture', __('Picture'));
        $show->field('description', __('Description'));
        $show->field('content', __('Content'));
        $show->field('type', __('Type'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Articles);

        $form->text('title', __('Title'));
        $form->switch('author_id', __('Author id'));
        $form->image('picture', __('Picture'));
        $form->text('description', __('Description'));
        $form->textarea('content', __('Content'));
        $form->switch('type', __('Type'));
        $form->switch('status', __('Status'));

        return $form;
    }
}

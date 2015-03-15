<html>
<head>
    <? $this->registerAssets(array('js' => ['https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', 'index.js'],
    'css' => ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', 'style.css'])); ?>
    <? $this->meta('<meta charset="utf-8">'); ?>
</head>
<body>
<div class="container" style="height:500px;padding-top:50px;">

    <!-- Форма для добавления нового проекта -->
    <div class="form_add display_none col-md-offset-2" style="padding:5px 5px 30px 5px;width:600px;">
        <table>
            <tr class="tr_table_task color_white font_size_14">
                <td><img src="<?= $this->srcImage('image_tr_project.png') ?>" /></td>
                <td><input id="input_task" type="text" class="form-control input_add_new_task" placeholder="Write task name" aria-describedby="sizing-addon1">
                </td>
                <td> <button class="btn btn-success" style="padding-top:5px;" id="save_todo">Сохранить</button></td>
            </tr>
        </table>
    </div>

    <!-- Это модальное окно для Delete -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <input type="text" class="hidden_input_delete_id" style="visibility: hidden;"/>
                <div align="center">Удаление задания</div><br/>
                <button type="button" class="btn btn-primary delete_task margin-bottom_20 margin_left_4">Вы точно хотите удалить?</button>
                <button type="button" class="btn btn-default margin-bottom_20" data-dismiss="modal">Отмена</button><br/>
            </div>
        </div>
    </div>



    <!-- Это модальное окно для Update -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Редактирование задания</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="input_for_description" />
                    <input type="text" style="visibility: hidden" class="hidden_input" />
                    <input type="text" style="visibility: hidden" class="hidden_input_id" />
                    <input type="text" style="visibility: hidden" class="project" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary update_task">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Это разметка блоков -->
    <div class="preview">
        <? foreach($all_project as $value){?>
            <div class="row">
                <div class="col-md-offset-2" style="width:700px;">
                    <div class="border_radius_table">
                        <table class="table table_js<?= $value['id'] ?> table-hover" data-project-id="<?= $value['id'] ?>" data-project-descr="<?= $value['name'] ?>" style="background: #fff;">
                            <tr class="tr_table_task color_white font_size_14">
                                <td><img src="<?= $this->srcImage('image_tr_project.png') ?>" /></td>
                                <td class="name_project"><?= $value['name'] ?></td>
                                <td>
                                    <a href="#" class="delete_project color_project pull-right margin_right_left"><i class="glyphicon glyphicon-trash"></i> </a>
                                    <a href="#" data-toggle="modal" data-target="#myModal" class="edit_project color_project pull-right"><i class="glyphicon glyphicon-pencil"></i> </a>
                                </td>
                            </tr>
                            <tr class="tr_table_add_task">
                                <td><img src="<?= $this->srcImage('image_add_task.png') ?>" /></td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" class="form-control input_name_task<?= $value['id'] ?> input_create_task" placeholder="Create a task">
                          <span class="input-group-btn">
                    <button data-number="<?= $value['id'] ?>" class="btn background_button color_white" id="add_task">Add task</button>
                              </span>
                                    </div>
                                </td>
                            </tr>
                            <? foreach($all_task as $value_task){ ?>
                                <? if(isset($value_task[$value['id']])) { ?>
                                    <tr class="data_tr_<?= $value_task[$value['id']]['id_task'] ?> style_for_task" data-id-task="<?= $value_task[$value['id']]['id_task'] ?>">
                                        <td><input type="checkbox" <?= $value_task[$value['id']]['status']==1 ? 'checked' : '' ?> class="chekbox_task" data-task="<?= $value_task[$value['id']]['id_task'] ?>" /></td>
                                        <td colspan="2" class="border_td"><span class="name_task" <?= $value_task[$value['id']]['status']==1 ? 'style="text-decoration:line-through"' : '' ?>><?= $value_task[$value['id']]['descr'] ?></span>
                                            <div class="pull-right">
                                                <a href="#" onclick="return false;" class="prew color_td"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" onclick="return false;" class="next color_td"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                                <a data-toggle="modal" href="#" class="update color_td" data-target="#myModal" data-task-descr="<?= $value_task[$value['id']]['descr'] ?>"><i class="glyphicon glyphicon-pencil"></i> </a>
                                                <a href="#" data-toggle="modal" class="delete color_td" data-target=".bs-example-modal-sm"><i class="glyphicon glyphicon-trash"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } ?>
                        </table>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
    <!--  -->

    <!-- Кнопка для добавления проекта  -->
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            <button class="btn btn-success" id="add_todo">Add TODO LIST</button>
        </div>
    </div>

</div>
</body>
</html>



<script>var istype = 'sotrudniki', idName ='id';</script>
<button style="float: right" type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary ">Добавить</button>
<br>
<br><br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя</th>
        <th scope="col">Дата начала работы</th>
        <th scope="col">Должность</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sotrudniki as $sotrudnik): ?>
        <tr id="<?= $sotrudnik['id'] ?>">
            <th scope="row"><?= $sotrudnik['id'] ?></th>
            <td><?= $sotrudnik['name'] ?></td>
            <td><?= $sotrudnik['date_start'] ?></td>
            <td><?= $sotrudnik['name_s'] ?></td>
            <td>
                <button data-toggle="modal" data-target="#exampleModal_<?= $sotrudnik['id'] ?>" data-id="<?= $sotrudnik['id'] ?>" type="button" class="btn btn-outline-primary btn-sm">Изменить</button>
                <button onclick="deleteThis(<?= $sotrudnik['id'] ?>)" type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php foreach ($sotrudniki as $sotrudnik): ?>

    <div class="modal fade" id="exampleModal_<?= $sotrudnik['id'] ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Сотрудники</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/sotrundiki" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="type" value="update">
                        <input type="hidden" name="id" value="<?= $sotrudnik['id'] ?>">
                        <input type="text" name="name" class="form-control" placeholder="Имя" value="<?= $sotrudnik['name'] ?>" required><br>
                        <input type="date" name="date" value="<?= $sotrudnik['date_start'] ?>" required  class="form-control"> <br>
                        <select name="type_s" id="" class="form-control">
                            <?php foreach ($types as $type): ?>
                                <?php if ($sotrudnik['type'] == $type['id_s']): ?>
                                    <option selected value="<?= $type['id_s'] ?>"><?= $type['name_s'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $type['id_s'] ?>"><?= $type['name_s'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Сотрудники</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/sotrundiki" method="post">
                <div class="modal-body">
                    <input type="hidden" name="type" value="add">
                    <input type="text" name="name" class="form-control" placeholder="Имя" required><br>
                    <input type="date" name="date" required  class="form-control"> <br>
                    <select name="type_s" id="" class="form-control">
                        <?php foreach ($types as $type): ?>
                             <option value="<?= $type['id_s'] ?>"><?= $type['name_s'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <input type="submit" class="btn btn-primary" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
</div>



<script>var istype = 'animals', idName = 'id'</script>
<button style="float: right" type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary ">Добавить</button>
<br>
<br><br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя</th>
        <th scope="col">Вид</th>
        <th scope="col">Возраст</th>
        <th scope="col">Пол</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($animals as $animal): ?>
    <tr id="<?= $animal['id'] ?>">
        <th scope="row"><?= $animal['id'] ?></th>
        <td><?= $animal['name'] ?></td>
        <td><?= $animal['name_type'] ?></td>
        <td><?= $animal['age'] ?></td>
        <?php if ($animal['sex'] == 0) $sex = 'Мужской'; else $sex = 'Женский' ?>
        <td><?= $sex ?></td>
        <td>
            <button data-toggle="modal" data-target="#exampleModal_<?= $animal['id'] ?>" data-id="<?= $animal['id'] ?>" type="button" class="btn btn-outline-primary btn-sm">Изменить</button>
            <button onclick="deleteThis(<?= $animal['id'] ?>)" data-id="<?= $animal['id'] ?>" type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
        </td>
    </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php foreach ($animals as $animal): ?>

    <div class="modal fade" id="exampleModal_<?= $animal['id'] ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Животное</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/animals" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="type" value="update">
                        <input type="hidden" name="id" value="<?= $animal['id'] ?>">
                        <input type="text" name="name" class="form-control" placeholder="Имя животного" value="<?= $animal['name'] ?>" required><br>
                        <select name="type_id" class="form-control" id="">
                            <?php foreach ($types as $type): ?>
                                <?php if ($type['id_type'] == $animal['id_type']): ?>
                                    <option selected value="<?= $type['id_type'] ?>"><?= $type['name_type'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $type['id_type'] ?>"><?= $type['name_type'] ?></option>
                                 <?php endif; ?>
                            <?php endforeach; ?>
                        </select><br>
                        <input required type="text" class="form-control" value="<?= $animal['age'] ?>" name="age" placeholder="Возраст"><br>
                        <select name="sex" class="form-control" id="">
                            <?php if ($animal['sex'] == 0): ?>
                                <option selected value="0">Мужской</option>
                                <option value="1">Женский</option>
                            <?php else: ?>
                                <option value="0">Мужской</option>
                                <option selected value="1">Женский</option>
                            <?php endif; ?>
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
                <h5 class="modal-title" id="exampleModalLabel">Животное</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/animals" method="post">
                <div class="modal-body">
                    <input type="hidden" name="type" value="add">
                    <input type="text" name="name" class="form-control" placeholder="Имя животного" required><br>
                    <select name="type_id" class="form-control"  id="">
                        <?php foreach ($types as $type): ?>
                            <option value="<?= $type['id_type'] ?>"><?= $type['name_type'] ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <input required type="number" class="form-control" name="age" placeholder="Возраст"><br>
                    <select name="sex" class="form-control" id="">
                        <option value="0">Мужской</option>
                        <option value="1">Женский</option>
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



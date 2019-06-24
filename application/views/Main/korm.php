<script>var istype = 'korm', idName ='id_korm';</script>
<button style="float: right" type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary ">Добавить</button>
<br>
<br><br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя животного</th>
        <th scope="col">Название корма</th>
        <th scope="col">Колл-во</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($korms as $type): ?>
        <tr id="<?= $type['id_korm'] ?>">
            <th scope="row"><?= $type['id_korm'] ?></th>
            <td><?= $type['name'] ?></td>
            <td><?= $type['name_korm'] ?></td>
            <td>
                <?php if ($type['size'] == 1) $size = 'Мало';elseif ($type['size'] == 2)$size = 'Номально';else $size = 'Много' ?>
                <?= $size ?>
            </td>
            <td>
                <button data-toggle="modal" data-target="#exampleModal_<?= $type['id_korm'] ?>" data-id="<?= $type['id_korm'] ?>" type="button" class="btn btn-outline-primary btn-sm">Изменить</button>
                <button onclick="deleteThis(<?= $type['id_korm'] ?>)" data-id="<?= $type['id_korm'] ?>" type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php foreach ($korms as $type): ?>

    <div class="modal fade" id="exampleModal_<?= $type['id_korm'] ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Корм</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/korm" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="type" value="update">
                        <input type="hidden" name="id" value="<?= $type['id_korm'] ?>">
                        <input type="text" name="name" class="form-control" placeholder="Имя" value="<?= $type['name_korm'] ?>" required><br>

                        <select class="form-control" name="animal_id" id="">
                            <?php foreach ($animals as $animal): ?>
                                <?php if ($animal['id'] == $type['animal_id']): ?>
                                    <option selected value="<?= $animal['id'] ?>"><?= $animal['name'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $animal['id'] ?>"><?= $animal['name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select><br>
                        <select name="size" id="" class="form-control">
                            <?php if ($type['size'] == 1): ?>
                                <option selected value="1">Мало</option>
                            <?php else: ?>
                                <option value="1">Мало</option>
                            <?php endif; ?>

                            <?php if ($type['size'] == 2): ?>
                                <option selected value="2">Номально</option>
                            <?php else: ?>
                                <option value="2">Номально</option>
                            <?php endif; ?>

                            <?php if ($type['size'] == 3): ?>
                                <option selected value="3">Много</option>
                            <?php else: ?>
                                <option value="3">Много</option>
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
                <h5 class="modal-title" id="exampleModalLabel">Корм</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/korm" method="post">
                <div class="modal-body">
                    <input type="hidden" name="type" value="add">
                    <input type="text" name="name" class="form-control" placeholder="Имя" required><br>
                    <select class="form-control" name="animal_id" id="">
                        <?php foreach ($animals as $animal): ?>
                            <option value="<?= $animal['id'] ?>"><?= $animal['name'] ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <select name="size" id="" class="form-control">
                        <option value="1">Мало</option>
                        <option value="2">Номально</option>
                        <option value="3">Много</option>
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



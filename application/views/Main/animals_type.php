<script>var istype = 'animals_type', idName ='id_type';</script>
<button style="float: right" type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary ">Добавить</button>
<br>
<br><br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($types as $type): ?>
        <tr id="<?= $type['id_type'] ?>">
            <th scope="row"><?= $type['id_type'] ?></th>
            <td><?= $type['name_type'] ?></td>
            <td>
                <button data-toggle="modal" data-target="#exampleModal_<?= $type['id_type'] ?>" data-id="<?= $type['id_type'] ?>" type="button" class="btn btn-outline-primary btn-sm">Изменить</button>
                <button onclick="deleteThis(<?= $type['id_type'] ?>)" data-id="<?= $type['id_type'] ?>" type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php foreach ($types as $type): ?>

    <div class="modal fade" id="exampleModal_<?= $type['id_type'] ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Животное</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/animals_type" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="type" value="update">
                        <input type="hidden" name="id" value="<?= $type['id_type'] ?>">
                        <input type="text" name="name" class="form-control" placeholder="Имя" value="<?= $type['name_type'] ?>" required><br>
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
            <form action="/animals_type" method="post">
                <div class="modal-body">
                    <input type="hidden" name="type" value="add">
                    <input type="text" name="name" class="form-control" placeholder="Имя" required><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <input type="submit" class="btn btn-primary" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
</div>



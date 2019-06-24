<script>var istype = 'bileti', idName ='id_bileti';</script>
<button style="float: right" type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary ">Добавить</button>
<br>
<br><br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Время продажи</th>
        <th scope="col">Имя продавшего</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($korms as $type): ?>
        <tr id="<?= $type['id_bileti'] ?>">
            <th scope="row"><?= $type['id_bileti'] ?></th>
            <td><?= $type['time'] ?></td>
            <td><?= $type['name'] ?></td>
            <td>
                <button onclick="deleteThis(<?= $type['id_bileti'] ?>)" data-id="<?= $type['id_bileti'] ?>" type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Билеты</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/bileti" method="post">
                <div class="modal-body">
                    <input type="hidden" name="type" value="add">
                    <select class="form-control" name="sotrudnik_id" id="">
                        <?php foreach ($animals as $animal): ?>
                            <option value="<?= $animal['id'] ?>"><?= $animal['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <input type="date" class="form-control" name="time" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <input type="submit" class="btn btn-primary" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
</div>



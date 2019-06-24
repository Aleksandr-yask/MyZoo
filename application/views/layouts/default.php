<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="/public/lib/boot/bootstrap.min.css">
    <script src="/public/lib/jquery/jquery.min.js"></script>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Zoo Deth</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/animals">Животные</a>
        <a class="p-2 text-dark" href="/animals_type">Типы животных</a>
        <a class="p-2 text-dark" href="/korm">Корм</a>
        <a class="p-2 text-dark" href="/bileti">Билеты</a>
        <a class="p-2 text-dark" href="/sotrundiki">Сотрудники</a>
    </nav>
</div>
<div class="container">
    <?php echo $content ?>
</div>
<script>
    function deleteThis(id) {
        $.ajax({
            url: '/',
            method: 'post',
            data: {
                table: istype,
                id: id,
                idName: idName
            },
            success: function (data) {
                location.reload();
            }
        });
    }
</script>

<script src="/public/lib/boot/bootstrap.min.js"></script>
<script src="/public/script/main.js"></script>
</body>
</html>